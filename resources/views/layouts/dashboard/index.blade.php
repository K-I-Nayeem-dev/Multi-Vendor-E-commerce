@extends('layouts.dashboard.dashboard')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>User ID : {{ Auth::user()->id }}</h4>
                    </div>
                    <div class="card-body">
                        <h3>User Name : {{ Auth::user()->name }}</h3>
                        <h3>User Email : {{ Auth::user()->email }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
