<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function showHome(){
        return view('Home', [
            "title" => "Single Post",
            "active"=>"posts",
        ]);
    }
}
