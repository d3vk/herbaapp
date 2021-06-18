@extends('layouts.dashboard')

@section('title', 'Keranjang')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('checkout') }}" method="post"
                style="width: -webkit-fill-available; display: contents;">
                @csrf
                @foreach ($carts as $cart)
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="form-check align-items-center mb-5">
                            <input class="form-check-input" type="checkbox" name="order_item[]" id="order_item"
                                style="position: inherit;" value="{{ $cart->id }}">
                            @php
                                $decodedImg = json_decode($cart->product[0]->images);
                                $firstImg = $decodedImg[0];
                            @endphp
                            <img class="ml-2" src="{{ asset('images/' . $firstImg) }}"
                                alt="{{ $cart->product[0]->name }}" for="product"
                                style="height: 7rem; width: 7rem; border-radius: 2rem; object-fit: cover; border: .2rem solid #8BC34A">
                            <label class="form-check-label ml-3" for="product" style="position: absolute;">
                                <h5>{{ $cart->product[0]->name }}</h5>
                                <h6><strong>Rp {{ number_format($cart->product[0]->price, 0, ',', '.') }}</strong></h6>
                                <h6>Qty: {{ $cart->quantity }}</h6>
                                @php
                                    $totalPerProduct = $cart->quantity * $cart->product[0]->price;
                                @endphp
                                <h6>Rp {{ number_format($totalPerProduct, 0, ',', '.') }}</h6>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 align-items-center">
                        <a class="link-dark d-inline-block btn btn-soft-light" data-toggle="modal"
                            data-target="#delete{{ $cart->id }}">
                            <i class="gd-trash icon-text"></i>
                            Hapus
                        </a>
                    </div>
                @endforeach
                <hr>
                <div class="mt-2 justify-content-between">
                    <h6>Total<br><strong>Rp {{ number_format($totalPrice, 0, ',', '.') }}</strong></h6>
                    <button type="submit" class="btn btn-success">Checkout</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('modal')
    @foreach ($carts as $cart)

        <div id="delete{{ $cart->id }}" class="modal fade" role="dialog"
            aria-labelledby="delete{{ $cart->id }}Label" aria-hidden="true">
            <form action="{{ route('deleteFromCart', [$cart->id]) }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete{{ $cart->id }}Label">Hapus</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda setuju menghapus <strong>{{ $cart->product[0]->name }}</strong> dari keranjang
                            belanja Anda?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-soft-light" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-soft-danger">Hapus</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
@endsection
