@extends('layouts.dashboard.dashboard')

@section('content')
    <livewire:inventory.inventory :id="$product->id">
@endsection
