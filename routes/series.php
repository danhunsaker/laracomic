<?php

/*
|--------------------------------------------------------------------------
| Series Routes
|--------------------------------------------------------------------------
|
| Collected here are the routes for a given series, which can be reached
| via either subdomain or subdirectory.
|
*/

Route::get('/', function (App\Series $series) {
    return view('series/home', $series);
});
