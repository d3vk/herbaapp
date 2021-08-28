@extends('layouts.dashboard')

@section('title', 'Company saya')

@section('content')
    <div class="jumbotron" style="background-color: rgba(7,215,247,.1) !important">
        <div class="row">
            <div class="col-8 mx-auto">
                <h2 class="display-5">{{ $company->name }}</h2>
        <p class="strong">{{ $company->profile }}</p>
            </div>
            <div class="col-4 mx-auto text-center">
                <img src="{{ asset('storage/users-avatar/'.$company->user->avatar) }}" alt="company logo" width="90px" height="90px" style="object-fit: cover;" class="rounded-circle">
            </div>
        </div>
    </div>
@endsection
