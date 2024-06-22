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

Route::get('/topup', function () {
    return view('buyer.topup');
});




Route::get('/myshop', function () {
    return view('seller.index');
})->name('seller.index');

Route::get('/myshop/order-list', function () {
    return view('seller.orderlist');
});

Route::get('/myshop/product-list', function () {
    return view('seller.productlist');
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


Route::get('/admin', [AdminController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/admin/product-list', [AdminController::class, 'productlist'])->middleware(['auth', 'admin']);
Route::get('/admin/user-list', [AdminController::class, 'userlist'])->middleware(['auth', 'admin']);