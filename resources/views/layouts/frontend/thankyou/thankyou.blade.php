@extends('layouts.frontend.frontend_master')

@section('content')
    <section class="h-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-10 col-xl-8">
                    <div class="card" style="border-radius: 10px;">
                        <div class="card-header px-4 py-5">
                            <h5 class="text-muted mb-0">Thanks for your Order, <span
                                    style="color: #a8729a;">{{ $order->name }}</span> !</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <p class="lead fw-normal mb-0" style="color: #a8729a;">Receipt</p>
                                <p class="small text-muted mb-0">Order ID : {{ $order->orderId }}</p>
                            </div>
                            <div class="d-flex justify-content-around borderpy-2">
                                <p>Image</p>
                                <p>Name</p>
                                <p>Color</p>
                                <p>Size</p>
                                <p>Quantity</p>
                                <p>Price</p>
                            </div>
                            <div class="card shadow-0 border mb-4">
                                
                                {{-- Initialize the total variable to 0.
                                This will be used to calculate the order total. --}}
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($orderItems as $item)
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <img src="{{ asset('uploads/thumbnail_photos') }}/{{ $item->relToProduct->thumbnail }}"
                                                    class="img-fluid" alt="{{ $item->relToProduct->name }}">
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0">{{ $item->relToProduct->name }}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">{{ $item->relToColor->color_name }}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">{{ $item->relToSize->size }}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">{{ $item->quantity }}</p>
                                            </div>
                                            <div class="col-md-2 text-center d-flex justify-content-center align-items-center">
                                                <p class="text-muted mb-0 small">&#2547;{{ $item->relToProduct->discount_price * $item->quantity }}</p>
                                            </div>
                                        </div>
                                        <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                                        {{-- <div class="row d-flex align-items-center">
                                            <div class="col-md-2">
                                                <p class="text-muted mb-0 small">Track Order</p>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="progress" style="height: 6px; border-radius: 16px;">
                                                    <div class="progress-bar" role="progressbar"
                                                        style="width: 65%; border-radius: 16px; background-color: #a8729a;"
                                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="d-flex justify-content-around mb-1">
                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Out for delivary</p>
                                                    <p class="text-muted mt-1 mb-0 small ms-xl-5">Delivered</p>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>

                                    {{-- Adds the discounted price multiplied by the quantity to the total variable.
                                    The total variable tracks the order total. --}}
                                    
                                    @php
                                        $total += $item->relToProduct->discount_price * $item->quantity;
                                    @endphp

                                @endforeach
                            </div>

                            <div class="d-flex justify-content-between pt-2">
                                <p class="fw-bold mb-0">Order Details</p>
                                <p class="text-muted mb-0"><span class="fw-bold me-4">Total</span>&#2547;{{ $total }}</p>
                            </div>

                            @if($order->coupon)    
                                <div class="d-flex justify-content-between pt-2">
                                    <p class="text-muted mb-0">Coupon</p>
                                    <p class="text-muted mb-0"><span class="fw-bold me-4">{{ $order->relToCoupon->coupon_name }}</span>-&#2547;{{ $order->relToCoupon->coupon_value }} </p>
                                </div>
                            @endif

                            <div class="d-flex justify-content-between">
                                <p class="text-muted mb-0">Invoice Date : {{ date('d-m-Y', strtotime($order->created_at)) }}</p>
                                <p class="text-muted mb-0"><span class="fw-bold me-4">Vat 5%</span>&#2547;{{ $order->vat }}</p>
                            </div>

                            <div class="d-flex justify-content-end mb-5">
                                {{-- <p class="text-muted mb-0">Recepits Voucher : 18KU-62IIK</p> --}}
                                <p class="text-muted mb-0"><span class="fw-bold me-4">Delivery Charges</span> Free</p>
                            </div>
                        </div>
                        <div class="card-footer border-0 px-4 py-5"
                            style="background-color: #a8729a; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                            <h5 class="d-flex align-items-center justify-content-end text-white text-uppercase mb-0">Total
                                paid: <span class="h2 mb-0 ms-2">&#2547;{{ $order->totalAmount }} </span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
