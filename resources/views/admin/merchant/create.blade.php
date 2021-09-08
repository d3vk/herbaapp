@extends('layouts.dashboard')

@section('title', 'Buka Toko')

@section('content')
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="card position-relative" style="height: 90vh;">
                <div class="card-body text-center position-absolute position-centered" style="width: 100%">
                    <i class="gd-package icon-text text-light" style="font-size: 900%;"></i><br>
                    <p class="text-light mt-3 lead">
                        Apakah Anda ingin membuka toko sekarang?
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card" style="height: 90vh;">
                <form action="{{ route('store.market') }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h5 class="h6 font-weight-semi-bold text-uppercase mb-0">Buka toko sekarang</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Toko</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="admin_id">Admin Toko
                            </label>
                            <select name="admin_id" id="admin_id" class="form-control">
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat Toko</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Nomor WhatsApp</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus
                                placeholder="081xxxxxx">

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

    <script>
        $('#admin_id').select2({
            placeholder: 'Pilih pengguna',
            ajax: {
                url: '/admin/merchants/findUser',
                dataType: 'json',
                delay: 300,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                },
                cache: true
            }
        });
    </script>
@endsection
