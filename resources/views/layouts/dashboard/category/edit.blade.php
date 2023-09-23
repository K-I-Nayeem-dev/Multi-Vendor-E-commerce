@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="row d-flex justify-content-center mt-5">
        <div class="col-lg-8">
            <div>
                <h2 class="mb-2">Edit Category</h2>
            </div>
            <form action="{{ route('category.update', $user) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Name</label>
                    @error('category_name')
                        <div class="text-danger fw-bold my-3">{{ $message }}</div>
                    @enderror
                    <input type="text" class="form-control" name="category_name" placeholder="Name" value="{{ $user->Category_Name }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Slug</label>
                    <input type="text" class="form-control" name="category_slug" placeholder="Slug"  value="{{ $user->Category_Slug  }}">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Description</label>
                    <textarea class="form-label rounded p-3" name="category_description" placeholder="Write Some Text For Description ('Optional')" cols="80" rows="10">{{ $user->Category_Description  }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category Image</label>
                    <input type="file" class="form-control" name="category_image" placeholder="Category Image" value="{{ $user->Category_Image }}">
                </div>

                <button type="submit" class="btn btn-primary">Edit Category</button>
            </form>
        </div>
    </div>
@endsection

