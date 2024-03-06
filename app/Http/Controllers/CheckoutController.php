<?php

namespace App\Http\Controllers;

class CheckoutController extends Controller
{
    public function check_out()
    {
        return view('layouts.frontend.checkout.checkout');
    }
}
