<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function customer_registration(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
            'role' => 'customer',
            'created_at' => Carbon::now(),
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

            if (Auth::user()->role == 'customer') {
                return redirect('/');
            }
            // else if(Auth::user()->role == 'seller'){
            //     return view('layouts.frontend.sellerDashboard');
            // }
            else {
                return view('layouts.dashboard.index');
            }
        }

        return back()->with('customerRegSuccessful', 'Customer Registration Successfully Done');

    }
}
