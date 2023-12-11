@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card" style="background-color: black">
                    <div class="card-header">
                        <h3 class="text-warning">Product ID : {{ $user->id }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered border-warning text-warning">
                            <tr>
                                <th>Product Name </th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Category Name</th>
                                <td>{{ $user->productToCategory->Category_Name }}</td>
                            </tr>
                            <tr>
                                <th>Category Id</th>
                                <td>{{ $user->category_id }}</td>
                            </tr>
                            <tr>
                                <th>Purchase Price</th>
                                <td>{{ $user->purchase_price }}</td>
                            </tr>
                            <tr>
                                <th>Regular Price</th>
                                <td>{{ $user->regular_price }}</td>
                            </tr>
                            <tr>
                                <th>Discount Price</th>
                                <td>{{ $user->discount_price }}</td>
                            </tr>
                            <tr>
                                <th>Short Discount</th>
                                <td>{{ $user->short_description }}</td>
                            </tr>
                            <tr>	
                                <th>Long Description</th>
                                <td>{{ $user->long_description }}</td>
                            </tr>
                            <tr>	
                                <th>Additional Information</th>
                                <td>{{ $user->additional_information }}</td>
                            </tr>
                            <tr>	
                                <th>Created At</th>
                                <td>{{ date('h:i:s a m/d/Y', strtotime($user->created_at)) }}</td>
                            </tr>
                            <tr>	
                                <th>Updated At</th>
                                @if($user->updated_at)
                                    <td>{{ date('h:i:s a m/d/Y', strtotime($user->updated_at)) }}</td>
                                @else
                                    <td><p>Not Updated yet</p></td>
                                
                                @endif
                            </tr>
                            <tr>	
                                <th>Thumbnail</th>
                                <td>
                                    @if ($user->thumbnail)
                                    <img width="150" class="rounded" src="{{ asset('uploads/thumbnail_photos') }}/{{ $user->thumbnail }}" alt="{{ $user->thumbnail }}">
                                    @else
                                        <img src="" alt="">
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex">
                            <a href="{{ route('products.edit', $user->id) }}" class="btn btn-warning btn-sm mr-2">Edit</a>
                            <a href="{{ route('products.index') }}" class="btn btn-warning btn-sm">Back to Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection