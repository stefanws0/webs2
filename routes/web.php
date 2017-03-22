<?php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', 'ProductsController@index');
Route::get('/products/{product}', 'ProductsController@show');
Route::get('/products/create', 'ProductsController@create');
Route::post('/products', 'ProductsController@store');
Route::post('/products/{product}/reviews', 'ReviewController@store');