<?php

namespace App\Livewire\Inventory;

use Livewire\Component;
use App\Models\Color;
use App\Models\Inventory as ModelsInventory;
use App\Models\Products;
use App\Models\Variation;
use ourcodeworld\NameThatColor\ColorInterpreter;
use Carbon\Carbon;

class Inventory extends Component
{

    // define properties
    public $id, $quantity, $size, $color, $product, $variation, $price;

    public function mount($id){
        $this->product = Products::find($id);
        $this->variation = Variation::where('category_id', $this->product->category_id)
                                    ->where('user_id', auth()->id())
                                    ->get();
    }

    // public function mounted($id){
    //     $this->product = Products::find($id);
    //     $this->variation = Variation::where('category_id', $this->product->category_id)->get();
    // }

    // define Methods
    public function render()
    {
        $colors = Color::where('user_id', auth()->id())->get();
        $color_name = new ColorInterpreter();
        $inventory = ModelsInventory::where('product_id', $this->product->id)
                                    ->where('user_id', auth()->id())
                                    ->paginate(6);
        return view('livewire.inventory.inventory', compact('inventory','colors', 'color_name'));
    }
    
    // public function rules(){
    //     return[
    //         'color' => 'required|unique:colors,color',
    //         'colorName' => 'required|unique:colors,color_name',
    //     ];
    // }

    public function inventory()
    {
        ModelsInventory::insert([
            'user_id' => auth()->id(),
            'category_id' => $this->product->category_id,
            'product_id' => $this->product->id,
            'color' => $this->color,
            'size_variation' => $this->size,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'created_at' => Carbon::now(),
        ]);
    }

    public function delete($id){
        ModelsInventory::find($id)->delete();
    }

}
