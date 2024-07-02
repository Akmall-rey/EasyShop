<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Admin\AdminUserController;

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
    Route::get('/', [SellerController::class, 'dashboard'])->name('seller.index');
    Route::get('order-list', [SellerController::class, 'orderlist']);
    Route::resource('product-list', SellerController::class, ['as' => 'seller']);
});


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
    Route::get('product-list', [AdminController::class, 'productlist']);

    Route::get('/user-list', [AdminController::class, 'userlist']);
    Route::put('/user-list/{id}', [AdminController::class, 'userUpdate'])->name('user-list.update');
    Route::delete('/user-list/{id}', [AdminController::class, 'userDestroy'])->name('user-list.destroy');

    Route::resource('product-list', AdminProductController::class, ['as' => 'admin']);
});

// Route::resource('user-list', AdminUserController::class);

