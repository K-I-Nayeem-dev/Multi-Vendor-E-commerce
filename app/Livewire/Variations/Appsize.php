<?php

namespace App\Livewire\Variations;

use App\Models\Color;
use App\Models\Variation;
use Carbon\Carbon;
use Livewire\Component;

class Appsize extends Component
{

    // Adding Sizes to Database
    public $size;
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

    public function render()
    {
        $sizes = Variation::where('user_id', auth()->id())->latest()->get();
        return view('livewire.variations.appsize', compact('sizes'));
    }
}
