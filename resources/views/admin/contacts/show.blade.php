@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="my-4 d-flex justify-content-between align-items-center">
            <div>
                <h1>Message from {{ $contact->name }}</h1>
                <small><a href="mailto: {{ $contact->email }}">{{ $contact->email }}</a></small>
            </div>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-success">Back to My Contacts</a>
        </div>
        <hr>
        <p class="my-5">{{ $contact->message }}</p>
    </div>
@endsection