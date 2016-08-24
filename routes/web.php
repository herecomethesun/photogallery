<?php

Route::get('/', function () {
    return view('pages.front');
});

Route::get('collection/{collection}', 'CollectionController@show')->name('collection.show');