<?php

namespace App\Livewire\CartView;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;
use ourcodeworld\NameThatColor\ColorInterpreter;

class CartView extends Component
{
    public $total_price = 0;

    public $coupon_error;

    public $type;

    #[Validate('required')]
    public $coupon;

    // public function updatedDelivery_charge(){

    //     if($this->delivery_charge == 80){
    //         session()->put('inside_dhaka', $this->delivery_charge = 80);
    //     }

    //     if($this->delivery_charge == 140){
    //         session()->put('outside_dhaka', $this->delivery_charge = 140);
    //     }

    // }

    // Decrement Quantity * Price
    public function decrement(int $id)
    {
        $cartData = Cart::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            $cartData->decrement('quantity');
        }
    }

    // Increment Quantity * Price
    public function increment(int $id)
    {
        $cartData = Cart::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($cartData) {
            $cartData->increment('quantity');
        }
    }

    // Render Cart-View
    public function render()
    {
        return view(
            'livewire.cart-view.cart-view',
            [
                'carts' => Cart::where('user_id', auth()->id())->get(),
                'color_name' => new ColorInterpreter(),
                'coupons' => Coupon::all()->count(),
            ]
        );
    }

    // Click Remove Cart Item
    public function itemRemove($id)
    {
        Cart::find($id)->delete();
    }

    // Order Add
    public function coupons()
    {
        $this->validate();
        $this->type = Coupon::Where('coupon_name', $this->coupon)->first();

        //Coupon Validation
        if (! $this->type) {
            $this->coupon_error = 'Invalid Coupon Code';
        } else {
            // Coupon Add to Cart list
            if ($this->coupon == $this->type->coupon_name) {
                session()->put('coupon', [
                    'name' => $this->coupon,
                    'message' => 'Coupon Added Succssfully',
                    'discount' => $this->type->coupon_value,
                ]);
                $this->reset();
            } else {
                $this->coupon_error = 'Invalid Coupon Code';
            }
        }

    }

    //coupon Remove
    public function coupon_remove()
    {
        session()->forget('coupon');
        $this->coupon_error = '';
    }
}
