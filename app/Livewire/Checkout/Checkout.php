<?php

namespace App\Livewire\Checkout;

use App\Models\Cart;
use Livewire\Component;

class Checkout extends Component
{

    public $decode_divisions, $decode_districts;
    public $total_price = 0;
    public $delivery_charge = 0;

    // district Function
    public function updated()
    {
        dd('hello');
    }

    public function render()
    {
        // Divisions File
        $file_one = 'divisions.json';
        $divisions = file_get_contents($file_one);
        $this->decode_divisions = json_decode($divisions);

        // district File
        $file_two = 'districts.json';
        $districts = file_get_contents($file_two);
        $this->decode_districts = json_decode($districts);

        foreach (Cart::Where('user_id', auth()->id())->get() as $cart) {
            $this->total_price += $cart->rel_to_product->discount_price * $cart->quantity;
        }

        return view(
            'livewire.checkout.checkout',
            [
                'divisions' => $this->decode_divisions,
                'districts' => $this->decode_districts,
            ]
        );
    }
}
