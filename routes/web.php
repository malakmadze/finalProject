<?php

use App\Http\Controllers\Admin\OrderController;
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

Route::group([
    'middleware' => 'auth',
    'namespace' => 'Admin'
    ], function(){
    Route::get('/orders', [OrderController::class, 'index'])->name('home');
});



Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');

Route::get('/cart',[CartController::class, 'cart'])->name('cart');
Route::get('/cart/order',[CartController::class, 'cartOrder'])->name('order');
Route::post('/cart/add/{id}', [CartController::class, 'cartAdd'])->name('cartAdd');
Route::post('/cart/remove/{id}', [CartController::class, 'cartRemove'])->name('cartRemove');

Route::post('/cart/order',[CartController::class, 'cartConfirm'])->name('order-confirm');

Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');



Auth::routes();

