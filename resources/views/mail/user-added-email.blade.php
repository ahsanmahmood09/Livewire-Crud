@extends('layouts.mail')

@section('content')
    <div class="email-inner">
        <p class="main-heading">Livewire</p>
        <p class="email-text">
            Hello <span class="">{{ $data['name'] ?: '' }}</span>,
        </p>
        <p class="email-text">
            Your account with email <span>{{ $data['email'] ?: '' }}</span> has been created successfully.
        </p>
    </div>
@endsection
