<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Variation;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function orders()
    {

        return view('layouts.dashboard.orders.index', [
            'orders' =>  Order::orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }


    public function order_details($id)
    {
        $order = Order::find($id);
        return view('layouts.dashboard.orders.show',compact('order'));
    }

    public function order_status(Request  $request, $id)
    {
        Order::find($id)->update([
            'status' => $request->status,
        ]);
        return back();
    }
}