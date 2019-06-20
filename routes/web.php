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

Route::get('/', "GetProductsController@index")->middleware(['auth.shop'])->name('home');
Route::get('/ebay_auth', "GetProductsController@ebay_auth")->middleware(['auth.shop'])->name('home');
Route::get('/etsy', "GetProductsController@get_etsy_products")->middleware(['auth.shop'])->name('home');
Route::get('/ebay', "GetProductsController@get_ebay_products")->middleware(['auth.shop'])->name('home');
Route::get('/action_ebay', "GetProductsController@action_get_ebay_products")->middleware(['auth.shop'])->name('home');
Route::post('/action_get_etsy_products', "GetProductsController@action_get_etsy_products")->middleware(['auth.shop'])->name('home');
Route::get('/link_ebay', "GetProductsController@link_ebay")->middleware(['auth.shop'])->name('home');
Route::get('/amazon', "GetProductsController@amazon")->middleware(['auth.shop'])->name('home');