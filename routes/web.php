<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/live-search', [HomeController::class, 'liveSearch'])->name('live.search');
Route::get('/documentation', [HomeController::class, 'documentation'])->name('documentation');
Route::post('/load-more-products', [HomeController::class, 'loadMore'])->name('products.load.more');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/forgot-password', [AuthController::class, 'showForgotForm'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/ajax/login-popup.html', function () {
    return view('ajax.login-popup');
})->name('login-popup');

Route::get('/ajax/product-quick-view/{id}', [ProductController::class, 'quickView'])->name('product-quick-view');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::delete('/remove/{productId}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/update/{productId}', [CartController::class, 'update'])->name('cart.update');
});

Route::prefix('wishlist')->group(function () {
    Route::get('/', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/add', [WishlistController::class, 'add'])->name('wishlist.add');
    Route::post('/remove', [WishlistController::class, 'remove'])->name('wishlist.remove');
});

Route::prefix('checkout')->group(function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/process', [CheckoutController::class, 'process'])->name('checkout.process');
});

Route::get('/order/success', function () {
    return view('order.success');
})->name('order.success');

Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::post('/remove-from-cart', [CartController::class, 'remove'])->name('remove.from.cart');
Route::get('/get-cart-items', [CartController::class, 'getCartItems'])->name('get.cart.items');