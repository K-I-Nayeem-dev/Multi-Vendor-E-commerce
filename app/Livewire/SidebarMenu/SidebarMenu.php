<?php

namespace App\Livewire\SidebarMenu;

use App\Models\Cart;
use Livewire\Component;

class SidebarMenu extends Component
{
    public $total = 0;

    public function removeItem($id)
    {
        Cart::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.sidebar-menu.sidebar-menu');
    }
}
