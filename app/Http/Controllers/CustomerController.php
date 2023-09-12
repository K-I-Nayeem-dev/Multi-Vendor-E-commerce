<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class CustomerController extends Controller
{
    public function customer_registration(Request $request){


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
            'role' => 'customer',
        ]);

        return back()->with('customerRegSuccessful', 'Customer Registration Successfully Done' );

    }
}
