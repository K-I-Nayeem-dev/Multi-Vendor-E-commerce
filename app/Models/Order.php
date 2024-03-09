<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the coupon that belongs to the order.
     */
    public function relToCoupon()
    {
        return $this->hasOne(Coupon::class, 'id', 'coupon');
    }

    public function relToUsers(){
        return $this->hasOne(User::class, 'id', 'userId');
    }

}