<?php

namespace App\Livewire\Checkout;

use App\Models\Cart;
use App\Models\Coupon;
use Livewire\Component;

class Checkout extends Component
{
    public $decode_divisions;

    public $decode_districts;

    public $deliveryCharge = 0;

    public function mount()
    {
        // Divisions File
        $file_one = 'divisions.json';
        $divisions = file_get_contents($file_one);
        $this->decode_divisions = json_decode($divisions);

        // district File
        $file_two = 'districts.json';
        $districts = file_get_contents($file_two);
        $this->decode_districts = json_decode($districts);
    }

    public function render()
    {
        $coupon = '';
        if(session()->has('coupon')){
            $coupon = Coupon::Where('coupon_name', session()->get('coupon')['name'])->get();
        }
        return view(
            'livewire.checkout.checkout',
            [
                'divisions' => $this->decode_divisions,
                'districts' => $this->decode_districts,
                'carts' => Cart::Where('user_id', auth()->id())->get(),
                'coupon' => $coupon,
            ]
        );
    }
}