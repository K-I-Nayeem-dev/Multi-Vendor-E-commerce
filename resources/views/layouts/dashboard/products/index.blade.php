@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-12">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    @if (session('category_add'))
                        <div class="alert alert-success text-center">{{ session('category_add') }}</div>
                    @endif
                </div>
                <div class="col-lg-8">
                    @if (session('cate_deleted'))
                        <div class="alert alert-danger text-center">{{ session('cate_deleted') }}</div>
                    @endif
                </div>
                <div class="col-lg-8">
                    @if (session('category_update'))
                        <div class="alert alert-success text-center">{{ session('category_update') }}</div>
                    @endif
                </div>
            </div>

                {{-- Category Trash Button --}}
                    <a href="{{ route('product_trash') }}" class="btn btn-danger btn-sm mx-2">Go To Trash</a>
                {{-- Category Trash Button --}}
                
                <table class="table">
                    <thead>
                    <tr>		
                        <th scope="col">SL</th>
                        <th scope="col">Product ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category ID</th>
                        <th scope="col" class="text-center">Details</th>
                        <th scope="col" class="text-center" >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $key => $product)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $product->id }}</td>
                                <td >{{ $product->name }}</td>
                                <td >{{ $product->productToCategory->Category_Name }}</td>
                                <td class="text-center">{{ $product->category_id }}</td>
                                <td class="text-center"><a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Details</a></td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm mx-2">Edit</a>
                                            @if (Auth::user()->role == 'admin')
                                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Trash</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <th>
                                    <p class="alert alert-info">No Data Found Yet</p>
                                    <a href="{{ route('products.create') }}" class="btn btn-primary mt-3 btn-sm">Add Products</a>
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
        </div>
    </div>
@endsection

