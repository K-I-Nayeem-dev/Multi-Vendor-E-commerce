@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12">
                    <table class="table table-success table-striped">
                        <tr class="text-center">
                            <th>Contact ID</th>
                            <th>Contact Name</th>
                            <th>Contact Eamil</th>
                            <th>Details</th>
                            <th>Remove</th>
                        </tr>
                        @forelse ($contacts as $key => $contact)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $contact->contact_name }}</td>
                                <td>{{ $contact->contact_email }}</td>
                                <td><a href="{{ route('emails', $contact->id) }}" class="btn btn-primary btn-sm">Email Details</a></td>
                                <td>
                                    <form action="{{ route('contact_delete', $contact->id) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">No Email Found</div>
                        @endforelse
                    </table>
            </div>
        </div>
    </div>
@endsection
