<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard_home()
    {
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'moderator'){
            return view('layouts.dashboard.index');
        }
        // else if(Auth::user()->role == 'seller'){
        //     return view('layouts.frontend.customerDashboard');
        // }
        else{
            return redirect('/seller/dashboard');
        }
    }
    public function dashboard_profile()
    {
        return view('layouts.dashboard.profile.profile');
    }    

}
