<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/products', 'products.index');
Route::view('/cart', 'products.cart')->name('cart');

Route::view('/checkout', 'products.checkout')->name('checkout')->middleware('auth', 'cart');
Route::view('/payment', 'products.payments')->name('payments')->middleware('auth', 'cart');
Route::view('/checkout/pay', 'orders.pay')->name('pay')->middleware('auth', 'pay');
Route::post('/checkout/pay', 'OrdersController@store')->name('orders.store')->middleware('auth');

Route::view('/order-complete', 'orders.complete')->name('orders.complete')->middleware('auth');
Route::view('/order-history', 'orders.history')->name('orders.history')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
