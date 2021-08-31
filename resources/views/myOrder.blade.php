@extends('layouts.dashboard')

@section('title', 'Pesanan Saya')

@section('content')
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Pekerja</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Keterangan</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Status</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($orders as $order)
                    <tr>
                        <td class="align-middle py-3">{{ $num }}</td>
                        <td class="align-middle py-3">{{ $order->worker->name }}</td>
                        <td class="align-middle py-3">{{ Str::limit($order->keterangan, 20, '...') }}</td>
                        <td class="align-middle py-3">
                            <span class="badge badge-pill badge-info">{{ $order->status }}</span>
                        </td>
                        <td class="align-middle py-3">
                            <button class="btn btn-sm btn-soft-success" data-toggle="modal"
                                data-target="#lihat{{ $order->id }}" role="button">Lihat</button>
                        </td>
                    </tr>
                    @php
                        $num++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('modal')
    @foreach ($orders as $order)
        <div id="lihat{{ $order->id }}" class="modal fade" role="dialog" aria-labelledby="lihatLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="lihatLabel">Detail Pekerjaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="client">Nama Penyewa</label>
                            <input id="client" type="text" class="form-control" name="client"
                                value="{{ $order->user->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="worker">Nama Pekerja</label>
                            <input id="worker" type="text" class="form-control" name="worker"
                                value="{{ $order->worker->name }}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" id="keterangan" rows="4" name="keterangan" disabled>{{ $order->keterangan }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-soft-light" data-dismiss="modal">Tutup</button>
                        <a href="https://api.whatsapp.com/send?phone={{ preg_replace('/^0/', '62', $order->company->phone) }}"
                            target="_blank" class="btn btn-sm btn-soft-success"><i class="fab fa-whatsapp"></i> Tanya Penjual</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
