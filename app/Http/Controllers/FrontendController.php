<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function frontend_master()
    {
        return view('layouts.frontend.index');
    }
    public function frontend_home()
    {
        return view('layouts.frontend.home');
    }
    public function frontend_about()
    {
        return view('layouts.frontend.about');
    }
    public function frontend_contact()
    {
        return view('layouts.frontend.contact');
    }
    public function account_registration()
    {
        return view('layouts.frontend.account_registration');
    }

    public function account_login()
    {
        return view('layouts.frontend.account_login');
    }

    public function accounts(Request $request){
        // echo $request->email . "<br>";
        // echo $request->password;
        if(Auth::attempt(['email'=>$request->email, 'password'=> $request->password])){

            if(Auth::user()->role == 'customer'){
                return view('layouts.frontend.customerDashboard');
            }
            else if(Auth::user()->role == 'seller'){
                return view('layouts.frontend.sellerDashboard');
            }
            else{
                return view('layouts.dashboard.index');
            }
        }
        else{
            return back()->with('login_err', 'These credentials do not match our records. ');
        }
    }

    public function seller_dashboard(){
        return view('layouts.frontend.sellerDashboard');
    }

    public function customer_dashboard(){
        return view('layouts.frontend.customerDashboard');
    }


}
