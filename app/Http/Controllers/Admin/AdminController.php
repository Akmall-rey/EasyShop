<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){

        return view('admin.index');
    }

    public function userlist(){

        return view('admin.userlist', [
            'user' => User::all()
        ]);
    }

    // public function userStore(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email',
    //         'password' => 'required|string|min:8',
    //         'roles' => 'required',
    //     ]);

    //     // Hash password
    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     // Buat user
    //     $user = User::create($validatedData);

    //     if ($user) {
    //         session()->flash('success', 'User berhasil ditambahkan!');

    //     } else {
    //         session()->flash('error', 'User gagal ditambahkan!');
    //     }
    //     return redirect()->back();
    // }
}
