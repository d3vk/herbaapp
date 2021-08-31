@extends('layouts.dashboard')

@section('title', 'Company saya')

@section('content')
    <div class="jumbotron" style="background-color: rgba(7,215,247,.1) !important">
        <div class="row">
            <div class="col-8 mx-auto">
                <h2 class="display-5">{{ $company->name }}</h2>
                <p class="strong">{{ $company->profile }}</p>
                <p class="strong"><i class="gd-location-pin"></i> {{ $company->address }}</p>
            </div>
            <div class="col-4 mx-auto text-center">
                <img src="{{ asset('storage/users-avatar/' . $company->user->avatar) }}" alt="company logo" width="90px"
                    height="90px" style="object-fit: cover;" class="rounded-circle">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card flex-row align-items-center p-3 p-md-4" style="background-color: rgba(252,213,59,.2) !important">
                <div class="icon icon-lg bg-soft-primary rounded-circle mr-3">
                    <i class="gd-bar-chart icon-text d-inline-block text-primary"></i>
                </div>
                <div>
                    <h4 class="lh-1 mb-1">{{ $process }}</h4>
                    <h6 class="mb-0">Dalam Pengerjaan</h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card flex-row align-items-center p-3 p-md-4" style="background-color: rgba(252,213,59,.2) !important">
                <div class="icon icon-lg bg-soft-primary rounded-circle mr-3">
                    <i class="gd-face-smile icon-text d-inline-block text-primary"></i>
                </div>
                <div>
                    <h4 class="lh-1 mb-1">{{ $done }}</h4>
                    <h6 class="mb-0">Pekerjaan Selesai</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
