@extends('layouts.dashboard')

@section('title', 'Daftar Transaksi')

@section('content')
    @foreach ($transactions as $order)
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h6 class="text-muted"><strong>Invoice {{ $order->invoice }}</strong></h6>
                    <span class="badge badge-secondary">{{ $order->status }}</span>
                </div>
                {{-- @if ($order->status == 'Sedang dikirim')
                <a href="#" class="btn btn-soft-success">Diterima</a>
                @else
                <a href="javascript:void(0)" class="btn btn-soft-light" style="pointer-events: none;">Diterima</a>
                @endif --}}
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
                                $totalPrice = 0;
                            @endphp
                            @foreach ($items as $item)
                                <tr>
                                    <td class="py-3">{{ $num }}</td>
                                    <td class="py-3">{{ $item->product[0]->name }}</td>
                                    <td class="py-3">{{ $item->quantity }}</td>
                                    <td class="py-3">{{ number_format($item->product[0]->price, 0, ',', '.') }}</td>
                                    <td class="py-3">
                                        {{ number_format($item->quantity * $item->product[0]->price, 0, ',', '.') }}</td>
                                </tr>
                                @php
                                    $num++;
                                    $totalPrice += $item->quantity * $item->product[0]->price;
                                @endphp
                            @endforeach
                            <tr>
                                <td></td>
                                <td><a href="https://api.whatsapp.com/send?phone={{ preg_replace('/^0/','62',$order->merchant->phone) }}" target="_blank" class="btn btn-sm btn-soft-danger">Tanya penjual</a></td>
                                <td></td>

                                <td><button class="btn btn-sm btn-soft-success" data-toggle="modal"
                                        data-target="#bayar">Bayar</button></td>
                                <td>
                                    <h6><strong>{{ number_format($totalPrice, 0, ',', '.') }}</strong></h6>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('modal')
@php
    $account = $order->payment[0]->account;
    $method_id = $order->payment[0]->method_id;
    $namaBank = $order->payment[0]->method->payment_name
@endphp
    <div id="bayar" class="modal fade" role="dialog" aria-labelledby="bayarLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bayarLabel">Cara Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @switch($method_id)
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
