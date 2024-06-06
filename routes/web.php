<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.blade.php');
});

Route::get('/home', function () {
    return view('home.blade.php');
});

Route::get('/shop', function () {
    return view('shop.blade.php');
});

Route::get('/profile', function () {
    return view('profile.blade.php');
});

Route::get('/cart', function () {
    return view('cart.blade.php');
});

Route::get('/checkout', function () {
    return view('checkout.blade.php');
});

Route::get('/login-register', function () {
    return view('login_register.blade.php');
});