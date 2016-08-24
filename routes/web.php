<?php

Route::get('/', function () {
    return view('pages.front');
})->name('front');

Route::get('/home', 'HomeController@index');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

Route::get('collection/create', 'CollectionController@create')->name('collection.create');
Route::get('collection/{collection}', 'CollectionController@show')->name('collection.show');
Route::post('collection/store', 'CollectionController@store')->name('collection.store');
Route::get('collection/{collection}/edit', 'CollectionController@edit')->name('collection.edit');
Route::patch('collection/{collection}', 'CollectionController@update')->name('collection.update');
Route::delete('collection/{collection}', 'CollectionController@destroy')->name('collection.delete');