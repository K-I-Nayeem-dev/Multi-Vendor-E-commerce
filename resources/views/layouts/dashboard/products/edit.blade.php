@extends('layouts.dashboard.dashboard')

@section('content')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }

        input{
            color: black !important;
        }

        label{
            color: #FFBC0C;
        }

        button{
            background-color: #FFBC0C !important;
            color: black !important
        }

        select{
            color: black !important;
        }
        
        select, option {
            color: black !important;
            font-size: 18px;
            padding: 5px;
        }

    </style>
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-lg-8">
            <div class="card" style="background-color: black">
                <div class="card-header" style="background-color: black">
                    <h2 class="mb-2 text-warning">Update Product ID : {{ $user->id }}</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.update', $user)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Name</label>
                            @error('name')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $user->name ? $user->name : old('name') }}">
                        </div>
        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Category</label>
                            <select class="form-control" name="category_id">
                                @foreach ($categories as $category)
                                    <option  value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Purchase Price</label>
                            <input type="number" class="form-label rounded p-3 form-control" name="purchase_price" placeholder="Purchase Price" value="{{ $user->purchase_price ? $user->purchase_price : old('purchase_price') }}"></input>
                            @error('purchase_price')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Regular Price</label>
                            <input type="number" class="form-label rounded p-3 form-control" name="regular_price" placeholder="Regular Price" value="{{ $user->regular_price ? $user->regular_price : old('regular_price') }}"></input>
                            @error('regular_price')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Discount Price</label>
                            <input type="number" class="form-label rounded p-3 form-control" name="discount_price" placeholder="Discount Price" value="{{ $user->discount_price ? $user->discount_price : old('discount_price') }}"></input>
                            @error('discount_price')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Short Description</label>
                            <input type="text" class="form-label rounded p-3 form-control" name="short_description" placeholder="Short Description" value="{{ $user->short_description ? $user->short_description : old('short_description') }}"></input>
                            @error('short_description')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Long Description</label>
                            <input type="text"  class="form-label rounded p-3 form-control" name="long_description" placeholder="Long Description" value="{{ $user->long_description ? $user->long_description : old('long_description') }}"></input>
                            @error('long_description')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Additional Information</label>
                            <input type="text"  class="form-label rounded p-3 form-control" name="additional_information" placeholder="Additional Information" value="{{ $user->additional_information ? $user->additional_information : old('additional_information') }}"></input>
                            @error('additional_information')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Thumbnail</label>
                            <input type="file" class="form-control" name="thumbnail" placeholder="Image">
                            @error('thumbnail')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="d-flex">
                            <button type="submit" class="btn btn-warning btn-sm mr-2">Update Product</button>
                            <a href="{{ route('products.show', $user->id) }}" class="btn btn-warning btn-sm">Undo Edit</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

