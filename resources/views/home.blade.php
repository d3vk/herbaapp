@extends('layouts.dashboard')

@section('title', 'Home')

@section('content')

    @if (session('status'))
        <div class="alert alert-primary alert-left-bordered border-primary alert-dismissible d-flex align-items-center p-md-4 mb-2 fade show"
            role="alert">
            <i class="gd-info-alt icon-text text-primary-darker mr-2"></i>
            <p class="mb-0">
                <strong>status</strong> {{ session('status') }}
            </p>
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                <i class="gd-close icon-text icon-text-xs" aria-hidden="true"></i>
            </button>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-left-bordered border-danger alert-dismissible d-flex align-items-center p-md-4 mb-2 fade show"
            role="alert">
            <i class="gd-alert icon-text text-danger mr-2"></i>
            <p class="mb-0">
                <strong>Error</strong> {{ session('error') }}
            </p>
            <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                <i class="gd-close icon-text icon-text-xs" aria-hidden="true"></i>
            </button>
        </div>
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
