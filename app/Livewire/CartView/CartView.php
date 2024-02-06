<?php

namespace App\Livewire\CartView;

use App\Models\Cart;
use Livewire\Component;
use ourcodeworld\NameThatColor\ColorInterpreter;

class CartView extends Component
{

    public $total_price = 0;
    public $delivery_charge = 0;

    public function updatedDelivery_charge(){
        dd('hello');
    }

    // Decrement Quantity * Price
    public function decrement(int $id){
        $cartData = Cart::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if($cartData){
            $cartData->decrement('quantity');
        }
    }

    // Increment Quantity * Price
    public function increment(int $id){
        $cartData = Cart::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if($cartData){
            $cartData->increment('quantity');
        }
    }


    // Render Cart-View
    public function render()
    {
        $carts = Cart::where('user_id', auth()->id())->get();
        $color_name = new ColorInterpreter();
        return view(
            'livewire.cart-view.cart-view',
            [
                'carts' => $carts,
                'color_name' => $color_name,
            ]
        );
    }

    // Click Remove Cart Item
    public function itemRemove($id)
    {
        Cart::find($id)->delete();
    }

    // Order Add
    public function order(){

    }


}
