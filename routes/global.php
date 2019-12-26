<?php

/*
|--------------------------------------------------------------------------
| Global Routes
|--------------------------------------------------------------------------
|
| Collected here are the routes used at the global level, regardless of
| how the series+ themselves are accessed.
|
*/

Auth::routes(['verify' => true]);
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider')->name('social.login');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('social.callback');

Route::get('home', 'HomeController@index')->name('home');
