<?php

namespace App\Http\Controllers;

class CouponController extends Controller
{
    // Coupon View Page
    public function coupon()
    {
        return view('layouts.dashboard.coupon.coupon');
    }

    // Coupon Type View Page
    public function coupon_type()
    {
        return view('layouts.dashboard.coupon-type.coupon_type');
    }
}
