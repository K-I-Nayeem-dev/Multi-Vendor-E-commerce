@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="row">
        {{-- Adding Admin from dashboard --}}
        <div class="col-lg-4">
            <div class="card" style="height: 300px">
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
        </div>
        {{-- Fetch All User from Data Base --}}
        <div class="col-lg-8 p-0 m-0">
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
                    <h4 class="card-title">Database Have Total {{ $users->count() }} users</h4>   
                </div>
                <div class="card-body">
                    <div class="table-responsive table-bordered">
                        <table class="table table-responsive-md">
                            <thead>
                                <tr>
                                    <th class="width80">SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $key => $user)
                                <tr style="font-size: 12px">
                                    {{-- @php
                                        print_r($loop)
                                    @endphp --}}
                                    <td class="text-center"><strong>{{ ++$key }}</strong></td>
                                    <td><p>{{ $user->name }}</p></td>
                                    <td>{{ $user->email }}</td>
                                    {{-- <td><span class="badge light badge-success">{{ $user->created_at }}</span></td> --}}
                                    <td><p>{{ $user->role }}</p></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('user_details', $user->id) }}">Details</a>
                                        {{-- <form action="{{ route('user_details', $user->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm">Details</button>
                                        </form> --}}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <h5>No Users Found</h5>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection