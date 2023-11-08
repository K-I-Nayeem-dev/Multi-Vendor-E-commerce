@extends('layouts.dashboard.dashboard')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-12">

            <div class="d-flex">
                <a href="{{ route('contact_us_emails') }}" class="btn btn-danger btn-sm mx-2 mb-4">Go To Emails</a>
                <div class="d-flex">
                    <a href="{{ route('restoreAll_emails') }}" class="btn btn-primary btn-sm mx-2 mb-4">Restore All</a>
                    <a href="{{ route('deleteAll_emails') }}" class="btn btn-danger btn-sm mx-2 mb-4">Delete All</a>
                </div>
            </div>

                    <table class="table table-success table-striped">
                        <tr class="text-center">
                            <th>Contact ID</th>
                            <th>Contact Name</th>
                            <th>Contact Eamil</th>
                            <th>Details</th>
                            @if (Auth::user()->role == 'admin')
                                <th>Actions</th>
                            @endif
                        </tr>
                        @forelse ($contacts as $key => $contact)
                            <tr>
                                <td class="text-center">{{ ++$key }}</td>
                                <td>{{ $contact->contact_name }}</td>
                                <td>{{ $contact->contact_email }}</td>
                                <td class="text-center"><a href="{{ route('trash_email_details', $contact->id) }}" class="btn btn-primary btn-sm">Email Details</a></td>
                                <td class="d-flex justify-content-center">
                                    @if(Auth::user()->role == 'admin')
                                        {{-- <td>
                                            <form action="{{ route('contact_delete', $contact->id) }}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Trash</button>
                                            </form>
                                        </td> --}}                                    
                                        <a href="{{ route('restore_emails', $contact->id) }}" class="btn btn-primary btn-sm mr-3">Restore</a>
                                        <a href="{{ route('delete_emails', $contact->id) }}" class="btn btn-danger btn-sm ">Delete</a>
                                    @endif
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