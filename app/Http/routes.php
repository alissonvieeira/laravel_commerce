<?php

Route::get('categories', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
Route::post('categories', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
Route::get('categories/create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
Route::get('categories/{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
Route::get('categories/{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
Route::put('categories/{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);

Route::get('products', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
Route::post('products', ['as'=> 'products.store', 'uses' => 'ProductsController@store']);
Route::get('products/create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
Route::get('products/{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
Route::get('products/{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
Route::put('products/{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);

Route::get('/', function () {
    return view('welcome');
});

Route::pattern('id', '[0-9]+');

Route::group(['prefix' => 'admin'], function(){

    Route::get('categories', 'AdminCategoriesController@index');
    Route::get('products', 'AdminProductsController@index');

});