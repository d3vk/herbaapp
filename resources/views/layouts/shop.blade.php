<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | ObatHerbal</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Shop -->
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>

    @yield('css')
</head>

<body>
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
                        {{-- <ul>
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
                        </ul> --}}
                    </nav>
                </div>
                <div class="col-lg-3">
                    @if (Route::has('login'))
                        @auth
                            <div class="header__cart">
                                <ul>
                                    @php
                                        $item = \App\Models\OrderItem::where('user_id', Auth::user()->id)->where('is_in_cart',1)->pluck('quantity');
                                        $total = 0;
                                        for ($i=0; $i < $item->count(); $i++) { 
                                            $total += $item[$i];
                                        }
                                    @endphp
                                    <li><a href="{{ route('cart') }}"><i class="fas fa-shopping-cart"></i> <span>{{ $total }}</span></a></li>
                                    <li><a href="{{ route('home') }}" class="btn btn-light"><i class="fas fa-user-circle"></i> Akun saya</a></li>
                                </ul>
                            </div>
                        @else
                        <div class="header__cart">
                            <a href="{{ route('login') }}" class="btn btn-success" role="button"><i class="fas fa-sign-in"></i> Login</a>
                        </div>
                        @endauth
                    @endif

                </div>
            </div>
            <div class="humberger__open">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>
    {{-- End of Header --}}

    {{-- Mobile Nav --}}
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{ asset('img/logo.png') }}" alt="logo" class="mt-1"
                    style="height: 33px; width: auto;"></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fas fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>

        </div>
        <nav class="humberger__menu__nav mobile-menu">
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
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fas fa-facebook"></i></a>
            <a href="#"><i class="fas fa-twitter"></i></a>
            <a href="#"><i class="fas fa-linkedin"></i></a>
            <a href="#"><i class="fas fa-pinterest-p"></i></a>
        </div>
    </div>
    {{-- End of Mobile Nav --}}

    @yield('content')

    {{-- Footer --}}
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="index-2.html"><img src="{{ asset('img/logo.png') }}" alt="logo"
                                    style="width: auto; height: 33px;" class="mt-1"></a>
                        </div>
                        <ul>
                            <li style="line-height: 1.5rem;">Jl. Ir. Sutami No.36, Kentingan<br>Kec. Jebres, Kota Surakarta<br>Jawa Tengah 57126</li>
                            <li class="mt-2"><i class="fas fa-phone"></i> +62 811 1111 1111</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-1 mt-5">
                    <div class="footer__widget">
                        <h6>Information</h6>
                        <p>herbal11 merupakan hasil kerjasama dari UNS dan CV PJ Ching Lung</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());

                                </script>
                                All rights reserved | ObatHerbal
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    {{-- End of Footer --}}

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/shop.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/mixitup.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    @yield('js')
</body>

</html>
