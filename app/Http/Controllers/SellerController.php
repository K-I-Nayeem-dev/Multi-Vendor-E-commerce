<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Intervention\Image\ImageManagerStatic as Image;

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
            'created_at'=> Carbon::now(),
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=> $request->password])){

            if(Auth::user()->role == 'seller'){
                return redirect('/');
            }
            // else if(Auth::user()->role == 'seller'){
            //     return view('layouts.frontend.sellerDashboard');
            // }
            else{
                return view('layouts.dashboard.index');
            }
        }

        return back()->with('sellerRegSuccessful', 'Seller Registration Successfully Done' );

    }

    public function accounts_update(Request $request)
    {
        // $request->validate([
        //     'name'=>'required',
        //     'email'=>'required',
        //     'password'=>'required',
        //     'phone_number'=>'required',
        // ]);

        User::find(auth()->id())->update(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone_number' => $request->phone_number,
                'updated_at'=> Carbon::now(),
            ]
        );

        return back()->with('profile_update', Auth::user()->role . ' Account Has been Updated');
    }

}
