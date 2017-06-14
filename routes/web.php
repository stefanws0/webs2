<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');
    Route::get('/users', 'Dashboard\UserController@index')->name('dashboard.users');
    Route::get('/{user}/edit', 'Dashboard\UserController@edit')->name('users.edit');
    Route::put('/{user}', 'Dashboard\UserController@update')->name('users.update');
});
Route::get('/products', 'ProductsController@index')->name('products.index');
Route::get('/products/{product}', 'ProductsController@show');
Route::get('/products/create', 'ProductsController@create');
Route::post('/products', 'ProductsController@store');
Route::post('/products/{product}/reviews', 'ReviewController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::post('/contact/email', 'ContactController@store')->name('contact.store');
