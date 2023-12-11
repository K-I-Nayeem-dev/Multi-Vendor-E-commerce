@extends('layouts.dashboard.dashboard')

@section('content')
    @livewire('variations.appsize')
    @livewire('colors.colors')
@endsection

@section('sweet_alert')
    @if(session('variantion_store'))
        <script>
            Swal.fire({
                title: "Variation Added",
                text: "Successfully",
                icon: "success"
            });
        </script>
    @endif
@endsection