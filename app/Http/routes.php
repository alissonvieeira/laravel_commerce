<?php

Route::get('categories', 'CategoriesController@index');
Route::get('categories/create', 'CategoriesController@create');


Route::get('/', function () {
    return view('welcome');
});

Route::pattern('id', '[0-9]+');

Route::group(['prefix' => 'admin'], function(){

    Route::get('categories', 'AdminCategoriesController@index');
    Route::get('products', 'AdminProductsController@index');

});