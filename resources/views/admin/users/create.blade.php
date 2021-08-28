@extends('layouts.dashboard')

@section('title', 'Tambah Pengguna')

@section('content')
    <div class="card" style="width: 500px">
        <div class="card-body pt-5">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf
        
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus>
        
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="email">Alamat email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" required autocomplete="email">
        
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="is_admin">Jenis Pengguna
                    </label>
                        <select name="is_admin" id="is_admin" class="form-control">
                            <option value="0">User</option>
                            <option value="1">Administrator</option>
                        </select>
                </div>

                <div class="form-group">
                    <label for="is_penyedia_jasa">Pengguna Maklon
                    </label>
                        <select name="is_penyedia_jasa" id="is_penyedia_jasa" class="form-control">
                            <option value="0">User</option>
                            <option value="1">Penyedia Jasa</option>
                        </select>
                </div>
        
                <div class="form-group">
                    <label for="password">Password
                    </label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password">
        
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="gd-plus"></i> Tambah pengguna
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
