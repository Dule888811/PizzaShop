<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'PizzaController@index')->name('shop');
Auth::routes();
Route::get('/userPofile', 'UserController@index')->name('user.profile');
Route::get('/add-to-card/{id}', 'CartController@addToCart')->name('pizza.addToCart');
Route::get('/shoppingCart', 'CartController@getCart')->name('Cart');
Route::get('/checkout', 'CartController@getCheckout')->name('checkout');
Route::get('/reduce/{id}', 'CartController@getReduceByOne')->name('pizza.ReduceByOne');
Route::post('/checkout', 'CartController@postCheckout')->name('checkout');

