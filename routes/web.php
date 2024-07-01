<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProductController;

Route::get('/invoice', function () {
    return view('buyer.invoice');
});

Route::get('/', [ProductController::class, 'showProducts'])->name('home');
Route::get('/shop', [ProductController::class, 'index'])->middleware('auth');
Route::get('/history', [ProductController::class, 'history']);

Route::get('cart', [ProductController::class, 'cart'])->name('cart')->middleware('auth');
Route::post('add-to-cart', [ProductController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [ProductController::class, 'updateCart'])->name('update_cart');
Route::delete('remove-from-cart', [ProductController::class, 'removeFromCart'])->name('remove_from_cart');

Route::post('/checkout', [ProductController::class, 'checkout'])->middleware('auth');


// Seller

Route::prefix('myshop')->middleware('auth')->group(function () {
    Route::get('/', [SellerController::class, 'index'])->name('seller.index');
    Route::get('order-list', [SellerController::class, 'orlist']);
    Route::resource('product-list', SellerController::class);
});

// Route::get('/myshop', [SellerController::class, 'shboard'])->name('seller.index')->middleware('auth');
// Route::get('/myshop/order-list', [SellerController::class, 'orlist'])->middleware('auth');
// Route::resource('myshop/product-list', SellerController::class)->middleware('auth');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/topup', [ProfileController::class, 'showTopUpForm'])->name('topup.form');
    Route::post('/topup', [ProfileController::class, 'topUp'])->name('topup');
});

require __DIR__.'/auth.php';


// Admin
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('user-list', AdminUserController::class);
    Route::resource('product-list', AdminProductController::class);
});


// Route::resource('/admin', [AdminController::class, 'index'])->middleware(['auth', 'admin']);
// Route::get('/admin/product-list', [AdminController::class, 'productlist'])->middleware(['auth', 'admin']);
// Route::get('/admin/user-list', [AdminController::class, 'userlist'])->middleware(['auth', 'admin']);


