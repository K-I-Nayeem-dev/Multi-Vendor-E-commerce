<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function relToType()
    {
        return $this->belongsTo(CouponType::class, 'coupon_type');
    }
}
