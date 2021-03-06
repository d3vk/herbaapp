<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>@yield('title') | ObatHerbal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Template -->
    <link rel="stylesheet" href="{{ asset('css/graindashboard.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>

</head>

<body class="has-sidebar has-fixed-sidebar-and-header">
    <!-- Header -->
    <header class="header bg-body">
        <nav class="navbar flex-nowrap p-0">
            <div class="navbar-brand-wrapper d-flex align-items-center col-auto">
                <!-- Logo For Mobile View -->
                <a class="navbar-brand navbar-brand-mobile" href="{{ url('/') }}">
                    <img class="img-fluid w-100" src="{{ asset('img/logo-mini.png') }}" alt="Logo">
                </a>
                <!-- End Logo For Mobile View -->

                <!-- Logo For Desktop View -->
                <a class="navbar-brand navbar-brand-desktop" href="{{ url('/') }}">
                    <img class="side-nav-show-on-closed" src="{{ asset('img/logo-mini.png') }}" alt="Logo"
                        style="width: auto; height: 33px;">
                    <img class="side-nav-hide-on-closed" src="{{ asset('img/logo.png') }}" alt="Logo"
                        style="width: auto; height: 33px;">
                </a>
                <!-- End Logo For Desktop View -->
            </div>

            <div class="header-content col px-md-3">
                <div class="d-flex align-items-center" style="justify-content: space-between">
                    <!-- Side Nav Toggle -->
                    <a class="js-side-nav header-invoker d-flex mr-md-2" href="#" data-close-invoker="#sidebarClose"
                        data-target="#sidebar" data-target-wrapper="body">
                        <i class="gd-align-left"></i>
                    </a>
                    <!-- End Side Nav Toggle -->

                    <!-- User Avatar -->
                    <div class="dropdown mx-3 dropdown ml-2">
                        <a id="profileMenuInvoker" class="header-complex-invoker" href="#" aria-controls="profileMenu"
                            aria-haspopup="true" aria-expanded="false" data-unfold-event="click"
                            data-unfold-target="#profileMenu" data-unfold-type="css-animation"
                            data-unfold-duration="300" data-unfold-animation-in="fadeIn"
                            data-unfold-animation-out="fadeOut">
                            <img class="avatar rounded-circle mr-md-2"
                                src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=8BC34A&background=F0F4C3"
                                alt="{{ Auth::user()->name }}">
                            {{-- <span class="mr-md-2 avatar-placeholder">A</span> --}}
                            <span class="d-none d-md-block">{{ Auth::user()->name }}</span>
                            <i class="gd-angle-down d-none d-md-block ml-2"></i>
                        </a>

                        <ul id="profileMenu"
                            class="unfold unfold-user unfold-light unfold-top unfold-centered position-absolute pt-2 pb-1 mt-4 unfold-css-animation unfold-hidden fadeOut"
                            aria-labelledby="profileMenuInvoker" style="animation-duration: 300ms;">
                            <li class="unfold-item">
                                <a class="unfold-link d-flex align-items-center text-nowrap"
                                    href="{{ route('profile') }}">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-user"></i>
                                    </span>
                                    My Profile
                                </a>
                            </li>
                            <li class="unfold-item unfold-item-has-divider">
                                <a class="unfold-link d-flex align-items-center text-nowrap"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="unfold-item-icon mr-3">
                                        <i class="gd-power-off"></i>
                                    </span>
                                    Sign Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- End User Avatar -->
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <main class="main">
        <!-- Sidebar Nav -->
        <aside id="sidebar" class="js-custom-scroll side-nav">
            <ul id="sideNav" class="side-nav-menu side-nav-menu-top-level mb-0">

                <!-- Home -->
                <li class="side-nav-menu-item mt-3">
                    <a class="side-nav-menu-link media align-items-center" href="{{ url('/') }}">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-home"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Beranda</span>
                    </a>
                </li>
                <!-- Home -->

                <!-- Title -->
                <li class="sidebar-heading h6">Dasbor</li>
                <!-- End Title -->

                <!-- Dashboard -->
                <li class="side-nav-menu-item {{ request()->is('home*') ? 'active' : '' }}">
                    <a class="side-nav-menu-link media align-items-center" href="{{ route('home') }}">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-dashboard"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Dasbor</span>
                    </a>
                </li>
                <!-- End Dashboard -->

                <!-- Cart -->
                <li class="side-nav-menu-item {{ request()->is('cart*') ? 'active' : '' }}">
                    <a class="side-nav-menu-link media align-items-center" href="{{ route('cart') }}">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-shopping-cart"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Keranjang</span>
                    </a>
                </li>
                <!-- End Cart -->

                <!-- Pembelian -->
                <li class="side-nav-menu-item side-nav-has-menu {{ request()->is('purchase/*') ? 'active' : '' }}">
                    <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subBuying">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-receipt"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Pembelian</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>

                    <ul id="subBuying" class="side-nav-menu side-nav-menu-second-level mb-0">
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="{{ route('waitingPayment') }}">Menunggu
                                Pembayaran</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="{{ route('transaction.list') }}">Daftar Transaksi</a>
                        </li>
                    </ul>

                </li>
                <!-- End Pembelian -->
                @if (Auth::user()->is_penyedia_jasa == true)
                    {{-- Company saya --}}
                    <!-- Title -->
                    <li class="sidebar-heading h6">Company saya</li>
                    <!-- End Title -->
                    <li class="side-nav-menu-item {{ request()->is('company') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="{{ route('company.index') }}">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-briefcase"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Company Saya</span>
                        </a>
                    </li>
                    <li class="side-nav-menu-item {{ request()->is('messages*') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="{{ route('messages') }}">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-comment"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Chat</span>
                        </a>
                    </li>
                    <li class="side-nav-menu-item {{ request()->is('company/order*') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="{{ route('company.order') }}">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-bookmark-alt"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Pekerjaan</span>
                        </a>
                    </li>
                    {{-- End of Company saya --}}
                @else
                    {{-- Maklon --}}
                    <!-- Title -->
                    <li class="sidebar-heading h6">Maklon</li>
                    <!-- End Title -->
                    <li class="side-nav-menu-item {{ request()->is('penyedia-jasa*') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="{{ route('company.list') }}">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-bookmark-alt"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Penyedia Jasa</span>
                        </a>
                    </li>
                    <li class="side-nav-menu-item {{ request()->is('pesanan-saya*') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="{{ route('maklon.myorder') }}">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-bookmark"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Pesanan Saya</span>
                        </a>
                    </li>
                    <li class="side-nav-menu-item {{ request()->is('messages*') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="{{ route('messages') }}">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-comment"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Chat</span>
                        </a>
                    </li>

                    {{-- End of Maklon --}}
                @endif

                @php
                    $merchant = App\Models\Merchant::where('admin_id', Auth::user()->id)->first();
                @endphp

                @if ($merchant != null)
                    {{-- Toko saya --}}
                    <!-- Title -->
                    <li class="sidebar-heading h6">Toko saya</li>
                    <!-- End Title -->

                    <!-- Produk -->
                    <li class="side-nav-menu-item side-nav-has-menu {{ request()->is('store*') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subProduct">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-package"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Produk</span>
                            <span class="side-nav-control-icon d-flex">
                                <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                            </span>
                            <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                        </a>

                        <ul id="subProduct" class="side-nav-menu side-nav-menu-second-level mb-0">
                            <li class="side-nav-menu-item">
                                <a class="side-nav-menu-link" href="{{ route('product.create') }}">Tambah
                                    Produk</a>
                            </li>
                            <li class="side-nav-menu-item">
                                <a class="side-nav-menu-link" href="{{ route('product.index') }}">Daftar
                                    Produk</a>
                            </li>
                        </ul>
                    </li>
                    <!-- End of Produk -->

                    <!-- Payment Method -->
                    <li class="side-nav-menu-item {{ request()->is('payment/*') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="{{ route('payment.index') }}">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-money"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Pembayaran</span>
                        </a>
                    </li>
                    </li>
                    <!-- End Payment Method -->

                    <!-- Order -->
                    <li class="side-nav-menu-item {{ request()->is('orders/*') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="{{ route('orders') }}">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-list"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Pesanan</span>
                        </a>
                    </li>
                    <!-- End of Order -->

                    {{-- End of Toko saya --}}
                @endif

                @if (Auth::user()->is_admin == 1)
                    <!-- Title -->
                    <li class="sidebar-heading h6">Administrator</li>
                    <!-- End Title -->

                    <!-- Users -->
                    <li
                        class="side-nav-menu-item side-nav-has-menu {{ request()->is('admin/users*') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subUsers">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-user"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Pengguna</span>
                            <span class="side-nav-control-icon d-flex">
                                <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                            </span>
                            <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                        </a>

                        <!-- Users: subUsers -->
                        <ul id="subUsers" class="side-nav-menu side-nav-menu-second-level mb-0">
                            <li class="side-nav-menu-item">
                                <a class="side-nav-menu-link" href="{{ route('admin.users.index') }}">Lihat
                                    pengguna</a>
                            </li>
                            <li class="side-nav-menu-item">
                                <a class="side-nav-menu-link" href="{{ route('admin.users.create') }}">Tambah
                                    pengguna</a>
                            </li>
                        </ul>
                        <!-- End Users: subUsers -->
                    </li>
                    <!-- End Users -->

                    <!-- Merchant -->
                    <li
                        class="side-nav-menu-item side-nav-has-menu {{ request()->is('admin/merchant*') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subMerchant">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-bag"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Merchant</span>
                            <span class="side-nav-control-icon d-flex">
                                <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                            </span>
                            <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                        </a>

                        <!-- Users: subUsers -->
                        <ul id="subMerchant" class="side-nav-menu side-nav-menu-second-level mb-0">
                            <li class="side-nav-menu-item">
                                <a class="side-nav-menu-link" href="{{ route('admin.merchant.index') }}">Lihat
                                    merchant</a>
                            </li>
                            <li class="side-nav-menu-item">
                                <a class="side-nav-menu-link" href="{{ route('admin.merchant.create') }}">Tambah
                                    merchant</a>
                            </li>
                        </ul>
                        <!-- End Merchant: subMerchant -->
                    </li>
                    <!-- End Merchant -->

                    <!-- Payment Method -->
                    <li
                        class="side-nav-menu-item side-nav-has-menu {{ request()->is('admin/payment*') ? 'active' : '' }}">
                        <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subPayMethod">
                            <span class="side-nav-menu-icon d-flex mr-3">
                                <i class="gd-money"></i>
                            </span>
                            <span class="side-nav-fadeout-on-closed media-body">Pembayaran</span>
                            <span class="side-nav-control-icon d-flex">
                                <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                            </span>
                            <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                        </a>

                        <!-- Payment Method: sub -->
                        <ul id="subPayMethod" class="side-nav-menu side-nav-menu-second-level mb-0">
                            <li class="side-nav-menu-item">
                                <a class="side-nav-menu-link" href="{{ route('admin.payment.index') }}">Lihat
                                    Metode</a>
                            </li>
                            <li class="side-nav-menu-item">
                                <a class="side-nav-menu-link" href="{{ route('admin.payment.create') }}">Tambah
                                    Metode</a>
                            </li>
                        </ul>
                        <!-- End Payment Method: sub -->
                    </li>
                    <!-- End Payment Method -->
                @endif

            </ul>
        </aside>
        <!-- End Sidebar Nav -->

        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="mb-3 mb-md-4 d-flex justify-content-between">
                    <div class="h3 mb-0">@yield('title')</div>
                </div>

                @if (session('status'))
                    <div class="alert alert-primary alert-left-bordered border-primary alert-dismissible d-flex align-items-center p-md-4 mb-2 fade show"
                        role="alert">
                        <i class="gd-info-alt icon-text text-primary-darker mr-2"></i>
                        <p class="mb-0">
                            <strong>status</strong> {{ session('status') }}
                        </p>
                        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                            <i class="gd-close icon-text icon-text-xs" aria-hidden="true"></i>
                        </button>
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success alert-left-bordered border-success alert-dismissible d-flex align-items-center p-md-4 mb-2 fade show"
                        role="alert">
                        <i class="gd-check-box icon-text text-success mr-2"></i>
                        <p class="mb-0">
                            <strong>Success</strong> {{ session('success') }}
                        </p>
                        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                            <i class="gd-close icon-text icon-text-xs" aria-hidden="true"></i>
                        </button>
                    </div>

                @elseif (session('error'))
                    <div class="alert alert-danger alert-left-bordered border-danger alert-dismissible d-flex align-items-center p-md-4 mb-2 fade show"
                        role="alert">
                        <i class="gd-alert icon-text text-danger mr-2"></i>
                        <p class="mb-0">
                            <strong>Error</strong> {{ session('error') }}
                        </p>
                        <button type="button" class="close" aria-label="Close" data-dismiss="alert">
                            <i class="gd-close icon-text icon-text-xs" aria-hidden="true"></i>
                        </button>
                    </div>
                @endif

                @yield('content')

            </div>

            <!-- Footer -->
            <footer class="small p-3 px-md-4 mt-auto">
                <div class="row justify-content-between">
                    <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
                        <ul class="list-dot list-inline mb-0">
                            <li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a
                                    class="link-dark" href="#">FAQ</a></li>
                            <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark"
                                    href="#">Support</a>
                            </li>
                            <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark"
                                    href="#">Contact
                                    us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg text-center mb-3 mb-lg-0">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i
                                        class="gd-twitter-alt"></i></a></li>
                            <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i
                                        class="gd-facebook"></i></a></li>
                            <li class="list-inline-item mx-2"><a class="link-muted" href="#"><i
                                        class="gd-instagram"></i></a></li>
                        </ul>
                    </div>

                    <div class="col-lg text-center text-lg-right">
                        &copy; {{ date('Y') }} ObatHerbal. All Rights Reserved.
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
        @yield('modal')
    </main>
    <script src="{{ asset('js/graindashboard.js') }}"></script>
    <script src="{{ asset('js/graindashboard.vendor.js') }}"></script>
    @yield('js')
</body>

</html>
