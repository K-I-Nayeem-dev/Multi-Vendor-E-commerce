<?php

namespace App\Livewire\Orders;

use App\Models\Color;
use App\Models\OrderItem;
use App\Models\Order as ModelOrder;
use App\Models\Products;
use App\Models\Variation;
use Livewire\Component;

class Order extends Component
{
    public $order;
    public $orderItem;
    public $sizes;
    
    public function mount($id){
        $this->order = ModelOrder::find($id);
        // $this->orderItem = OrderItem::Where('userId' , auth()->id())->get();
        // $this->sizes = Variation::Where('category_id', $this->orderItem->sizeid)->get();
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

        // $category = Category::all();

        return view('livewire.orders.order',
            [
                'order' =>  $this->order,
                'order_items' => OrderItem::Where('orderId', $this->order->orderId)->get(),
                'division' => $decode_divisions,
                'district' => $decode_districts,
                'colors' => Color::all(),
                // 'sizes' => ,
            ]
        );
    }

    public function removeProduct($id){

        return $id;
        ModelOrder::find($id)->update([
            'total' => 'dfa',
        ]);
        OrderItem::find($id)->delete();
    }

}