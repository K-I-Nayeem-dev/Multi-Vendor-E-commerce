<?php

namespace App\Livewire\Orders;

use App\Models\Category;
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
    
    public function mount($id){
        $this->order = ModelOrder::find($id);
        // $this->orderItem = OrderItem::Where('userId' , auth()->id())->get();
        // $this->sizes = Variation::Where('category_id', $this->orderItem->sizeid)->get();
    }
    
    public function render()
    {
        /**
         * Load divisions data from JSON file into $decode_divisions variable.
         * Load districts data from JSON file into $decode_districts variable.
         * Get all order items and assign to $this->orderItem property.
         */
        // Divisions File
        $file_one = 'divisions.json';
        $divisions = file_get_contents($file_one);
        $decode_divisions = json_decode($divisions);

        // district File
        $file_two = 'districts.json';
        $districts = file_get_contents($file_two);
        $decode_districts = json_decode($districts);

        $this->orderItem = OrderItem::all();

        return view('livewire.orders.order',
            /**
             * Pass data to the view for rendering.
             * 
             * @param order The order model instance. 
             * @param order_items The collection of order items for this order.
             * @param division The list of divisions from the JSON file. 
             * @param district The list of districts from the JSON file.
             * @param colors The list of available colors.
             * @param sizes The list of available sizes for this product category.
             */
            [
                'order' =>  $this->order,
                'order_items' => OrderItem::Where('orderId', $this->order->orderId)->get(),
                'division' => $decode_divisions,
                'district' => $decode_districts,
                'colors' => Color::all(),
                'sizes' => Variation::Where('category_id', $this->orderItem[0]->relToProduct->category_id)->get(),
            ]
        );
    }

    public function removeProduct($id){

        /**
         * Removes an order item by ID.
         * 
         * Finds the order by ID and updates the total.
         * Deletes the order item record with the matching ID.
         * 
         * @param int $id The ID of the order item to remove
         */
        return $id;
        ModelOrder::find($id)->update([
            'total' => 'dfa',
        ]);
        OrderItem::find($id)->delete();
    }

}