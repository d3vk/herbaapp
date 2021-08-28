@extends('layouts.dashboard')

@section('title', 'Akun saya')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="border-radius: 25px;">
                    <div class="card-header bg-light" style="border-top-left-radius: inherit;border-top-right-radius: inherit;">
                        <h5 class="font-weight-semi-bold mb-0">Dashboard</h5>
                    </div>
                    <div class="card-body">
                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
