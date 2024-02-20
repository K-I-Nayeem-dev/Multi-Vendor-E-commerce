<?php

namespace App\Livewire\Coupon;

use App\Models\Coupon as ModelsCoupon;
use App\Models\CouponType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;

class Coupon extends Component
{
    // coupon add property
    #[Validate('required')] 
    public $coupon_name,  $coupon_date, $coupon_value;
    
    // coupon add property
    public $id, $coupon_type;

    // coupon edit property
    public $name,$type,$value,$date;



    // created coupon data in database
    public function couponAdd()
    {
        $this->validate();
        ModelsCoupon::create([
            'coupon_name' => Str::upper($this->coupon_name),
            'coupon_type' => $this->coupon_type,
            'coupon_value' => $this->coupon_value,
            'coupon_date' => $this->coupon_date,
            'created_at' => Carbon::now(),
            'user_id' => Auth::id(),
        ]);
        $this->reset();
    }

    // delete coupon 
    public function coupon_delete($id){
        ModelsCoupon::find($id)->delete();
    }

    // edit coupon
    public function coupon_edit($id){
        $this->id = $id;
        $coupon = ModelsCoupon::find($id);
        $this->name = $coupon->coupon_name;
        $this->type = $coupon->coupon_type;
        $this->value = $coupon->coupon_value;
        $this->date = $coupon->coupon_date;

    }

    //Update Coupon
    public function couponUpdate($id){
        ModelsCoupon::find($id)->update([
            'coupon_name'=> $this->name,
            'coupon_type'=> $this->type,
            'coupon_value'=> $this->value,
            'coupon_date'=> $this->date,
        ]);
    }

    public function render()
    {
        return view(
            'livewire.coupon.coupon',
            [
                'coupon_types'=> CouponType::Where('user_id', auth()->id())->latest()->distinct()->get(),
                'coupons' => ModelsCoupon::Where('user_id', auth()->id())->latest()->paginate(5),
            ]
        );
    }
}
