<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/products', 'ProductsController@index');
Route::get('/products/{product}', 'ProductsController@show');
Route::get('/products/create', 'ProductsController@create');
Route::post('/products', 'ProductsController@store');
Route::post('/products/{product}/reviews', 'ReviewController@store');
Auth::routes();

Route::get('/home', 'HomeController@index');
