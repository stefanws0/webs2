<?php


View::creator('layouts.nav', function($view)
{
    $view->with('items', \App\Models\Navigation::all());
});
Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/products', 'ProductsController@index');
Route::get('/products/create', 'ProductsController@create');
Route::get('/products/{product}', 'ProductsController@show');
Route::post('/products', 'ProductsController@store');
Route::post('/products/{product}/reviews', 'ReviewController@store');
Auth::routes();

Route::get('/home', 'HomeController@index');
