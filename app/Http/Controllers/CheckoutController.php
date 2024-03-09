<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Coupon;

class CheckoutController extends Controller
{
    /**
     * Check out the shopping cart and render the checkout view if the cart has items.
     * 
     * Get the current user's cart items. 
     * If there are items in the cart, render the checkout view.
     * If the cart is empty, redirect to the cart view.
     */
    public function check_out()
    {
        /**
         * Get the current user's cart items.
         * Check if the cart has items. 
         * If there are items, get any applied coupon and render the checkout view.
         * Pass the coupon to the view.
         * If the cart is empty, redirect to the cart view.
         */
        $carts = Cart::Where('user_id', auth()->id())->get();

        if ($carts->count() > 0) {
            return view('layouts.frontend.checkout.checkout');
        }

        return redirect()->route('cartview');
    }

    /**
     * Store a new order in the database.
     * 
     * Generates a unique order ID, gets the user's cart items, and creates a new Order record.
     * Also creates OrderItem records for each cart item, associating them with the new order.
     * 
     * After order is created, empties the cart and session data.
     */
    public function orderStore(OrderRequest $request)
    {

        $orderId = uniqid();
        $carts = Cart::Where('user_id', auth()->id())->get();

        if ($carts->count() > 0) {
            // order insert in database
            Order::create($request->except('_token') + [
                'orderId' => $orderId,
                'updated_at' => null,
            ]);

            // orders items insert in database
            foreach ($carts as $cart) {
                OrderItem::insert([
                    'orderId' => $orderId,
                    'userId' => auth()->id(),
                    'vendorId' => $cart->vendor_id,
                    'productId' => $cart->product_id,
                    'colorId' => $cart->color,
                    'sizeid' => $cart->size,
                    'quantity' => $cart->quantity,
                    'created_at' => now(),
                ]);
            }

            // coupon Delete if order placed
            session()->forget('coupon');
            session()->forget('sub');

            // delete cart products after order place
            Cart::where('user_id', auth()->id())->delete();

            return redirect()->route('orderInformation');
        }
    }

    public function orderInformation()
    {
        
        /**
         * Get the latest order for the authenticated user 
         * and pass it to the thankyou view along with the related order items.
         * 
         * Check if the order has already been visited to prevent 
         * going to the thankyou page multiple times.
         * If visited, redirect to homepage, otherwise 
         * render the thankyou view.
         */
        $order = Order::Where('userId', auth()->id())->latest()->first();

        $visited = $order->visited;

        if ($visited == 0) {

            $visited = $order->increment('visited');

            return view(
                'layouts.frontend.thankyou.thankyou',
                [
                    'order' => $order,
                    'orderItems' => OrderItem::Where('orderId', $order->orderId)->get(),
                ]
            );
        }
        return redirect('/');
    }
}