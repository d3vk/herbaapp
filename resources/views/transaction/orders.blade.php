@extends('layouts.dashboard')

@section('title', 'Daftar Pesanan')

@section('content')
    <div class="table-responsive-xl">
        <table class="table text-nowrap mb-0">
            <thead>
                <tr>
                    <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Invoice</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Customer</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Status</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($orders as $order)
                    <tr>
                        <td class="py-3">{{ $num }}</td>
                        <td class="py-3">{{ $order->invoice }}</td>
                        <td class="py-3"> {{ $order->user->name }}</td>
                        <td class="py-3 align-item-center"><span class="badge badge-secondary">{{ $order->status }}</span></td>
                        <td class="py-3">
                            <div class="position-relative">
                                <a class="link-dark d-inline-block" href="{{ route('orders.detail', [$order->id]) }}">
                                    <i class="gd-eye icon-text"></i>
                                </a>
                                <a class="link-dark d-inline-block" href="{{ route('orders.edit', [$order->id]) }}">
                                    <i class="gd-pencil icon-text"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @php
                        $num++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        {{ $orders->links('layouts.pagination') }}
    </div>
@endsection
