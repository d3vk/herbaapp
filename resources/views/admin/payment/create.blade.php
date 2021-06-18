@extends('layouts.dashboard')

@section('title', 'Tambah Metode Pembayaran')

@section('content')
    <div class="card">
        <div class="card-body pt-5">
            <form method="POST" action="{{ route('admin.payment.store') }}" enctype="multipart/form-data">
                @csrf
        
                <div class="form-group">
                    <label for="payment_name">Nama</label>
                    <input id="payment_name" type="text" class="form-control @error('payment_name') is-invalid @enderror" name="payment_name"
                        value="{{ old('payment_name') }}" required autocomplete="payment_name" autofocus>
        
                    @error('payment_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
        
                <div class="form-group">
                    <label for="payment_method_img">Logo Metode Pembayaran</label>
                    <input id="payment_method_img" type="file" class="form-control" name="payment_method_img" accept="image/*" required>
                </div>
                
                <div class="form-group">
                    <label for="payment_instruction">Instruksi</label>
                    <textarea class="form-control" id="payment_instruction" name="payment_instruction" rows="7"></textarea>
                  </div>
        
                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="gd-plus"></i> Tambah metode
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
