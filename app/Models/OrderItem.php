<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * Defines relationships to other models:
     * - relToProduct: HasOne relationship to Products model
     * - relToSize: HasOne relationship to Variation model 
     * - relToColor: HasOne relationship to Color model
     */
    protected $guarded = [];

    public function relToProduct()
    {
        return $this->hasOne(Products::class, 'id', 'productId');
    }

    public function relToSize()
    {
        return $this->hasOne(Variation::class, 'id', 'sizeid');
    }

    public function relToColor()
    {
        return $this->hasOne(Color::class, 'id', 'colorId');
    }
    
}