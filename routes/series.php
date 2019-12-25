<?php

/*
|--------------------------------------------------------------------------
| Series Routes
|--------------------------------------------------------------------------
|
| Collected here are the routes for a given series, which can be reached
| via either custom domain, subdomain, or subdirectory.
|
*/

Route::get('/', 'SeriesController@home')->name('series');
Route::get('feed', 'FeedController@series')->name("feed::series");
Route::get('archive', 'SeriesController@archive')->name('archive');
Route::get('archive/{volume}', 'SeriesController@volume')->name('volume');
Route::get('archive/{volume}/{issue}', 'SeriesController@issue')->name('issue');
Route::get('archive/{volume}/{issue}/{strip}', 'SeriesController@strip')->name('strip');

Route::get('news', 'NewsController@news')->name('news');
Route::get('news/feed', 'FeedController@news')->name("feed::news");
Route::get('news/{news}', 'NewsController@article')->name('article');

Route::get('forum', 'ForumController@forum')->name('forum');
Route::get('forum/{category}', 'ForumController@category')->name('category');
Route::get('forum/{category}/{topic}', 'ForumController@topic')->name('topic');
Route::get('forum/{category}/{topic}/{post}', 'ForumController@post')->name('post');

Route::get('{page}', 'PageController@page')->name('page');
