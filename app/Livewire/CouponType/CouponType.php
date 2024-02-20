<?php

namespace App\Livewire\CouponType;

use App\Models\CouponType as ModelsCouponType;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CouponType extends Component
{


    public $id, $coupons;


    #[Validate('required')] 
    public $coupon_type;
    
    // Coupon Added
    public function couponTypeAdd(){

        $this->validate();

        ModelsCouponType::insert([
            'user_id' => auth()->id(),
            'type' => $this->coupon_type,
            'created_at' => Carbon::now()
        ]);

        $this->reset();
    }


    // Coupon Edit
    public function edit($id){
        $this->id = $id;
        $coupon = ModelsCouponType::find($id);
        $this->coupons = $coupon->type;
    }

    // Update Update
    public function couponUpdate($id){
        ModelsCouponType::find($id)->update([
            'type'=> $this->coupons,
            'updated_at' => Carbon::now()
        ]);
    }

    // Coupon Delete
    public function delete($id){
        ModelsCouponType::find($id)->delete();
    }

    public function render()
    {
        $coupon_types = ModelsCouponType::Where('user_id', auth()->id())->latest()->paginate(5);
        return view('livewire.coupon-type.coupon_type', compact('coupon_types'));
    }
}
