@extends('layouts.dashboard')

@section('title', 'Profil saya')

@section('content')
    <div class="card" style="width: 500px">
        <div class="card-body pt-5">
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $user->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Alamat email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $user->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="gd-pencil"></i> Ubah pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
