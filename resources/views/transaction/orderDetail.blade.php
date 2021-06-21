@extends('layouts.dashboard')

@section('title', 'Detail Pesanan '.$order->invoice)

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
@endsection