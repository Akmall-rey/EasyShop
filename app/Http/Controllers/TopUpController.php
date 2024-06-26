<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the form for topping up balance.
     */
    public function showTopUpForm()
    {
        return view('topup');
    }

    /**
     * Handle the top-up form submission.
     */
    public function topUp(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $user->saldo += $request->amount;
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Balance topped up successfully!');
    }
}

