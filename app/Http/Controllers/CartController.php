<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Products;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Add to Cart Product Code
    public function cart(Request $request)
    {
        Cart::insert([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'vendor_id' => $request->vendor_id,
            'size' => $request->size,
            'color' => $request->color,
            'quantity' => $request->quantity,
            'created_at' => Carbon::now(),
        ]);

        return back();
    }

    //Cart Products view
    public function cartview()
    {
        return view('layouts.frontend.cartview');
    }

    // Add Cart To Product by Route
    public function add_to_cart($id)
    {
        $product = Products::find($id);
        Cart::insert([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'vendor_id' => $product->user_id,
            'size' => 'null',
            'color' => 'null',
            'quantity' => 1,
            'created_at' => Carbon::now(),
        ]);

        return redirect('/');
    }

    // Cart Index Controller
    public function cart_products()
    {
        // $carts = Cart::all();
        return view('layouts.dashboard.Cart.index');
    }
}
