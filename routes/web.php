<?php

use Illuminate\Support\Facades\Route;

// Common routes
Route::get('/', [\App\Http\Controllers\ProductController::class, 'products'])
    ->name('products');

Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'product'])
    ->name('product');

// Cart routes
Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])
    ->name('cart.index')->middleware('auth');

Route::post('/cart', [\App\Http\Controllers\CartController::class, 'store'])
    ->name('cart.store')->middleware('auth');

Route::delete('/cart/{product}', [\App\Http\Controllers\CartController::class, 'destroy'])
    ->name('cart.destroy')->middleware('auth');

Route::post('/cart/save-for-later/{product}', [\App\Http\Controllers\CartController::class, 'switchToSaveForLater'])
    ->name('cart.switchToSaveForLater')->middleware('auth');

Route::delete('/cart/switch-to-cart/{product}', [\App\Http\Controllers\SaveForLaterController::class, 'destroy'])
    ->name('saveForLater.destroy')->middleware('auth');

Route::post('/cart/switch-to-cart/{product}', [\App\Http\Controllers\SaveForLaterController::class, 'switchToCart'])
    ->name('saveForLater.switchToCart')->middleware('auth');

Route::get('/empty', function () {
    Cart::destroy();
});

// Auth routes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
