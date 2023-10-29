@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="row">
        {{-- Adding Admin from dashboard --}}
        <div class="col-lg-4">
            @if (Auth::user()->role == "admin")
            <div class="card" style="height: 500px">
                <div class="card-header">
                    <h4 class="card-title">Adimn Invitation</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('add_users') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control input-default " placeholder="Admin Name" name="admin_name" value="{{ old('admin_name') }}">
                                @error('admin_name')
                                    <div style="font-size: 12px" class="alert alert-danger mt-3">{{ $message }}</div> 
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control input-rounded" placeholder="Admin Email" name="admin_email" value="{{ old('admin_email') }}">
                                @error('admin_email')
                                    <div style="font-size: 12px" class="alert alert-danger mt-3">{{ $message }}</div> 
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Add Admin</button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
        {{-- Fetch All User from Data Base --}}
        @if (Auth::user()->role == "admin")
            <div class="col-lg-8 p-0 m-0">
        @else
            <div class="col-lg-12 p-0 m-0">
        @endif
            {{-- <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width80">SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created AT</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $key => $user)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->role }}</td>
                                    </tr>
                                @empty
                                    <tr>No User Found</tr>
                                @endforelse
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Total {{ $admins->count() }} Admins</h4>
                    @if (Auth::user()->role == "admin")
                        <span><a href="{{ route('users') }}" class="btn btn-primary btn-sm ">All Users</a></span>  
                        <span><a href="{{ route('filter_moderator') }}" class="btn btn-primary btn-sm ">Moderator</a></span>  
                        <span><a href="{{ route('filter_sellers') }}" class="btn btn-primary btn-sm ">Seller</a></span>  
                        <span><a href="{{ route('filter_customers') }}" class="btn btn-primary btn-sm ">Customer</a></span>  
                    @endif
                </div>
                <div class="card-body">
                    
                    @if( $admins->count()  > 0)
                        <div class="table-responsive table-bordered">
                            <table class="table table-responsive-md">
                                <thead>
                                    <tr>
                                        <th class="width80">SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="text-center">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $key => $admin)
                                    <tr style="font-size: 12px">
                                        {{-- @php
                                            print_r($loop)
                                        @endphp --}}
                                        <td class="text-center"><strong>{{ ++$key }}</strong></td>
                                        <td><p>{{ $admin->name }}</p></td>
                                        <td>{{ $admin->email }}</td>
                                        {{-- <td><span class="badge light badge-success">{{ $user->created_at }}</span></td> --}}
                                        <td><p>{{ $admin->role }}</p></td>
                                        <td class="text-center">
                                            <a class="btn btn-primary btn-sm" href="{{ route('user_details', $admin->id) }}">Details</a>
                                            {{-- <form action="{{ route('user_details', $user->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Details</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h4>No Admin Found</h4>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('sweet_alert')
    @if (session('remove_user'))
        <script>
            Swal.fire(
            'User Remove',
            'Successfully!',
            'success'
            )
        </script>
    @endif
    @if (session('add_user'))
        <script>
            Swal.fire(
            'Admin Invitation Send',
            'Successfully!',
            'success'
            )
        </script>
    @endif

    @error('admin_email')
        <script>
            Swal.fire(
            '{{ $message }}',
            'Error!',
            'error'
            )
        </script>
    @enderror

@endsection