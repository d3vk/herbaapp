@extends('layouts.shop')

@section('css')
    <style>
        a.custom-card,
        a.custom-card:hover {
            color: inherit;
        }

    </style>
@endsection

@section('content')
    {{-- Header --}}
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ url('/') }}"><img src="{{ asset('img/logo.png') }}" alt="logo"
                                style="width: auto; height: 33px;" class="mt-1"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index-2.html">Home</a></li>
                            <li><a href="shop-grid.html">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="shop-details.html">Shop Details</a></li>
                                    <li><a href="shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="checkout.html">Check Out</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fas fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>
    {{-- End of Header --}}

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
                    <a href="#" class="custom-card">
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
