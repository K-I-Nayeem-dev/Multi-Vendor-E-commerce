<?php

namespace App\Livewire\Wishlist;

use Livewire\Component;

class Wishlist extends Component
{

    public $total = 0;

    public function render()
    {
        return view('livewire.wishlist.wishlist');
    }
}
