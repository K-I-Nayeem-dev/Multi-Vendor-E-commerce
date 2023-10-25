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
                            @if (Auth::user()->role == 'admin')
                                <th>Remove</th>
                            @endif
                        </tr>
                        @forelse ($contacts as $key => $contact)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td>{{ $contact->contact_name }}</td>
                                <td>{{ $contact->contact_email }}</td>
                                <td class="text-center"><a href="{{ route('emails', $contact->id) }}" class="btn btn-primary btn-sm">Email Details</a></td>
                                @if(Auth::user()->role == 'admin')
                                    <td>
                                        <form action="{{ route('contact_delete', $contact->id) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <div class="alert alert-danger">No Email Found</div>
                        @endforelse
                    </table>
            </div>
        </div>
    </div>
@endsection

@section('sweet_alert')

    @if (session('delete_contact'))
        <script>
            Swal.fire(
                'Email Deleted',
                'Successfully',
                'success'
            )
        </script>
    @endif

@endsection