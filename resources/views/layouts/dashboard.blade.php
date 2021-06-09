<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Title -->
    <title>@yield('title') | ObatHerbal</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    <!-- Template -->
    <link rel="stylesheet" href="{{ asset('css/graindashboard.css') }}">

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
                                <a class="unfold-link d-flex align-items-center text-nowrap" href="#">
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
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
                <!-- Title -->
                <li class="sidebar-heading h6">Home</li>
                <!-- End Title -->

                <!-- Dashboard -->
                <li class="side-nav-menu-item active">
                    <a class="side-nav-menu-link media align-items-center" href="/">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-home"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Home</span>
                    </a>
                </li>
                <!-- End Dashboard -->

                <!-- Pembelian -->
                <li class="side-nav-menu-item side-nav-has-menu">
                    <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subBuying">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-file"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Pembelian</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>

                    <ul id="subBuying" class="side-nav-menu side-nav-menu-second-level mb-0">
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="#">Menunggu Pembayaran</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="#">Daftar Transaksi</a>
                        </li>
                    </ul>

                </li>
                <!-- End Pembelian -->

                {{-- Toko saya --}}
                <!-- Title -->
                <li class="sidebar-heading h6">Toko saya</li>
                <!-- End Title -->

                @php
                    $merchant = App\Models\Merchant::where('admin_id', Auth::user()->id)->first();
                @endphp

                @if ($merchant == null)
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link media align-items-center" href="#">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-plus"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Buka Toko</span>
                    </a>
                </li>
                @else
                    <!-- Produk -->
                <li class="side-nav-menu-item side-nav-has-menu">
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
                            <a class="side-nav-menu-link" href="#">Tambah Produk</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="#">Daftar Produk</a>
                        </li>
                    </ul>
                </li>
                <!-- End of Produk -->
                @endif

                {{-- End of Toko saya --}}

                @if (Auth::user()->is_admin == 1)
                <!-- Title -->
                <li class="sidebar-heading h6">Administrator</li>
                <!-- End Title -->

                <!-- Users -->
                <li class="side-nav-menu-item side-nav-has-menu">
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
                            <a class="side-nav-menu-link" href="{{ route('admin.users.index') }}">Lihat pengguna</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="user-edit.html">Tambah pengguna</a>
                        </li>
                    </ul>
                    <!-- End Users: subUsers -->
                </li>
                <!-- End Users -->

                <!-- Authentication -->
                <li class="side-nav-menu-item side-nav-has-menu">
                    <a class="side-nav-menu-link media align-items-center" href="#" data-target="#subPages">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-lock"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Authentication</span>
                        <span class="side-nav-control-icon d-flex">
                            <i class="gd-angle-right side-nav-fadeout-on-closed"></i>
                        </span>
                        <span class="side-nav__indicator side-nav-fadeout-on-closed"></span>
                    </a>

                    <!-- Pages: subPages -->
                    <ul id="subPages" class="side-nav-menu side-nav-menu-second-level mb-0">
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="login.html">Login</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="register.html">Register</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="password-reset.html">Forgot Password</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="password-reset-2.html">Forgot Password 2</a>
                        </li>
                        <li class="side-nav-menu-item">
                            <a class="side-nav-menu-link" href="email-verification.html">Email Verification</a>
                        </li>
                    </ul>
                    <!-- End Pages: subPages -->
                </li>
                <!-- End Authentication -->

                <!-- Settings -->
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link media align-items-center" href="settings.html">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-settings"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Settings</span>
                    </a>
                </li>
                <!-- End Settings -->

                <!-- Static -->
                <li class="side-nav-menu-item">
                    <a class="side-nav-menu-link media align-items-center" href="static-non-auth.html">
                        <span class="side-nav-menu-icon d-flex mr-3">
                            <i class="gd-file"></i>
                        </span>
                        <span class="side-nav-fadeout-on-closed media-body">Static page</span>
                    </a>
                </li>
                <!-- End Static -->
                @endif

            </ul>
        </aside>
        <!-- End Sidebar Nav -->

        <div class="content">
            <div class="py-4 px-3 px-md-4">

                <div class="mb-3 mb-md-4 d-flex justify-content-between">
                    <div class="h3 mb-0">@yield('title')</div>
                </div>

                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="small p-3 px-md-4 mt-auto">
                <div class="row justify-content-between">
                    <div class="col-lg text-center text-lg-left mb-3 mb-lg-0">
                        <ul class="list-dot list-inline mb-0">
                            <li class="list-dot-item list-dot-item-not list-inline-item mr-lg-2"><a class="link-dark"
                                    href="#">FAQ</a></li>
                            <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Support</a>
                            </li>
                            <li class="list-dot-item list-inline-item mr-lg-2"><a class="link-dark" href="#">Contact
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
    </main>


    <script src="{{ asset('js/graindashboard.js') }}"></script>
    <script src="{{ asset('js/graindashboard.vendor.js') }}"></script>
</body>

</html>
