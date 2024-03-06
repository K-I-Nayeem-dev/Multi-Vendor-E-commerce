<?php

namespace App\Livewire\Colors;

use App\Models\Color;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;
use ourcodeworld\NameThatColor\ColorInterpreter;

class Colors extends Component
{
    // Adding Colors to Database
    #[Validate()]
    public $color;

    public $colorName;

    public $c_id;

    public function rules()
    {
        return [
            'color' => 'required|unique:colors,color',
            'colorName' => 'required|unique:colors,color_name',
        ];
    }

    public function colorInsert()
    {
        Color::insert([
            'color' => $this->color,
            'user_id' => auth()->id(),
            'color_name' => $this->colorName,
            'created_at' => Carbon::now(),
        ]);
        $this->reset();

        return back()->with('addColors', 'Add Size Successfully');
    }

    public function updated()
    {
        $color_name = new ColorInterpreter();
        $this->colorName = $color_name->name($this->color)['name'];
    }

    // Delete Data from Database
    public function deleteColor($id)
    {
        Color::find($id)->delete();
    }

    // Delete Data from Database
    public function editColor($id)
    {
        $this->c_id = $id;
        $color = Color::find($id);
        $this->color = $color->color;
    }

    // Delete Data from Database
    public function updateColor($id)
    {
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
