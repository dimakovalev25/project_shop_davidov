<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/categories/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');
Route::get('/product/{product}', 'App\Http\Controllers\MainController@product')->name('product');
Route::get('/basket', 'App\Http\Controllers\BasketController@basket')->name('basket');
Route::get('/order', 'App\Http\Controllers\BasketController@order')->name('order');
Route::post('/order', 'App\Http\Controllers\BasketController@orderApprove')->name('order-approve');
Route::post('/basket/add/{id}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{id}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');

Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');

Auth::routes([
    'reset' => false,
    'confirm' => false,
    'verify' => false,
]);

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::group(['middleware' => 'is_admin'], function () {
        Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('home');
        Route::resource('/categories', 'App\Http\Controllers\Admin\CategoryController');
        Route::resource('/products', 'App\Http\Controllers\Admin\ProductController');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
