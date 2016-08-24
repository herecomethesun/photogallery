<?php

Route::get('/', function () {
    return view('pages.front');
});

Route::get('/home', 'HomeController@index');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('collection/{collection}', 'CollectionController@show')->name('collection.show');