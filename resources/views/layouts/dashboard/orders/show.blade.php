@extends('layouts.dashboard.dashboard')

@section('content')
    <livewire:orders.order :id="$order->id" >
@endsection
