@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card" style="background-color: black">
                    <div class="card-header">
                        <h3 class="text-warning">Trashed Product ID : {{ $user->id }}</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered border-warning text-warning">
                            <tr>
                                <th>Product Name </th>
                                <td>{{ $user->name }}</td>
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
                                <th>Thumbnail</th>
                                <td>
                                    @if ($user->thumbnail)
                                        <img src="" alt="">
                                    @else
                                        <img src="" alt="">
                                    @endif
                                    <img src="" alt="">
                                </td>
                            </tr>
                        </table>
                        <div class="d-flex">
                            <a href="{{ route('product_trash') }}" class="btn btn-warning btn-sm">Back to Products Trash</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	




	

@endsection