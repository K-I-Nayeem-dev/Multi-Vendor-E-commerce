<div>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card" style="background-color: black;">
                <div class="card-header">
                    <h4 class="text-warning">Order Details</h4>
                </div>
                {{-- /**
                * Renders a table with order details.
                *
                * Displays order attributes like ID, name, email, address etc.
                * Uses Blade syntax to render different values based on conditions.
                * Loops through divisions and districts to find the one matching the order.
                * Shows translated names where available.
                * Formats statuses, payment methods, etc. into human readable text.
                */ --}}
                <div class="card-body">
                    <table class="table table-bordered text-warning">
                        <tr>
                            <th>ID</th>
                            <td>{{ $order->id }}</td>
                        </tr>
                        <tr>
                            <th>Order ID</th>
                            <td>{{ $order->orderId }}</td>
                        </tr>
                        <tr>
                            <th>User Name & User ID</th>
                            <td>{{ $order->relToUsers->name }} == ID : {{ $order->userId }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $order->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $order->email }}</td>
                        </tr>
                        <tr>
                            <th>Company</th>
                            <td>{{ $order->company }}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $order->phone }}</td>
                        </tr>
                        <tr>
                            <th>Division</th>
                            @foreach ($division as $divi)
                                @if ($order->division == $divi->id)
                                    <td>{{ $divi->bn_name }}</td>
                                @endif
                            @endforeach
                        </tr>
                        <tr>
                            <th>District</th>
                            @foreach ($district as $district)
                                @if ($order->division == $district->id)
                                    <td>{{ $district->bn_name }}</td>
                                @endif
                            @endforeach
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $order->address }}</td>
                        </tr>
                        <tr>
                            <th>Notes</th>
                            <td>{{ $order->notes }}</td>
                        </tr>
                        <tr>
                            <th>Vat</th>
                            <td>{{ $order->vat }}</td>
                        </tr>
                        <tr>
                            <th>Coupon</th>
                            <td>{{ !$order->coupon ? 'Null' : $order->relToCoupon->coupon_name  }}</td>
                        </tr>
                        <tr>
                            <th>Total Amount</th>
                            <td>{{ $order->totalAmount }}</td>
                        </tr>
                        <tr>
                            <th>Delivery Charge</th>
                            @if ($order->deliveryCharge == 0)
                                <td>Inside Dhaka</td>
                            @elseif ($order->deliveryCharge == 1)
                                <td>Outside Of Dhaka</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            @if ($order->payment_method == 0)
                                <td>Cash On Delivery</td>
                            @elseif ($order->payment_method == 1)
                                <td>SSl Commercez</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Visited</th>
                            @if ($order->visited == 0)
                                <td>False</td>
                            @elseif ($order->visited)
                                <td>True</td>
                            @endif
                        </tr>
                        <tr>
                            <th>Status</th>
                            @if ($order->status == 0)
                                <td>Pending</td>
                            @elseif ($order->status == 1)
                                <td>Processing</td>
                            @elseif ($order->status == 2)
                                <td>Shipped</td>
                            @elseif ($order->status == 3)
                                <td>Deliverd</td>
                            @elseif ($order->status == 4)
                                <td>Complete</td>
                            @elseif ($order->status == 5)
                                <td>Cancel</td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order Items</h4>
                </div>
                <div class="card-body">
                    <table class="table table-dark table-bordered" style="font-size: 14px;">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($order_items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->relToProduct->name }}</td>
                                <td><img width="150" height="100"
                                        src="{{ asset('uploads/thumbnail_photos/') }}/{{ $item->relToProduct->thumbnail }}"
                                        alt=""></td>
                                <td>
                                    {{ $item->relToColor->color_name }}</td>
                                <td>{{ $item->relToSize->size }}</td>
                                <td>{{ $item->relToProduct->discount_price }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->relToProduct->discount_price * $item->quantity }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </button>
                                        <button type="submit" wire:click='removeProduct({{ $item->id }})' class="btn btn-sm btn-danger"><i class="fa fa-trash" style="font-size: 18px" aria-hidden="true"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Item Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form  method="post">
                        <label>Color</label>
                        <select class="form-control mb-2">
                            <option value="">Select Color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                            @endforeach
                        </select>
                        <label>Variation</label>
                        <select class="form-control mb-2">
                            <option value="">Select Variation</option>
                            {{-- @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                            @endforeach --}}
                        </select>

                    </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary btn-sm">Update</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
