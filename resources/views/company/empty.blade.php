@extends('layouts.dashboard')

@section('title', 'Company saya')

@section('content')
    <div class="row">
        <div class="col-12 col-md-5">
            <div class="card position-relative" style="height: 100vh; background-color: inherit;">
                <div class="card-body text-center position-absolute position-centered" style="width: 100%">
                    <i class="gd-briefcase icon-text text-light" style="font-size: 900%;"></i><br>
                    <p class="text-light mt-3 lead">
                        Anda belum membuka company<br>
                        Buka company anda sekarang!
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7">
            <div class="card" style="height: 100vh;">
                <form action="{{ route('company.store') }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h5 class="h6 font-weight-semi-bold text-uppercase mb-0">Buka company sekarang</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Company</label>
                            <input id="name" type="text" class="form-control" name="name"
                                value="{{ Auth::user()->name }}" required disabled>
                        </div>

                        <div class="form-group">
                            <label for="profile">Profil Singkat Company</label>
                            <textarea class="form-control @error('profile') is-invalid @enderror" id="profile" rows="4" name="profile"
                            value="{{ old('profile') }}" required autocomplete="profile" autofocus></textarea>
                            
                            @error('profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat Company</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                value="{{ old('address') }}" required autocomplete="address" autofocus>
                                
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Nomor WhatsApp</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="081xxxxxx">
                                
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-soft-success btn-block">Buka Toko</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
