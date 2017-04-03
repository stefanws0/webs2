<?php


View::creator('layouts.nav', function($view)
{
    $view->with('items', \App\Models\Navigation::all());
});
View::creator('', function($view) {
  $view->with('items', \App\Models\Navigation::all());
});
Route::get('/', [
  'uses' => 'WelcomeController@index',
  'as' => 'index'
]);

Auth::routes();

Route::get('/products', 'ProductsController@index');

Route::get('/products/{product}', 'ProductsController@show');
Route::post('/products', 'ProductsController@store');
Route::post('/products/{product}/reviews', 'ReviewController@store');
Route::get('/add-to-cart/{id}', [
  'uses' => 'ProductsController@getAddToCart',
  'as' => 'products.addToCart'
]);
Route::get('/shopping-cart', [
  'uses' => 'ProductsController@getCart',
  'as' => 'products.shoppingCart'
]);
Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function ()    {
        return view('home');
    });
    Route::get('/dashboard/products', 'DashboardController@index')->name('dashboardproducts');
    Route::get('/dashboard/products/create', 'ProductsController@create');
});
