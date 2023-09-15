@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-lg-8">
            @if (session('category_add'))
                <div class="alert alert-success text-center">{{ session('category_add') }}</div>
            @endif
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                    @error('category_name')
                        <div class="text-danger fw-bold my-3">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" name="category_name" placeholder="Name">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Slug</label>
                    <input type="text" class="form-control" name="category_slug" placeholder="Slug">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Description</label>
                    <textarea class="form-label rounded p-3"name="category_description" placeholder="Write A Description (Optional)" cols="80" rows="10"></textarea>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Image</label>
                    <input type="file" class="form-control" name="category_image" placeholder="Image">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

