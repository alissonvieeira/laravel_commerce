<?php

Route::get('/', function () {
    return view('welcome');
});

Route::pattern('id', '[0-9]+');

Route::group(['prefix' => 'admin'], function(){

    Route::get('categories', 'AdminCategoriesController@index');
    Route::get('products', 'AdminProductsController');

});


Route::get('category/{category}', function(\CodeCommerce\Category $category){
    return $category->name;
});



Route::get('user/{id?}', function ($id =123) {
    if($id)
        return "Olá $id";

    return "Não possui ID";
});





Route::get('admin/categories', 'AdminCategoriesController@index');
Route::get('admin/products', 'AdminProductsController@index');