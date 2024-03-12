@extends('layouts.dashboard.dashboard')

@section('content')
    <livewire:orders.order :id="$order->id" >

    {{-- <div class="card">
        <div class="card-header">{{ $user->name }} Orders</div>
        <div class="card-body">
            <table class="table table-bordered table-dark">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Order ID</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Created AT</th>
                </tr>
                @foreach ($orderID as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->orderId }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->company }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div> --}}
@endsection
