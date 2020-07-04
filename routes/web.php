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
Route::get('/login', 'LoginController@login')->name('customer.login');
Route::post('/login', 'LoginController@handleLogin')->name('customer.post.login');
Route::prefix('/')->middleware(['customer'])->group(function () {
    Route::get('/', 'WebsiteController@category')->name('category.get');
    Route::get('/category', 'WebsiteController@category')->name('category.get');
    Route::get('/category/{slug}', 'WebsiteController@subcategory')->name('sub-category.get');
    Route::get('/{category}/list-product', 'WebsiteController@getAllProduct')->name('product.get.all');
    Route::get('/product-detail/{slug}','WebsiteController@detailProduct')->name('product.detail');
    Route::post('/product-detail/{slug}','WebsiteController@addToCart')->name('addToCart');
    Route::get('/cart','WebsiteController@getCart')->name('getCart');
    Route::get('/cart/update','WebsiteController@getUpdateCart');
    Route::delete('/cart/delete/{id}','WebsiteController@deleteCart')->name('delete.cart');
    Route::get('/logout', 'LoginController@logout')->name('customer.logout');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
