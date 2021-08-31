{{-- Toko saya --}}
                    <!-- Title -->
                    <li class="sidebar-heading h6">Toko saya</li>
                    <!-- End Title -->

                    @php
                        $merchant = App\Models\Merchant::where('admin_id', Auth::user()->id)->first();
                    @endphp

                    @if ($merchant == null)
                        <li class="side-nav-menu-item {{ request()->is('create-store*') ? 'active' : '' }}">
                            <a class="side-nav-menu-link media align-items-center"
                                href="{{ route('create.market') }}">
                                <span class="side-nav-menu-icon d-flex mr-3">
                                    <i class="gd-plus"></i>
                                </span>
                                <span class="side-nav-fadeout-on-closed media-body">Buka Toko</span>
                            </a>
                        </li>
                    @else
                        <!-- Produk -->
                        <li
                            class="side-nav-menu-item side-nav-has-menu {{ request()->is('store*') ? 'active' : '' }}">
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
                            <a class="side-nav-menu-link media align-items-center"
                                href="{{ route('payment.index') }}">
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
                    @endif
                    {{-- End of Toko saya --}}