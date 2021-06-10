@extends('layouts.dashboard')

@section('title', 'Buka Toko')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card position-relative" style="height: 400px;">
                <div class="card-body text-center position-absolute position-centered" style="width: 100%">
                    <i class="gd-package icon-text text-light" style="font-size: 900%;"></i><br>
                    <p class="text-light mt-3 lead">
                        Anda belum memiliki toko<br>
                        Apakah Anda ingin membuka toko sekarang?
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card" style="height: 400px;">
                <form action="{{ route('store.market') }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h5 class="h6 font-weight-semi-bold text-uppercase mb-0">Buka toko anda sekarang</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Toko</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat Toko</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                value="{{ old('address') }}" required autocomplete="address" autofocus>
                                
                            @error('address')
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
