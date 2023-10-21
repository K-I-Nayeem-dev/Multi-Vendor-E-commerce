@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="card">
                <div class="card-header">{{ $contact->contact_name }} Emails</div>
                <div class="card-body">
                    <h4 class="mb-3">Email :  {{ $contact->contact_email }}</h4>
                    <h4 class="mb-3">Subject :  {{ $contact->contact_subject }}</h4>
                    <h4>Message :  {{ $contact->contact_message }}</h4>
                </div>
            </div>
        </div>
    </div>
@endsection