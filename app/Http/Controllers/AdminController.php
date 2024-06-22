<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        return view('admin.index');
    }

    public function productlist(){

        return view('admin.productlist');
    }

    public function userlist(){

        return view('admin.userlist');
    }
}
