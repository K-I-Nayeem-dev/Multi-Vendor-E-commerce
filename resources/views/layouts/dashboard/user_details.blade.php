@extends('layouts.dashboard.dashboard')

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Users Details</div>
                <div class="card-body">

                    <h4 class="my-3">ID: {{ $user->id }}</h4>

                    <h4 class="my-3">Name: {{ $user->name }}</h4>

                    <h4 class="my-3">Email: {{ $user->email }}</h4>

                    @if ($user->phone_number)
                        <h4 class="my-3">Phone Number: {{ $user->phone_number }}</h4>
                    @else
                        <h4 class="my-3">Phone Number: "NULL"</h4>
                    @endif

                    @if($user->created_at)
                        <h4 class="my-3">Created At : {{ date('d-m-Y H:i:s', strtotime($user->created_at)) }}</h4>
                    @else
                        <h4 class="my-3">Created At : 'NULL'</h4>
                    @endif


                    @if($user->updated_at)
                        <h4 class="my-3">Updated At: {{ date('d-m-Y H:i:s', strtotime($user->updated_at)) }}</h4>
                    @else
                        <h4 class="my-3">Updated At: "Not Updated Yet"</h4>
                    @endif

                    <h4>Role: {{ $user->role }}</h4>

                    <a class="btn btn-primary btn-sm my-3 " href="{{ route('edit_user', $user->id) }}">Edit</a>
                    <a class="btn btn-primary btn-sm my-3 mx-2" href="{{ route('users') }}">Back to Users</a>

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
