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
                @php
                    $db_conn = mysqli_connect('localhost', 'root', '', 'hello');
                    $select = 'SELECT * FROM categories';
                    $query = mysqli_query($db_conn, $select);

                @endphp
                <tbody>
                    @forelse ($query as $d )
                        <tr>{{ $d->category_name }}</tr>
                    @empty
                        
                    @endforelse
                </tbody>
              </table>
        </div>
    </div>
@endsection

