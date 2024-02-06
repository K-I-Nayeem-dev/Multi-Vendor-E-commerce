<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Relation to Product
    public function rel_to_product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    // Relation to Size
    public function rel_to_size()
    {
        return $this->belongsTo(Variation::class, 'size');
    }

    // Relation to Size
    public function rel_to_color()
    {
        return $this->belongsTo(Color::class, 'color');
    }
}
