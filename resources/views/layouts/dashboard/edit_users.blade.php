@extends('layouts.dashboard.dashboard')

@section('content')
    {{-- style for hiding input number arrow --}}
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
    </style>
    <div class="row d-flex justify-content-center mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">ID : {{ $user->id }} User Details</div>
                <div class="card-body">
                    <form action="{{ route('update_user', $user->id) }}" method="POST">
                        @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" placeholder="Name" name="name" value="{{ $user->name }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $user->email }}" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone Number</label>
                                <input type="number" class="form-control" placeholder="Phone Number" name="phone_number" value="{{ $user->phone_number }}">
                            </div>
                            {{-- <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Role" name="role" value="{{ $user->role }}">
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <select name='role' class="form-select form-control" aria-label="Default select example">
                                    <option selected>{{ $user->role }}</option>
                                    @if($user->role == 'admin')
                                        <option value="moderator">moderator</option>
                                    @elseif ($user->role == 'moderator')
                                        <option value="admin">admin</option>
                                    @elseif ($user->role == 'seller')
                                        <option value="customer">customer</option>
                                    @elseif ($user->role == 'customer')
                                        <option value="seller">seller</option>
                                    @endif
                                </select>
                            </div>
                        <button type="submit" class="btn btn-primary mx-2 btn-sm">Update User Details</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
