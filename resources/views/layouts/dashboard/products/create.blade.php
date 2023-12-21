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
                    <h2 class="mb-2 text-warning">Add Product</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Name</label>
                            @error('name')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}">
                        </div>
        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Select Category</label>
                            <select class="form-control" name="category_id">
                                <option value="">Select Categories</option>
                                @foreach ($categories as $category)
                                    <option  value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Purchase Price</label>
                            <input type="number" class="form-label rounded p-3 form-control"name="purchase_price" placeholder="Purchase Price" value="{{ old('purchase_price') }}"></input>
                            @error('purchase_price')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Regular Price</label>
                            <input type="number" class="form-label rounded p-3 form-control"name="regular_price" placeholder="Regular Price" value="{{ old('regular_price') }}"></input>
                            @error('regular_price')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Discount Price</label>
                            <input type="number" class="form-label rounded p-3 form-control"name="discount_price" placeholder="Discount Price" value="{{ old('discount_price') }}"></input>
                            @error('discount_price')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Short Description</label>
                            <textarea class="form-label rounded form-control py-3 px-3" id="" cols="30" rows="3" name="short_description" value="{{ old('short_description') }}" placeholder="Write Short Description"></textarea>
                            @error('short_description')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Long Description</label>
                            <textarea class="form-label rounded form-control py-3 px-3" id="" cols="30" rows="4" name="long_description" value="{{ old('long_description') }}" placeholder="Write Long Description"></textarea>
                            @error('long_description')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Additional Information</label>
                            <textarea class="form-label rounded form-control py-3 px-3" id="" cols="30" rows="5" name="additional_information" value="{{ old('additional_information') }}" placeholder="Write Additional Information"></textarea>
                            @error('additional_information')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>
        
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Thumbnail</label>
                            <input type="file" class="form-control" name="thumbnail" placeholder="Image"  onchange="document.getElementById('web').src = window.URL.createObjectURL(this.files[0])">
                            @error('thumbnail')
                                <div class="text-danger fw-bold my-3">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="my-3">
                            <img width="400" height="300" src="" alt="Product_Thumbnail" id="web">
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm">Add Products</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

