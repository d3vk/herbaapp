@extends('layouts.dashboard')

@section('title', 'Pilih metode pembayaran')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <h6 class="text-muted"><strong>Invoice {{ $order->invoice }}</strong></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive xl">
                <table class="table text-nowrap mb-0">
                    <thead>
                        <tr>
                            <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                            <th class="font-weight-semi-bold border-top-0 py-2">Item</th>
                            <th class="font-weight-semi-bold border-top-0 py-2">Jumlah</th>
                            <th class="font-weight-semi-bold border-top-0 py-2">Satuan</th>
                            <th class="font-weight-semi-bold border-top-0 py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $num = 1;
                            $items = \App\Models\OrderItem::where('order_invoice', $order->invoice)->get();
                        @endphp
                        @foreach ($items as $item)
                            <tr>
                                <td class="py-3">{{ $num }}</td>
                                <td class="py-3">{{ $item->product[0]->name }}</td>
                                <td class="py-3">{{ $item->quantity }}</td>
                                <td class="py-3">{{ $item->product[0]->price }}</td>
                                <td class="py-3">{{ $item->quantity * $item->product[0]->price }}</td>
                            </tr>
                            @php
                                $num++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Card -->
    <div class="card mb-3 mb-md-4">
        <div class="card-header d-flex border-bottom align-items-center px-3 px-md-4 py-0">
            <h5 class="font-weight-semi-bold py-3 py-md-4 mb-0">Metode pembayaran tersedia</h5>

            <div class="nav-mobile-container ml-auto">
                <ul id="tabs2"
                    class="js-tabs-to-dropdown nav nav-v2 nav-tabs nav-mobile nav-mobile-right nav-mobile-shade nav-primary"
                    role="tablist" data-transform-resolution="1199.98" data-tabs-mobile-type="slide-up-down"
                    data-btn-classes="btn btn-sm btn-primary">
                    <li class="nav-mobile-item nav-item">
                        <a class="nav-mobile-link nav-link py-3 py-md-4 active" href="#metode1" role="tab"
                            aria-selected="true" data-toggle="tab">{{ $payments[0]->method->payment_name }}
                        </a>
                    </li>
                    @for ($i = 1; $i < $payments->count(); $i++)
                        <li class="nav-mobile-item nav-item ml-4">
                            <a class="nav-mobile-link nav-link py-3 py-md-4" href="#metode{{ $i + 1 }}" role="tab"
                                aria-selected="false" data-toggle="tab">{{ $payments[$i]->method->payment_name }}
                            </a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
        <div id="tabsContent2" class="card-body tab-content">
            <div class="tab-pane fade show active" id="metode1" role="tabpanel">
                <h5>Instruksi pembayaran menggunakan {{ $payments[0]->method->payment_name }}</h5>
                {{-- <p class="mb-0">{{ $payments[0]->method->payment_instruction }}</p> --}}
                @php
                    $namaBank = $payments[0]->method->payment_name;
                    $account = $merchantAccount[0]->account;
                    $method = $merchantAccount[0]->method_id;
                @endphp
                @switch($method)
                    @case(1)
                        <p class="mb-0">
                        <ol>
                            <li>Masukkan kartu ATM {{ $namaBank }} kamu. Pastikan posisi kartu ATM {{ $namaBank }}
                                kamu
                                sesuai petunjuk yang tertera di mesin ATM.</li>
                            <li>Pilih bahasa, sebaiknya pilih <strong>Bahasa Indonesia</strong> agar lebih mudah dipahami.
                                Masukkan
                                PIN kartu ATM {{ $namaBank }}. Jangan lupa untuk menutupi PIN untuk menghindari hal-hal
                                yang
                                tidak diinginkan.</li>
                            <li>Pilih <strong>Menu Lain</strong> lalu pilih <strong>transfer</strong></li>
                            <li>Setelah itu kamu akan diberi pilihan "dari rekening giro" dan "dari rekening tabungan". Pilih
                                <strong>dari rekening tabungan</strong>
                            </li>
                            <li>Untuk transfer ke sesama {{ $namaBank }}, kamu harus memilih ke <strong>rekening
                                    {{ $namaBank }}</strong>, kemudian isi bank tujuan transfer dengan
                                <strong>{{ $account }}</strong>
                            </li>
                            <li>Atau jika kamu ingin transfer uang antar bank pilih “ke rekening bank lain”. Lalu isi bank
                                tujuan
                                dengan 009 {{ $account }}</li>
                            <li>Masukkan nominal yang ingin kamu transfer.</li>
                            <li>Setelah itu akan muncul layar konfirmasi, pastikan data-data yang kamu masukkan benar dan pilih
                                <strong>ya</strong>.
                            </li>
                            <li>Tunggu hingga transaksi berhasil dan keluar struk dari ATM.</li>
                            <li>Setelah itu ambil ATM kamu.</li>
                        </ol>
                        </p>
                    @break
                    @case(2)
                        <p class="mb-0">
                        <ol>
                            <li>Masukkan kartu ATM {{ $namaBank }} kamu. Pastikan posisi kartu ATM {{ $namaBank }}
                                kamu
                                sesuai petunjuk yang tertera di mesin ATM.</li>
                            <li>Pilih bahasa, sebaiknya pilih <strong>Bahasa Indonesia</strong> agar lebih mudah dipahami.
                                Masukkan
                                PIN kartu ATM {{ $namaBank }}. Jangan lupa untuk menutupi PIN untuk menghindari hal-hal
                                yang
                                tidak diinginkan.</li>
                            <li>Pilih <strong>Menu Lain</strong> lalu pilih <strong>transfer</strong></li>
                            <li>Setelah itu kamu akan diberi pilihan "dari rekening giro" dan "dari rekening tabungan". Pilih
                                <strong>dari rekening tabungan</strong>
                            </li>
                            <li>Untuk transfer ke sesama {{ $namaBank }}, kamu harus memilih ke <strong>rekening
                                    {{ $namaBank }}</strong>, kemudian isi bank tujuan transfer dengan
                                <strong>{{ $account }}</strong>
                            </li>
                            <li>Atau jika kamu ingin transfer uang antar bank pilih “ke rekening bank lain”. Lalu isi bank
                                tujuan
                                dengan 014 {{ $account }}</li>
                            <li>Masukkan nominal yang ingin kamu transfer.</li>
                            <li>Setelah itu akan muncul layar konfirmasi, pastikan data-data yang kamu masukkan benar dan pilih
                                <strong>ya</strong>.
                            </li>
                            <li>Tunggu hingga transaksi berhasil dan keluar struk dari ATM.</li>
                            <li>Setelah itu ambil ATM kamu.</li>
                        </ol>
                        </p>
                    @break
                    @case(3)
                        <p class="mb-0">
                        <ol>
                            <li>Masukkan kartu ATM {{ $namaBank }} kamu. Pastikan posisi kartu ATM {{ $namaBank }}
                                kamu
                                sesuai petunjuk yang tertera di mesin ATM.</li>
                            <li>Pilih bahasa, sebaiknya pilih <strong>Bahasa Indonesia</strong> agar lebih mudah dipahami.
                                Masukkan
                                PIN kartu ATM {{ $namaBank }}. Jangan lupa untuk menutupi PIN untuk menghindari hal-hal
                                yang
                                tidak diinginkan.</li>
                            <li>Pilih <strong>Menu Lain</strong> lalu pilih <strong>transfer</strong></li>
                            <li>Setelah itu kamu akan diberi pilihan "dari rekening giro" dan "dari rekening tabungan". Pilih
                                <strong>dari rekening tabungan</strong>
                            </li>
                            <li>Untuk transfer ke sesama {{ $namaBank }}, kamu harus memilih ke <strong>rekening
                                    {{ $namaBank }}</strong>, kemudian isi bank tujuan transfer dengan
                                <strong>{{ $account }}</strong>
                            </li>
                            <li>Atau jika kamu ingin transfer uang antar bank pilih “ke rekening bank lain”. Lalu isi bank
                                tujuan
                                dengan 002 {{ $account }}</li>
                            <li>Masukkan nominal yang ingin kamu transfer.</li>
                            <li>Setelah itu akan muncul layar konfirmasi, pastikan data-data yang kamu masukkan benar dan pilih
                                <strong>ya</strong>.
                            </li>
                            <li>Tunggu hingga transaksi berhasil dan keluar struk dari ATM.</li>
                            <li>Setelah itu ambil ATM kamu.</li>
                        </ol>
                        </p>
                    @break
                    @default
                        <p class="mb-0">
                            Tidak tersedia
                        </p>
                @endswitch
                <form action="{{ route('transaction.pay', ['oid' => $order->id, 'pid' => $merchantAccount[0]->id]) }}"
                    method="post">
                    @method('put')
                    @csrf
                    <button type="submit" class="btn btn-soft-success">Bayar</button>
                </form>
            </div>

            @for ($i = 1; $i < $payments->count(); $i++)
                @php
                    $namaBank = $payments[$i]->method->payment_name;
                    $account = $merchantAccount[$i]->account;
                    $method = $merchantAccount[$i]->method_id;
                @endphp
                <div class="tab-pane fade" id="metode{{ $i + 1 }}" role="tabpanel">
                    <h5>Instruksi pembayaran menggunakan {{ $payments[$i]->method->payment_name }}</h5>
                    @switch($method)
                        @case(1)
                            <p class="mb-0">
                            <ol>
                                <li>Masukkan kartu ATM {{ $namaBank }} kamu. Pastikan posisi kartu ATM {{ $namaBank }}
                                    kamu
                                    sesuai petunjuk yang tertera di mesin ATM.</li>
                                <li>Pilih bahasa, sebaiknya pilih <strong>Bahasa Indonesia</strong> agar lebih mudah dipahami.
                                    Masukkan
                                    PIN kartu ATM {{ $namaBank }}. Jangan lupa untuk menutupi PIN untuk menghindari hal-hal
                                    yang
                                    tidak diinginkan.</li>
                                <li>Pilih <strong>Menu Lain</strong> lalu pilih <strong>transfer</strong></li>
                                <li>Setelah itu kamu akan diberi pilihan "dari rekening giro" dan "dari rekening tabungan".
                                    Pilih
                                    <strong>dari rekening tabungan</strong>
                                </li>
                                <li>Untuk transfer ke sesama {{ $namaBank }}, kamu harus memilih ke <strong>rekening
                                        {{ $namaBank }}</strong>, kemudian isi bank tujuan transfer dengan
                                    <strong>{{ $account }}</strong>
                                </li>
                                <li>Atau jika kamu ingin transfer uang antar bank pilih “ke rekening bank lain”. Lalu isi bank
                                    tujuan
                                    dengan 009 {{ $account }}</li>
                                <li>Masukkan nominal yang ingin kamu transfer.</li>
                                <li>Setelah itu akan muncul layar konfirmasi, pastikan data-data yang kamu masukkan benar dan
                                    pilih
                                    <strong>ya</strong>.
                                </li>
                                <li>Tunggu hingga transaksi berhasil dan keluar struk dari ATM.</li>
                                <li>Setelah itu ambil ATM kamu.</li>
                            </ol>
                            </p>
                        @break
                        @case(2)
                            <p class="mb-0">
                            <ol>
                                <li>Masukkan kartu ATM {{ $namaBank }} kamu. Pastikan posisi kartu ATM {{ $namaBank }}
                                    kamu
                                    sesuai petunjuk yang tertera di mesin ATM.</li>
                                <li>Pilih bahasa, sebaiknya pilih <strong>Bahasa Indonesia</strong> agar lebih mudah dipahami.
                                    Masukkan
                                    PIN kartu ATM {{ $namaBank }}. Jangan lupa untuk menutupi PIN untuk menghindari hal-hal
                                    yang
                                    tidak diinginkan.</li>
                                <li>Pilih <strong>Menu Lain</strong> lalu pilih <strong>transfer</strong></li>
                                <li>Setelah itu kamu akan diberi pilihan "dari rekening giro" dan "dari rekening tabungan".
                                    Pilih
                                    <strong>dari rekening tabungan</strong>
                                </li>
                                <li>Untuk transfer ke sesama {{ $namaBank }}, kamu harus memilih ke <strong>rekening
                                        {{ $namaBank }}</strong>, kemudian isi bank tujuan transfer dengan
                                    <strong>{{ $account }}</strong>
                                </li>
                                <li>Atau jika kamu ingin transfer uang antar bank pilih “ke rekening bank lain”. Lalu isi bank
                                    tujuan
                                    dengan 014 {{ $account }}</li>
                                <li>Masukkan nominal yang ingin kamu transfer.</li>
                                <li>Setelah itu akan muncul layar konfirmasi, pastikan data-data yang kamu masukkan benar dan
                                    pilih
                                    <strong>ya</strong>.
                                </li>
                                <li>Tunggu hingga transaksi berhasil dan keluar struk dari ATM.</li>
                                <li>Setelah itu ambil ATM kamu.</li>
                            </ol>
                            </p>
                        @break
                        @case(3)
                            <p class="mb-0">
                            <ol>
                                <li>Masukkan kartu ATM {{ $namaBank }} kamu. Pastikan posisi kartu ATM {{ $namaBank }}
                                    kamu
                                    sesuai petunjuk yang tertera di mesin ATM.</li>
                                <li>Pilih bahasa, sebaiknya pilih <strong>Bahasa Indonesia</strong> agar lebih mudah dipahami.
                                    Masukkan
                                    PIN kartu ATM {{ $namaBank }}. Jangan lupa untuk menutupi PIN untuk menghindari hal-hal
                                    yang
                                    tidak diinginkan.</li>
                                <li>Pilih <strong>Menu Lain</strong> lalu pilih <strong>transfer</strong></li>
                                <li>Setelah itu kamu akan diberi pilihan "dari rekening giro" dan "dari rekening tabungan".
                                    Pilih
                                    <strong>dari rekening tabungan</strong>
                                </li>
                                <li>Untuk transfer ke sesama {{ $namaBank }}, kamu harus memilih ke <strong>rekening
                                        {{ $namaBank }}</strong>, kemudian isi bank tujuan transfer dengan
                                    <strong>{{ $account }}</strong>
                                </li>
                                <li>Atau jika kamu ingin transfer uang antar bank pilih “ke rekening bank lain”. Lalu isi bank
                                    tujuan
                                    dengan 002 {{ $account }}</li>
                                <li>Masukkan nominal yang ingin kamu transfer.</li>
                                <li>Setelah itu akan muncul layar konfirmasi, pastikan data-data yang kamu masukkan benar dan
                                    pilih
                                    <strong>ya</strong>.
                                </li>
                                <li>Tunggu hingga transaksi berhasil dan keluar struk dari ATM.</li>
                                <li>Setelah itu ambil ATM kamu.</li>
                            </ol>
                            </p>
                        @break
                        @default
                            <p class="mb-0">
                                Tidak tersedia
                            </p>
                    @endswitch
                    <form
                        action="{{ route('transaction.pay', ['oid' => $order->id, 'pid' => $merchantAccount[$i]->id]) }}"
                        method="post" id="payMethod">
                        @method('put')
                        @csrf
                        <button type="submit" class="btn btn-soft-success">Bayar</button>
                    </form>
                </div>
            @endfor
        </div>
    </div>
    <!-- End Card -->
@endsection

@section('js')
    <script>
        $('#payMethod').one('submit', function() {
            $(this).find('input[type="submit"]').attr('disabled', 'disabled');
        });
    </script>
@endsection
