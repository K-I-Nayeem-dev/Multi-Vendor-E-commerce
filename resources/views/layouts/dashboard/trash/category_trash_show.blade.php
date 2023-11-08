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
            
            {{-- //Specific Category ID Details Start //  --}}

            <div class="category d-flex">
                <div class="my-3">
                    <h4 class="py-2 text-success">Category ID</h4>
                    <h4 class="py-2 text-success">Category Name</h4>
                    <h4 class="py-2 text-success">Category Slug</h4>
                    <h4 class="py-2 text-success">Category Description</h4>
                    <h4 class="py-2 text-success" style="margin-top: 73px">Category Image</h4>
                </div>
                <div class="my-3">
                    <h4 class="py-2 px-4" ><span class="px-3">:</span>{{ $user->id }} </h4>
                    <h4 class="py-2 px-4" ><span class="px-3">:</span>{{ $user->Category_Name }} </h4>
                    <h4 class="py-2 px-4" ><span class="px-3">:</span>{{ $user->Category_Slug }} </h4>
                    <h4 class="py-2 px-4" ><span class="px-3">:</span>{{ $user->Category_Description }} </h4>
                    <div class="py-2 px-4">
                        <span class="px-3">:</span><img width="150" class="rounded" src="{{ asset('uploads/category_photos') }}/{{ $user->Category_Image }}" alt="{{ $user->Category_Name }}">
                    </div>
                </div>
            </div>
            <div>
                <a class="mt-4 btn btn-primary btn-sm" href="{{ route('category_trash') }}">Back to trash</a>
            </div>
            {{-- //Specific Category ID Details End //  --}}
        </div>
    </div>

@endsection

