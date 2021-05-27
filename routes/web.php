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

Route::patch('/cart/{product}', [\App\Http\Controllers\CartController::class, 'update'])
    ->name('cart.update')->middleware('auth');

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

// Checkout routes
Route::get('/shipment', [\App\Http\Controllers\CheckoutController::class, 'shipment'])
    ->name('shipment');

Route::resource('/orders', \App\Http\Controllers\OrderController::class)
    ->middleware('auth');

// PayPal payment routes
Route::get('/paypal/checkout', [\App\Http\Controllers\PayPalController::class, 'getExpressCheckout']);

Route::get('/paypal/checkout-success', [\App\Http\Controllers\PayPalController::class, 'getExpressCheckoutSuccess'])
    ->name('paypal.success');

Route::get('/paypal/checkout-cancel', [\App\Http\Controllers\PayPalController::class, 'cancelPage'])
    ->name('paypal.cancel');

// Auth routes
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
