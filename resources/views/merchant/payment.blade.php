@extends('layouts.dashboard')

@section('title', 'Metode Pembayaran Toko Saya')

@section('content')
    <div class="card">
        <div class="card-body pt-5">
            <form method="POST" action="{{ route('payment.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="method_id">Pilih Metode Pembayaran</label>
                    <select class="form-control" id="method_id" name="method_id">
                        @foreach ($methods as $method)
                            <option value="{{ $method->id }}">{{ $method->payment_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="account">Nomor Rekening</label>
                    <input id="account" type="text" class="form-control @error('account') is-invalid @enderror"
                        name="account" value="{{ old('account') }}" required autocomplete="account"
                        autofocus>

                    @error('account')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="gd-plus"></i> Tambah metode
                    </button>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="table-responsive-xl table-stripped">
        <table class="table text-nowrap mb-0">
            <thead>
                <tr>
                    <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Metode Pembayaran</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Rekening</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Ditambahkan pada</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($availablePayments as $availableMethod)
                    <tr>
                        <td class="py-3">{{ $num }}</td>
                        <td class="align-middle py-3">
                            <div class="d-flex align-items-center">
                                <div class="d-inline-block position-relative mr-2">
                                    <img class="mr-md-2"
                                        src="{{ asset('img/'.$availableMethod->method->payment_method_img) }}"
                                        alt="{{ $availableMethod->method->payment_name }}"
                                        style="max-width: 3.5rem; height: auto;">
                                </div>
                                {{ $availableMethod->method->payment_name }}
                            </div>
                        </td>
                        <td class="py-3">{{ $availableMethod->account }}</td>
                        <td class="py-3">{{ $method->created_at }}</td>
                        <td class="py-3">
                            <div class="position-relative">
                                <a class="link-dark d-inline-block" data-toggle="modal" data-target="#delete{{ $method->id }}">
                                    <i class="gd-trash icon-text"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
    
                    @php
                        $num++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        {{ $availablePayments->links('layouts.pagination') }}
    </div>
@endsection
