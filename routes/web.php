<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['set_locale'])->group(function () {
    Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
    Route::get('/categories/{category}', 'App\Http\Controllers\MainController@category')->name('category');
    Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');
    Route::get('/info', 'App\Http\Controllers\MainController@info')->name('info');
    Route::get('/categoriesshow', 'App\Http\Controllers\MainController@categoriesshow')->name('categoriesshow');
    Route::get('/product/{product}', 'App\Http\Controllers\MainController@product')->name('product');
    Route::get('/productshow', 'App\Http\Controllers\MainController@productshow')->name('productshow');

    Route::post('/subscription/{product}', 'App\Http\Controllers\MainController@subscribe')->name('subscription');

    Route::get('locale/{locale}', 'App\Http\Controllers\MainController@changeLocale')->name('locale');
    Route::get('currency/{currency}', 'App\Http\Controllers\MainController@changeCurrency')->name('currency');


    Route::group(['middleware' => 'basket_not_empty'], function () {
        Route::get('/basket', 'App\Http\Controllers\BasketController@basket')->name('basket');

    });

    Route::get('/order', 'App\Http\Controllers\BasketController@order')->name('order');
    Route::post('/order', 'App\Http\Controllers\BasketController@orderApprove')->name('order-approve');
    Route::post('/basket/remove/{product}',
        'App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');
    Route::post('/basket/add/{product}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');
    Route::post('/coupon','App\Http\Controllers\BasketController@setCoupon' )->name('set-coupon');
    Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');

    Auth::routes([
        'reset' => false,
        'confirm' => false,
        'verify' => false,
    ]);

    Route::group(['middleware' => 'auth', 'prefix' => 'person'], function () {
        Route::get('/orders', 'App\Http\Controllers\Person\OrderController@index')->name('orders.index');
        Route::get('/orders/{order}', 'App\Http\Controllers\Person\OrderController@show')->name('orders.show');
    });


    Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
        Route::group(['middleware' => 'is_admin'], function () {
            Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('home');
            Route::get('/orders/{order}', 'App\Http\Controllers\OrderController@show')->name('show-order');
            Route::resource('/categories', 'App\Http\Controllers\Admin\CategoryController');
            Route::resource('/products', 'App\Http\Controllers\Admin\ProductController');
            Route::resource('/properties', 'App\Http\Controllers\Admin\PropertyController');
            Route::resource('/coupons', 'App\Http\Controllers\Admin\CouponController');
            Route::resource('/property_options', 'App\Http\Controllers\Admin\PropertyOptionsController');
        });
    });


    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});




