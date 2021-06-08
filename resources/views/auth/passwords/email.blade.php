@extends('layouts.auth')

@section('title', 'Reset Password')

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
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="form-group">
            <label for="email">Alamat email</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group no-margin">
            <button type="submit" class="btn btn-primary btn-block">
                Kirim alamat Reset Password
            </button>
        </div>
        <div class="text-center mt-3 small">
            Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
        </div>
    </form>
@endsection
