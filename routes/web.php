<?php

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

$domain = app('Pdp\Rules')->resolve(Request::getHost())->getRegistrableDomain() ?:
          str_replace(['http://', 'https://'], '', config('app.url'));
config(['app.url' => $domain]);

Route::domain("{series_slug}.{$domain}")->group(base_path('routes/series.php'));

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('{series_slug}')->group(base_path('routes/series.php'));
