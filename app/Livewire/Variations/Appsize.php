<?php

namespace App\Livewire\Variations;

use App\Models\Category;
use App\Models\Variation;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Appsize extends Component
{

    use WithPagination;

    // Adding Sizes to Database
    public $size, $v_id , $category ;
    public function sizeInsert(){
        Variation::insert([
            'size' => $this->size,
            'user_id' => auth()->id(),
            'category_id' => $this->category,
            'created_at' => Carbon::now(),
        ]);
        $this->reset();
        return back()->with('addSize', 'Add Size Successfully');
    }

    // Delete Data from Database
    public function deleteSize($id){
        Variation::find($id)->delete();
    }

    // Edit Data from Database
    public function editSize($id){
        $this->v_id = $id;
        $size = Variation::find($id);
        $this->size = $size->size;
    }
    
    //Update Data form Database
    public function updateSize($id){
        Variation::find($id)->update([
            'size'=> $this->size,
            'updated_at'=> now(),
        ]);
        $this->reset();
    }

    public function render()
    {
        $categories = Category::all();
        $sizes = Variation::where('user_id', auth()->id())->latest()->get();
        return view('livewire.variations.appsize', compact('sizes', 'categories'));
    }
}
