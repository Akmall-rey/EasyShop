<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
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

    public function userUpdate(Request $request, string $id)
    {
        $user = User::find($id);
        $user->usertype = $request->input('usertype', $user->usertype);
        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);
        $user->phone = $request->input('phone', $user->phone);
        $user->address = $request->input('address', $user->address);

        $user->save();

        if ($user) {
            session()->flash('success', 'User berhasil diedit!');

        } else {
            session()->flash('error', 'User gagal diedit!');
        }
        return redirect()->back();
    }

    public function userdestroy(string $id)
    {
        $user = User::find($id);
        // @dd($product);
        // if ($product->image) {
        //     Storage::delete($product->image);
        // }

        $user->delete();
        return redirect()->back()->with('Succes delete');
    }
}
