@extends('layouts.dashboard')

@section('title', 'Ubah Status Pesanan')

@section('content')
    <div class="card">
        <div class="card-body pt-5">
            <form method="POST" action="{{ route('orders.update', [$order->id]) }}">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="invoice">Invoice</label>
                    <input id="invoice" type="text" class="form-control" name="invoice" value="{{ $order->invoice }}" required
                        autocomplete="invoice" autofocus disabled>
                </div>

                <div class="form-group">
                    <label for="customer">Nama Pelanggan</label>
                    <input id="customer" type="text" class="form-control" name="customer" value="{{ $order->user->name }}" required
                        autocomplete="customer" autofocus disabled>
                </div>

                <div class="form-group">
                    <label for="address">Alamat Pengiriman</label>
                    <input id="address" type="text" class="form-control" name="address" value="{{ $order->address }}" required
                        autocomplete="address" autofocus disabled>
                </div>

                <div class="form-group">
                    <label for="payment">Metode Pembayaran</label>
                    <input id="payment" type="text" class="form-control" name="payment" value="{{ $order->payment[0]->method->payment_name }} - {{ $order->payment[0]->account }}" required
                        autocomplete="payment" autofocus disabled>
                </div>

                <div class="form-group">
                    <label for="status">Status
                    </label>
                    <select name="status" id="status" class="form-control">
                        <option value="Pesanan dilanjutkan ke penjual" selected>Pesanan dilanjutkan ke penjual</option>
                        <option value="Sedang diproses">Sedang diproses</option>
                        <option value="Sedang dikirim">Sedang dikirim</option>
                    </select>
                </div>

                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="gd-pencil"></i> Ubah status
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
