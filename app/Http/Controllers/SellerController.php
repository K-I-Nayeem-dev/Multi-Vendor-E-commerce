<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class SellerController extends Controller
{
    public function seller_registration(Request $request){


        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'role' => 'seller',
        ]);

        return back()->with('sellerRegSuccessful', 'Seller Registration Successfully Done' );

    }
}
