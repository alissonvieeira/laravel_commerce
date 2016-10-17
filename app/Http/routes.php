<?php

Route::group(['prefix' => 'admin', 'where' => ['id' => '[0-9]+']], function()
{

    Route::group(['prefix' => 'categories'], function(){
        Route::get('', ['as' => 'categories.index', 'uses' => 'CategoriesController@index']);
        Route::post('', ['as' => 'categories.store', 'uses' => 'CategoriesController@store']);
        Route::get('create', ['as' => 'categories.create', 'uses' => 'CategoriesController@create']);
        Route::get('{id}/destroy', ['as' => 'categories.destroy', 'uses' => 'CategoriesController@destroy']);
        Route::get('{id}/edit', ['as' => 'categories.edit', 'uses' => 'CategoriesController@edit']);
        Route::put('{id}/update', ['as' => 'categories.update', 'uses' => 'CategoriesController@update']);
    });

    Route::group(['prefix' => 'products'], function(){
        Route::get('', ['as' => 'products.index', 'uses' => 'ProductsController@index']);
        Route::post('', ['as'=> 'products.store', 'uses' => 'ProductsController@store']);
        Route::get('create', ['as' => 'products.create', 'uses' => 'ProductsController@create']);
        Route::get('{id}/destroy', ['as' => 'products.destroy', 'uses' => 'ProductsController@destroy']);
        Route::get('{id}/edit', ['as' => 'products.edit', 'uses' => 'ProductsController@edit']);
        Route::put('{id}/update', ['as' => 'products.update', 'uses' => 'ProductsController@update']);
    });
});


Route::get('/', function () {
    return view('welcome');
});

/*
Route::pattern('id', '[0-9]+');

Route::group(['prefix' => 'admin'], function(){

    Route::get('categories', 'AdminCategoriesController@index');
    Route::get('products', 'AdminProductsController@index');

});
*/