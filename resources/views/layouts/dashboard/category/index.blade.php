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
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Category ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category Slug</th>
                        <th scope="col">Category Description</th>
                        <th scope="col">Category Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($category as $key => $d )
                        <tr>
                            <td class="text-center">{{ ++$key }}</td>
                            <td class="text-center">{{ $d->Category_Name }}</td>
                            <td class="text-center">{{ $d->Category_Slug }}</td>
                            <td class="text-center">{{ $d->Category_Description }}</td>
                            <td class="text-center"><img width="100" src="{{ asset('uploads/category_photos') }}/{{ $d->Category_Image }}" alt=""></td>
                            <td class="text-center">
                                <div class="d-flex">
                                    <a href="{{ route('category.edit', $d->id) }}" type="submit" class="btn btn-primary btn-sm mx-2">Edit</a>
                                    <form action="{{ route('category.destroy', $d->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <th>
                                    <p class="text-danger">No Data Here</p>
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
        </div>
    </div>
@endsection

