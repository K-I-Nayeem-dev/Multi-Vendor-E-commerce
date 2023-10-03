@extends('layouts.dashboard.dashboard')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-lg-10" >
            {{-- <table class="d-flex justify-content-center">
                <thead>
                    <tr>
                        <th>Category ID</th>
                    </tr>
                    <tr>
                        <th>Category Name</th>
                    </tr>
                    <tr>
                        <th>Category Slug</th>
                    </tr>
                    <tr>
                        <th>Category Description</th>
                    </tr>
                    <tr>
                        <th>Category Image</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> : {{ $user->id }}</td>
                    </tr>
                    <tr>
                        <td> : {{ $user->Category_Name }}</td>
                    </tr>
                    <tr>
                        <td> : {{ $user->Category_Slug }}</td>
                    </tr>
                    <tr>
                        <td> : {{ $user->Category_Description }}</td>
                    </tr>
                    <tr>
                        <td> :  <img width="200" class="rounded" src="{{ asset('uploads/category_photos') }}/{{ $user->Category_Image }}" alt="{{ $user->Category_Name }}"></td>
                    </tr>
                </tbody>
            </table> --}}
            <div class="d-flex my-3">
                <h4>Category ID</h4>
                <h4 class="mx-2"> : {{ $user->id }} </h4>
            </div>
            <div class="d-flex my-3">
                <h4>Category Name</h4>
                <h4 class="mx-2"> : {{ $user->Category_Name }} </h4>
            </div>
            <div class="d-flex my-3">
                <h4>Category Slug</h4>
                <h4 class="mx-2"> : {{ $user->Category_Slug }} </h4>
            </div>
            <div class="d-flex my-3">
                <h4>Category Description</h4>
                <h4 class="mx-2"> : {{ $user->Category_Description }} </h4>
            </div>
            <div class="d-flex my-3 align-items-center">
                <h4>Category Image <span class="mx-2">:</span> </h4>
                <img width="150" class="rounded" src="{{ asset('uploads/category_photos') }}/{{ $user->Category_Image }}" alt="{{ $user->Category_Name }}">
            </div>
            <div>
                <a class="mt-4 btn btn-info" href="{{ route('category.index') }}">Back to Categories</a>
            </div>
        </div>
    </div>

@endsection

