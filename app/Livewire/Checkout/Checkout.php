<?php

namespace App\Livewire\Checkout;
use Livewire\Component;

class Checkout extends Component
{

    public $decode_divisions, $decode_districts;

    public function mount(){
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
        return view(
            'livewire.checkout.checkout',
            [
                'divisions' => $this->decode_divisions,
                'districts' => $this->decode_districts,
            ]
        );
    }
}