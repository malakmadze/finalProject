<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/categories', [MainController::class, 'categories'])->name('categories');

Route::get('/cart',[CartController::class, 'cart'])->name('cart');
Route::get('/cart/order',[CartController::class, 'cartOrder'])->name('order');
Route::post('/cart/add/{id}', [CartController::class, 'cartAdd'])->name('cartAdd');
Route::post('/cart/remove/{id}', [CartController::class, 'cartRemove'])->name('cartRemove');

Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{product?}', [MainController::class, 'product'])->name('product');


