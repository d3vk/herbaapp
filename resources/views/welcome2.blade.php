@extends('layouts.shop')

@section('title', 'Home')

@section('css')
    <style>
        a.custom-card,
        a.custom-card:hover {
            color: inherit;
        }

    </style>
@endsection

@section('content')
    {{-- Hero section --}}
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__item set-bg" data-setbg="{{ asset('img/hero.jpg') }}">
                        <div class="hero__text">
                            <span>OBAT HERBAL</span>
                            <h2>Herbs <br />100% Organic</h2>
                            <a href="#" class="primary-btn">BELANJA SEKARANG</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End of Hero section --}}

    {{-- Product list --}}
    <div class="container mb-5">
        <div class="row featured__filter">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 mt-5">
                    <a href="{{ route('product.detail',[$product->slug]) }}" class="custom-card">
                        <div class="card border border-success" style="border-radius: 25px;">
                            @php
                                $decoded_img = json_decode($product->images);
                                $first_img = $decoded_img[0];
                            @endphp
                            <img class="card-img-top" src="{{ asset('images/' . $first_img) }}"
                                alt="{{ $product->name }}"
                                style="border-top-left-radius: inherit;border-top-right-radius: inherit;">
                            <div class=" card-body">{{ $product->name }}<br><strong>Rp
                                    {{ number_format("$product->price", 0, ',', '.') }}</strong></div>
                            {{-- <div class="card-footer"
                                    style="border-bottom-left-radius: inherit;border-bottom-right-radius: inherit;"></div> --}}
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    {{-- End of Product list --}}
@endsection
