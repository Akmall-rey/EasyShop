<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('buyer.home');
});

// Route::get('/shop', function () {
//     return view('buyer.shop');
// });

Route::get('/shop', [ProductController::class, 'index']);

Route::get('/checkout', function () {
    return view('buyer.checkout');
});

Route::get('/cart', function () {
    return view('buyer.cart');
});

Route::get('/shop', function () {
    return view('buyer.shop');
});

// Route::get('/admin', function () {
//     return view('admin.index');
// });

Route::get('/admin/userlist', function () {
    return view('admin.userlist');
});

Route::get('/admin/productlist', function () {
    return view('admin.productlist');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin', [AdminController::class, 'index']);
