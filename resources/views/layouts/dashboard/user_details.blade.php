@extends('layouts.dashboard.dashboard')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header text-light bg-dark">Users Details</div>
                <div class="card-body">

                    <table class="table table-bordered border-primary">
                        <tr>
                            <th>Field</th>
                            <th>Value</th>
                        </tr>
                        <tr>
                            <td><h4 class="my-3">ID</h4></td>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <td><h4 class="my-3">Name</h4></td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td><h4 class="my-3">Email</h4></td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            @if ($user->phone_number)
                                <td><h4 class="my-3">Phone Number</h4></td>
                                <td>{{ $user->phone_number }}</td>
                            @else
                                <td><h4 class="my-3">Phone Number</h4></td>
                                <td><h4>NULL</h4></td>
                            @endif
                        </tr>
                        <tr>
                            @if($user->created_at)
                                <td><h4 class="my-3">Created At</h4></td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($user->created_at)) }}</td>
                                
                            @else
                                <td><h4 class="my-3">Created At</h4></td>
                                <td><h4>NULL</h4></td>
                            @endif
                        </tr>
                        <tr>
                            @if($user->updated_at)
                                <td><h4 class="my-3">Updated At</h4></td>
                                <td>{{ date('d-m-Y H:i:s', strtotime($user->updated_at)) }}</td>
                                
                            @else
                                <td><h4 class="my-3">Updated At</h4></td>
                                <td><h4>Not Updated Yet</h4></td>
                            @endif
                        </tr>
                        <tr>
                            <td><h4 class="my-3">Role</h4></td>
                            <td>{{ $user->role }}</td>
                        </tr>
                    </table>

                    @if(Auth::user()->role == 'admin')
                        <a class="btn btn-primary btn-sm my-3 " href="{{ route('edit_user', $user->id) }}">Edit</a>
                        @if (auth()->user()->name != $user->name)
                            <a class="btn btn-danger btn-sm my-3 mx-2 " href="{{ route('user_remove', $user->id) }}">Remove</a>
                        @endif
                        <a class="btn btn-primary btn-sm my-3" href="{{ route('users') }}">Back to Users</a>
                    @else
                        <a class="btn btn-primary btn-sm my-3" href="{{ route('users') }}">Back to Users</a>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection

@section('sweet_alert')
    @if (session('user_update'))
        <script>
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session('user_update') }}',
            showConfirmButton: false,
            timer: 1500
            })
        </script>
    @endif
@endsection
