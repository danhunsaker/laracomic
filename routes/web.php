<?php

use App\CustomDomain;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$domain = config('app.domain');

if (Request::getHost() != $domain) {
    Route::domain($domain)->get('/', function () {
        return view('welcome');
    })->name('landing');

    Route::middleware('withseries')->group(function () {
        Auth::routes();
        Route::get('/home', 'HomeController@index')->name('home');
    });

    Route::domain("{series}.{$domain}")->namespace('Series')->group(base_path('routes/series.php'));
} elseif (app('migrator')->repositoryExists() &&
          ! is_null(app('migrator')->getRepository()->getLastBatchNumber()) &&
          ! is_null($custom = CustomDomain::where(['domain' => Request::getHost()])->first())) {
    Route::domain(str_replace(['http://', 'https://'], '', config('app.url')))->get('/', function () {
        return view('welcome');
    })->name('landing');

    Route::middleware("withseries:{$custom->series->route}")->group(function () {
        Auth::routes();
        Route::get('/home', 'HomeController@index')->name('home');

        Route::namespace('Series')->group(base_path('routes/series.php'));
    });
} else {
    Route::get('/', function () {
        return view('welcome');
    })->name('landing');

    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('{series}')->namespace('Series')->group(base_path('routes/series.php'));
}

Route::feeds();
