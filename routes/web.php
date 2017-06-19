<?php
View::creator('layouts.nav', function ($view) {
    $view->with('items', \App\Models\Navigation::all());
});
View::creator('', function ($view) {
    $view->with('items', \App\Models\Navigation::all());
});

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::resource('users', 'Dashboard\UserController', ['except' => ['show']]);
        Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');
        Route::resource('products', 'Dashboard\ProductController');
        Route::get('/orders', 'Dashboard\OrderController@index')->name('dashboard.orders');
        Route::delete('/orders/{order}/delete', 'Dashboard\OrderController@destroy')->name('dashboard.orders.destroy');
        Route::resource('categories', 'Dashboard\CategoryController', ['except' => ['show']]);
    });
});
Route::get('/add-to-cart/{id}', 'ProductsController@getAddToCart')->name('products.addToCart');
Route::get('/reduce/{id}', 'ProductsController@getReduceByOne')->name('products.reduceByOne');
Route::get('/removetotalfromcart/{id}', 'ProductsController@getRemoveItem')->name('products.removeAll');
Route::get('/shopping-cart', 'ProductsController@getCart')->name('products.shoppingCart');
Route::get('/checkout', 'ProductsController@getCheckout')->name('checkout');
Route::get('/products/', 'ProductsController@index')->name('products.index');
Route::get('/products/{product}', 'ProductsController@show');
Route::get('/products/create', 'ProductsController@create');
Route::post('/products/', 'ProductsController@store');
Route::post('/products/{product}/reviews', 'ReviewController@store');
Auth::routes();

Route::get('/contact', 'ContactController@index')->name('contact.index');
Route::post('/contact/email', 'ContactController@store')->name('contact.store');
