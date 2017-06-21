<?php
View::creator('layouts.nav', function ($view) {
    $view->with('items', \App\Models\Navigation::all());
});
View::creator('', function ($view) {
    $view->with('items', \App\Models\Navigation::all());
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

<<<<<<< HEAD
Auth::routes();
Route::group(['prefix' => 'dashboard'], function() {
    Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');
    Route::get('/users', 'Dashboard\UserController@index')->name('dashboard.users');
    Route::get('/users/{user}/edit', 'Dashboard\UserController@edit')->name('dashboard.users.edit');
    Route::put('/users/{user}/update', 'Dashboard\UserController@update')->name('dashboard.users.update');
    Route::delete('/users/{user}/delete', 'Dashboard\UserController@destroy')->name('dashboard.users.destroy');
    Route::get('/products', 'Dashboard\ProductController@index')->name('dashboard.products');
    Route::get('/products/{product}/edit', 'Dashboard\ProductController@edit')->name('dashboard.products.edit');
    Route::put('/product/{product}/update', 'Dashboard\ProductController@update')->name('dashboard.products.update');
    Route::delete('/products/{product}/delete', 'Dashboard\ProductController@destroy')->name('dashboard.products.destroy');
    Route::get('/product/create', 'Dashboard\ProductController@create')->name('dashboard.products.create');
    Route::post('/product/store', 'Dashboard\ProductController@store')->name('dashboard.products.store');
    Route::get('/orders', 'Dashboard\OrderController@index')->name('dashboard.orders');
    Route::delete('/orders/delete/{order}', 'Dashboard\OrderController@destroy')->name('dashboard.orders.destroy');
    Route::get('/categories', 'Dashboard\CategoryController@index')->name('dashboard.categories');
    Route::get('/categories/{category}/edit', 'Dashboard\CategoryController@edit')->name('dashboard.categories.edit');
    Route::put('/category/{category}/update', 'Dashboard\CategoryController@update')->name('dashboard.categories.update');
    Route::delete('/categories/{category}/delete', 'Dashboard\CategoryController@destroy')->name('dashboard.categories.destroy');
    Route::get('/category/create', 'Dashboard\CategoryController@create')->name('dashboard.categories.create');
    Route::post('/category/store', 'Dashboard\CategoryController@store')->name('dashboard.categories.store');

=======
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'dashboard'], function () {
        Route::resource('users', 'Dashboard\UserController', ['except' => ['show']]);
        Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard.index');
        Route::resource('products', 'Dashboard\ProductController');
        Route::get('/orders', 'Dashboard\OrderController@index')->name('dashboard.orders');
        Route::delete('/orders/{order}/delete', 'Dashboard\OrderController@destroy')->name('dashboard.orders.destroy');
        Route::resource('categories', 'Dashboard\CategoryController', ['except' => ['show']]);
    });
>>>>>>> d38b415caca5d44ef56392682a2885956e125422
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
