<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/product/{name}', [ProductController::class, 'showByName'])->name('product.showByName');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/{id}/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/ringkasan-pesanan', [OrderController::class, 'summary'])->name('order.summary');


Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
