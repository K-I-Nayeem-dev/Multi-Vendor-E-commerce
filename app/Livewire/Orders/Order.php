<?php

namespace App\Livewire\Orders;

use App\Models\OrderItem;
use App\Models\Order as ModelOrder;
use Livewire\Component;

class Order extends Component
{
    public $order;
    
    public function mount($id){
        $this->order = ModelOrder::find($id);
    }
    
    public function render()
    {
        // Divisions File
        $file_one = 'divisions.json';
        $divisions = file_get_contents($file_one);
        $decode_divisions = json_decode($divisions);

        // district File
        $file_two = 'districts.json';
        $districts = file_get_contents($file_two);
        $decode_districts = json_decode($districts);
        return view('livewire.orders.order',
            [
                'order' =>  $this->order,
                'order_items' => OrderItem::Where('orderId', $this->order->orderId)->get(),
                'division' => $decode_divisions,
                'district' => $decode_districts,
            ]
        );
    }

    public function removeProduct($id){
        ModelOrder::find($id)->update([
            'total' =>
        ])
        OrderItem::find($id)->delete();
    }

}