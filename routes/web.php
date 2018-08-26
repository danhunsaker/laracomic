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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

if (Request::getHost() != $domain) {
    Route::domain("{series}.{$domain}")->namespace('Series')->group(base_path('routes/series.php'));
} elseif (! is_null($custom = CustomDomain::where(['domain' => Request::getHost()])->first())) {
    Route::namespace('Series')->middleware("withseries:{$custom->series->route}")->group(base_path('routes/series.php'));
} else {
    Route::get('/', function () {
        return view('welcome');
    })->name('landing');

    Route::prefix('{series}')->namespace('Series')->group(base_path('routes/series.php'));
}

Route::feeds();
