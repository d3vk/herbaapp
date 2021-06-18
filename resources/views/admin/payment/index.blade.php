@extends('layouts.dashboard')

@section('title', 'Metode Pembayaran')

@section('content')
<div class="table-responsive-xl table-stripped">
    <table class="table text-nowrap mb-0">
        <thead>
            <tr>
                <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                <th class="font-weight-semi-bold border-top-0 py-2">Name</th>
                <th class="font-weight-semi-bold border-top-0 py-2">Ditambahkan pada</th>
                <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $num = 1;
            @endphp
            @foreach ($methods as $method)
                <tr>
                    <td class="py-3">{{ $num }}</td>
                    <td class="align-middle py-3">
                        <div class="d-flex align-items-center">
                            <div class="d-inline-block position-relative mr-2">
                                <img class="mr-md-2"
                                    src="{{ asset('img/'.$method->payment_method_img) }}"
                                    alt="{{ $method->payment_name }}"
                                    style="max-width: 3.5rem; height: auto;">
                            </div>
                            {{ $method->payment_name }}
                        </div>
                    </td>
                    <td class="py-3">{{ $method->created_at }}</td>
                    <td class="py-3">
                        <div class="position-relative">
                            <a class="link-dark d-inline-block" data-toggle="modal" data-target="#delete{{ $method->id }}">
                                <i class="gd-trash icon-text"></i>
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
    {{ $methods->links('layouts.pagination') }}
</div>
@endsection

@section('modal')
    @foreach ($methods as $method)
        {{-- <button type="button" data-toggle="modal" data-target="#exampleModal">Tes</button> --}}

        <div id="delete{{ $method->id }}" class="modal fade" role="dialog"
            aria-labelledby="delete{{ $method->id }}Label" aria-hidden="true">
            <form action="{{ route('admin.payment.delete', [$method->id]) }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete{{ $method->id }}Label">Hapus metode pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda setuju menghapus <strong>{{ $method->payment_name }}</strong> dari metode pembayaran?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-soft-light" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-soft-danger">Hapus</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
@endsection