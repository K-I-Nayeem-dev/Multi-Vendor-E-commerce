@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="row mt-5">
            <div class="card">
                <div class="card-header">
                    Email Form 
                    {{ $contact->contact_name }}
                </div>
                <div class="card-body">
                    <h4 class="mb-3">Email :  {{ $contact->contact_email }}</h4>
                    <h4 class="mb-3">Subject :  {{ $contact->contact_subject }}</h4>
                    <h4>Message :  {{ $contact->contact_message }}</h4>
                    <a href="{{ route('contact_us_emails') }}" class="btn btn-success btn-sm mt-4">Back to Emails</a>
                </div>
            </div>
        </div>
    </div>
@endsection