@extends('layouts.frontend.frontend_master')

@section('content')
    <livewire:product-details.product-details :id="$products->id">
@endsection

@push('js')
    <script src="/Js/Products/productPrize.js"></script>
@endpush
