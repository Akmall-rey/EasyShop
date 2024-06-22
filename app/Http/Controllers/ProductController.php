<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    Public function index(){
        return view('buyer.show');
    }
}
