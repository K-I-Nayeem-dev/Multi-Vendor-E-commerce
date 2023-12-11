<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;
    protected $guarded = [];

    // function testHasOne (){
    //     return $this->hasOne(Category::class, 'id', 'category_id');
    // }

    public function getCreatedAtAttribute($value){
        return date("d-M-y", strtotime($value));
    }

}
