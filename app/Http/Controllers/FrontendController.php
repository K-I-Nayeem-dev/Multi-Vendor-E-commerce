<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
