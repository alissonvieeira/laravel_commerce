<?php

Route::get('/', function () {
    return view('welcome');
});


Route::get('produtos', ['as' => 'produtos', function(){
    echo Route::currentRouteName();
    //return "Produtos";
}]);




Route::pattern('id', '[0-9]+');

Route::get('user/{id?}', function ($id =123) {
    if($id)
        return "Olá $id";

    return "Não possui ID";
});



Route::get('admin/categories', 'AdminCategoriesController@index');
Route::get('admin/products', 'AdminProductsController@index');