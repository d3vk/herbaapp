@extends('layouts.dashboard')

@section('title', 'Keranjang')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{ route('checkout') }}" method="post">
                @csrf
                @foreach ($carts as $cart)
                    <div class="form-check align-items-center mb-4">
                        <input class="form-check-input" type="checkbox" name="order_item[]" id="order_item"
                            style="position: inherit;" value="{{ $cart->id }}">
                        @php
                            $decodedImg = json_decode($cart->product[0]->images);
                            $firstImg = $decodedImg[0];
                        @endphp
                        <img class="ml-2" src="{{ asset('images/' . $firstImg) }}" alt="{{ $cart->product[0]->name }}"
                            for="product"
                            style="height: 7rem; width: 7rem; border-radius: 2rem; object-fit: cover; border: .2rem solid #8BC34A">
                        <label class="form-check-label ml-3" for="product" style="position: fixed;">
                            <h5>{{ $cart->product[0]->name }}</h5>
                            <h6><strong>Rp {{ number_format($cart->product[0]->price, 0, ',', '.') }}</strong></h6>
                            <h6>Qty: {{$cart->quantity}}</h6>
                            <h6>Total</h6>
                        </label>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-success">Checkout</button>
            </form>
        </div>
    </div>
@endsection