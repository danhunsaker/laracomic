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
Route::namespace('Auth')->name('social.')->group(function () {
    Route::get('login/{provider}', 'LoginController@redirectToProvider')->name('login');
    Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback')->name('callback');
    Route::post('register/{provider}/{id}', 'RegisterController@fromProvider')->name('register');
});

Route::get('home', 'HomeController@index')->name('home');
