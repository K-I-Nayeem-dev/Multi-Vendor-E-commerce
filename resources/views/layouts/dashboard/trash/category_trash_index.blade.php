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
                
            
                {{-- @if ($delete)
                    <div class="d-flex"> --}}

                        <a href="{{ route('category.index') }}" class="btn btn-danger btn-sm mx-2">Go To Categories</a>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('restore_category_trash') }}" class="btn btn-primary btn-sm mx-2">Restore All</a>
                            <a href="{{ route('empty_category_trash') }}" class="btn btn-danger btn-sm mx-2">Empty Trash</a>
                            <a href="{{ route('restore_category_pulck') }}" class="btn btn-danger btn-sm mx-2">Pluck</a>
                        </div>

                    {{-- </div>
                @else
                    <a href="{{ route('category.index') }}" class="btn btn-danger btn-sm mx-2">Go To Categories</a>
                @endif
                --}}
                    
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Category ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category Slug</th>
                        <th scope="col">Category Details</th>
                        <th scope="col" class="text-center" >Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($category as $key => $d )
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td>{{ $d->Category_Name }}</td>
                                <td>{{ $d->Category_Slug }}</td>
                                <td class="text-center"><a href="{{ route('category_trash_details', $d->id) }}" class="btn btn-info btn-sm">Details</a></td>
                                <td class="text-center">
                                    <div class="d-flex">
                                        <a href="{{ route('category_trash_delete', $d->id) }}" class="btn btn-danger btn-sm mx-2">Delete</a>
                                        <a href="{{ route('category_trash_restore', $d->id) }}" class="btn btn-primary btn-sm mx-2">Restore</a>
                                            {{-- @if (Auth::user()->role == 'admin')
                                                <form action="{{ route('category.destroy', $d->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Restore</button>
                                                </form>
                                            @endif --}}
                                        </div>
                                    </td>
                            </tr>
                        @empty
                            <tr>
                                <th>
                                    <p class="alert alert-info">No Data Found Yet</p>
                                </th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
        </div>
    </div>
@endsection

