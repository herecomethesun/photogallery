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

Route::post('album/store', 'AlbumController@store')->name('album.store');
Route::get('album/create', 'AlbumController@create')->name('album.create');
Route::get('album/{album}/edit', 'AlbumController@edit')->name('album.edit');
Route::post('album/{album}/upload', 'AlbumController@upload')->name('album.upload');
Route::patch('album/{album}', 'AlbumController@update')->name('album.update');
Route::delete('album/{album}', 'AlbumController@destroy')->name('album.delete');

Route::get('collection/{collection}/album/{album}', 'AlbumController@show')->name('album.show');
// Route::resource('collection/{collection}/album', 'AlbumController', ['except' => ['index']]);