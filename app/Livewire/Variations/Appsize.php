<?php

namespace App\Livewire\Variations;

use App\Models\Variation;
use Carbon\Carbon;
use Livewire\Component;

class Appsize extends Component
{

    // Adding Sizes to Database
    public $size, $v_id  ;
    public function sizeInsert(){
        Variation::insert([
            'size' => $this->size,
            'user_id' => auth()->id(),
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
        $sizes = Variation::where('user_id', auth()->id())->latest()->get();
        return view('livewire.variations.appsize', compact('sizes'));
    }
}
