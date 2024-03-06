<?php

namespace App\Livewire\CartView;

use App\Models\Cart;
use App\Models\Inventory;
use Livewire\Component;
use ourcodeworld\NameThatColor\ColorInterpreter;

class Index extends Component
{
    public $id;

    public $user_id;

    public $vendor_id;

    public $product_id;

    public $s_color;

    public $s_size;

    public $quantity;

    public function cart_delete($id)
    {
        Cart::find($id)->delete();
    }

    public function cart_edit($id)
    {
        $this->id = $id;
        $cart = Cart::find($id);
        $this->user_id = $cart->user_id;
        $this->vendor_id = $cart->vendor_id;
        $this->product_id = $cart->product_id;
        $this->s_color = $cart->color;
        $this->s_size = $cart->size;
        $this->quantity = $cart->quantity;
    }

    // Edit Cart
    public function edit_submit($id)
    {
        Cart::find($id)->update([
            'quantity' => $this->quantity,
            'size' => $this->s_size,
            'color' => $this->s_color,
        ]);
    }

    public function render()
    {
        return view(
            'livewire.cart-view.index',
            [
                'carts' => Cart::all(),
                'colors' => Inventory::Where('product_id', $this->product_id)
                    ->distinct()
                    ->get(),
                'color_name' => new ColorInterpreter(),
            ]
        );
    }
}
