@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Category ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Category Slug</th>
                        <th scope="col">Category Description</th>
                        <th scope="col">Category Image</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($lists as $d )
                        <tr>
                            <td class="text-center">{{ $d->id }}</td>
                            <td class="text-center">{{ $d->Category_Name }}</td>
                            <td class="text-center">{{ $d->Category_Slug }}</td>
                            <td class="text-center">{{ $d->Category_Description }}</td>
                            <td class="text-center">{{ $d->Category_Image }}</td>
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

