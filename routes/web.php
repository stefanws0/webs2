<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');
    Route::get('/users', 'Dashboard\UserController@index')->name('dashboard.users');
    Route::get('/{user}/edit', 'Dashboard\UserController@edit')->name('dashboard.users.edit');
    Route::put('/{user}/update', 'Dashboard\UserController@update')->name('dashboard.users.update');
    Route::delete('/{user}/delete', 'Dashboard\UserController@destroy')->name('dashboard.users.destroy');
    Route::get('/products', 'Dashboard\ProductController@index')->name('dashboard.products');
    Route::get('/{product}/edit', 'Dashboard\ProductController@edit')->name('dashboard.products.edit');
    Route::put('/{product}/update', 'Dashboard\ProductController@update')->name('dashboard.products.update');
    Route::delete('/{product}/delete', 'Dashboard\ProductController@destroy')->name('dashboard.products.destroy');
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
