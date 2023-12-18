<?php

namespace App\Livewire\Colors;

use Livewire\Component;
use App\Models\Color;
use Carbon\Carbon;
use ourcodeworld\NameThatColor\ColorInterpreter;

class Colors extends Component
{

    // Adding Colors to Database
    public $color , $c_id;
    public function colorInsert(){
        Color::insert([
            'color' => $this->color,
            'user_id' => auth()->id(),
            'created_at' => Carbon::now(),
        ]);
        $this->reset();
        return back()->with('addColors', 'Add Size Successfully');
    }

    // Delete Data from Database
    public function deleteColor($id){
        Color::find($id)->delete();
    }

    // Delete Data from Database
    public function editColor($id){
        $this->c_id = $id;
        $color = Color::find($id);
        $this->color = $color->color;
    }
    // Delete Data from Database
    public function updateColor($id){
        Color::find($id)->update([
            'color' => $this->color,
        ]);
    }

    public function render()
    {
        $colors = Color::where('user_id', auth()->id())->latest()->get();
        $color_name = new ColorInterpreter();
        return view('livewire.colors.colors', compact('colors', 'color_name'));
    }
}
