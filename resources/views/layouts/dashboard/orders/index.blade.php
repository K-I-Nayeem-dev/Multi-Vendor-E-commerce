@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-head">
                    <h3>User Orders</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-dark table-striped" style="font-size: 13px">
                        <tr>
                            <th>SL</th>
                            <th>Order Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                            <th>Details</th>
                            <th>Order At</th>
                        </tr>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->orderId }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>
                                    <form action="{{ route('order.status', $order->id) }}" method="POST">
                                        @csrf
                                        <div class="dropdown">
                                            <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                @if($order->status == 0)
                                                    Pending
                                                @elseif ($order->status == 1)
                                                    Processing
                                                @elseif ($order->status == 2)
                                                    Shipped
                                                @elseif ($order->status == 3)
                                                    Deliverd
                                                @elseif ($order->status == 4)
                                                    Complete
                                                @elseif ($order->status == 5)
                                                    Cancel
                                                @endif
                                                </button>
                                                <div class="dropdown-menu">
                                                <button name="status" value="0" class="dropdown-item" type="submit">Pending</button>
                                                <button name="status" value="1" class="dropdown-item" type="submit">Processing</button>
                                                <button name="status" value="2" class="dropdown-item" type="submit">Shipped</button>
                                                <button name="status" value="3" class="dropdown-item" type="submit">Deliverd</button>
                                                <button name="status" value="4" class="dropdown-item" type="submit">Complete</button>
                                                <button name="status" value="5" class="dropdown-item" type="submit">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{ route('order.details', $order->id) }}">Details</a>
                                </td>
                                <td>{{ $order->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $orders->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
