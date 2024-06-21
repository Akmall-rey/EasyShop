<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('buyer.home');
});

Route::get('/home', function () {
    return view('buyer.home');
});

Route::get('/shop', function () {
    return view('buyer.shop');
});

Route::get('/profile', function () {
    return view('buyer.profile');
});

Route::get('/cart', function () {
    return view('buyer.cart');
});

Route::get('/checkout', function () {
    return view('buyer.checkout');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/admin/userlist', function () {
    return view('admin.userlist');
});

Route::get('/admin/productlist', function () {
    return view('admin.productlist');
});



Route::get('/login-register', function () {
    return view('login_register');
});

// revisi
// Route::get('/admin', function () {
//     return view('admin');
// });

Route::get('/topup', function () {
    return view('topup');
});

Route::get('/deliver', function () {
    return view('deliver');
});

Route::get('/add-product', function () {
    return view('tambahproduk');
});

Route::get('/edit-product', function () {
    return view('editproduk');
});

Route::get('/coba', function () {
    return view('coba');
});