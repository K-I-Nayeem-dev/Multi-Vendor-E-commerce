<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    // this is HasOne Relation
    public function color_full(){
        return $this->hasOne(Color::class, 'id', 'color');
    }

    // this is Belongs To Relation
    // public function color_full(){
    //     return $this->belongsTo(Color::class, 'color');
    // }

}
