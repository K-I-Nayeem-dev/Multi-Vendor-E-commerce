<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{

    // Add to Cart Product Code
    public function cart(Request $request){
        Cart::insert([
            'user_id'=> $request->user_id,
            'product_id'=> $request->product_id,
            'vendor_id'=> $request->vendor_id,
            'size'=> $request->size,
            'color'=> $request->color,
            'quantity'=> $request->quantity,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }

    //Cart Products view
    public function cartview(){
        return view('layouts.frontend.cartview');
    }
}
