<?php

use Illuminate\Support\Facades\Route;

Route::get('/coba', function () {
    return view('coba');
});

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/login-register', function () {
    return view('login_register');
});

Route::get('/admin', function () {
    return view('admin');
});

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