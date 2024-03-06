<?php

namespace App\Livewire\ProductDetails;

use App\Models\Inventory;
use App\Models\ProductGallery;
use App\Models\Products;
use Livewire\Component;
use ourcodeworld\NameThatColor\ColorInterpreter;

class ProductDetails extends Component
{
    public $id;

    public $products;

    public $inventory_variation;

    public $inventory_color;

    public $releted_product;

    public $size;

    public $select_size;

    public $select_color;

    // protected $quaryString = ['select_size','select_color'];

    public function mount($id)
    {
        $this->products = Products::find($id);

        $this->releted_product = Products::where('category_id', $this->products->category_id)->where('id', '!=', $id)->get();

        // for ($i = 0; $i < count($this->inventory_variation); $i++) {
        //     // echo "<pre>";
        //     $this->size = $this->inventory_variation[$i]->size_variation;
        //     // echo "</pre>";
        // }
    }

    public function updatedSeleted()
    {
        dd('hello');
    }

    public function render()
    {

        $this->inventory_variation = Inventory::Where('product_id', $this->products->id)
            ->Select('size_variation')
            ->orderByraw('CHAR_LENGTH(size_variation) ASC')
            ->distinct()
            ->get();

        foreach ($this->inventory_variation as $inventory_variation) {
            $this->size = $inventory_variation->size_size_variation;
        }

        $this->inventory_color = Inventory::Where('product_id', $this->products->id)
            ->orWhere('size_variation', $this->size)
            ->Select('color')
            ->orderBy('color', 'ASC')
            ->distinct()
            ->get();

        return view('livewire.product-details.product-details',
            [
                'color_name' => new ColorInterpreter(),
                'multiImg' => ProductGallery::Where('product_id', $this->products->id)->get(),
            ]
        );
    }
}
