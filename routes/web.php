<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Person\OrderController as PersonOrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Auth::routes([
    'reset' => false, //get rid of it
    'confirm' => false, //get rid of it
    'verify' => false, //get rid of it
]);

Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');

Route::middleware(['auth'])-> group (function(){
    Route::group([
        'prefix'=>'person',
        'namespace' => 'Person',
        'as'=>'person.',
    ],function(){
        Route::get('/orders', [PersonOrderController::class, 'index'])->name('orders.index');
        Route::get('/orders/{order}', [PersonOrderController::class, 'show'])->name('orders.show');
    });
    Route::group([
//    'namespace' => 'Admin',
        'prefix' => 'Admin',
    ], function () {
        Route::group(['middleware' => 'is_admin'], function () {
            Route::get('/orders', [AdminOrderController::class, 'index'])->name('home');
            Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('order.show');
        });
        Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    });

});




Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');


Route::group(['prefix' => 'cart'], function () {
    Route::post('/add/{id}', [CartController::class, 'cartAdd'])->name('cartAdd');
    Route::group([
        'middleware' => 'cart_not_empty',
    ], function () {
        Route::get('/', [CartController::class, 'cart'])->name('cart');
        Route::get('/order', [CartController::class, 'cartOrder'])->name('order');
        Route::post('/remove/{id}', [CartController::class, 'cartRemove'])->name('cartRemove');
    });
});


Route::post('/cart/order', [CartController::class, 'cartConfirm'])->name('order-confirm');

Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');


//Auth::routes();

//Auth::routes([
//    'reset' => false, //get rid of it
//    'confirm' => false, //get rid of it
//    'verify' => false, //get rid of it
//]);
//
//Route::get('/logout', [LoginController::class, 'logout'])->name('get-logout');
//
//Route::group([
//    'middleware' => 'auth',
////    'namespace' => 'Admin',
//    'prefix' => 'Admin',
//    ], function(){
//    Route::group(['middleware'=>'is_admin'],function(){
//        Route::get('/orders', [OrderController::class, 'index'])->name('home');
//    });
//    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
//    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
//});
//
//
//
//Route::get('/', [MainController::class, 'index'])->name('index');
//Route::get('/categories', [MainController::class, 'categories'])->name('categories');
//
//
//
//Route::group(['prefix'=> 'cart'], function(){
//    Route::post('/add/{id}', [CartController::class, 'cartAdd'])->name('cartAdd');
//    Route::group([
//        'middleware'=>'cart_not_empty',
//    ], function(){
//        Route::get('/',[CartController::class, 'cart'])->name('cart');
//        Route::get('/order',[CartController::class, 'cartOrder'])->name('order');
//        Route::post('/remove/{id}', [CartController::class, 'cartRemove'])->name('cartRemove');
//    });
//});
//
//
//
//
//
//Route::post('/cart/order',[CartController::class, 'cartConfirm'])->name('order-confirm');
//
//Route::get('/{category}', [MainController::class, 'category'])->name('category');
//Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');
//
//
//
//Auth::routes();
//
