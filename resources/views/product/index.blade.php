@extends('layouts.dashboard')

@section('title', 'Lihat produk')

@section('content')
    @if ($products->count() < 1)
        <div class="row position-relative">
            <div class="col-12 col-md-12 text-center position-absolute position-centered pt-5 pb-5" style="height: 10vh;">
                <i class="gd-package icon-text text-light" style="font-size: 900%;"></i><br>
                <p class="text-light mt-3 lead">
                    Anda belum menambahkan produk<br><br>
                    <a class="btn btn-soft-success" href="{{ route('product.create') }}"><i class="gd-plus"></i> Tambah
                        produk</a>
                </p>
            </div>
        </div>
    @else
        <div class="table-responsive-xl">
            <table class="table text-nowrap mb-0">
                <thead>
                    <tr>
                        <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                        <th class="font-weight-semi-bold border-top-0 py-2">Produk</th>
                        <th class="font-weight-semi-bold border-top-0 py-2">Status</th>
                        <th class="font-weight-semi-bold border-top-0 py-2">Ditambahkan</th>
                        <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $num = 1;
                    @endphp
                    @foreach ($products as $product)
                        <tr>
                            <td class="py-3">{{ $num }}</td>
                            <td class="align-middle py-3">
                                <div class="d-flex align-items-center">
                                    <div class="d-inline-block position-relative mr-2">
                                        {{ $product->name }}
                                    </div>
                            </td>
                            <td class="py-3">
                                @if ($product->status == 'Tersedia')
                                    <span class="badge badge-pill badge-success">Tersedia</span>
                                @elseif($product->status == 'Kosong')
                                    <span class="badge badge-pill badge-danger">Kosong</span>
                                @else
                                    <span class="badge badge-pill badge-warning">Hampir habis</span>
                                @endif
                            </td>
                            <td class="py-3">{{ $product->created_at }}</td>
                            <td class="py-3">
                                <div class="position-relative">
                                    <a class="link-dark d-inline-block"
                                        href="{{ route('product.edit', [$product->id]) }}">
                                        <i class="gd-pencil icon-text"></i>
                                    </a>
                                    <a class="link-dark d-inline-block" data-toggle="modal"
                                        data-target="#delete{{ $product->id }}">
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
            {{ $products->links('layouts.pagination') }}
        </div>
    @endif
@endsection

@section('modal')
    @foreach ($products as $product)
        {{-- <button type="button" data-toggle="modal" data-target="#exampleModal">Tes</button> --}}

        <div id="delete{{ $product->id }}" class="modal fade" role="dialog"
            aria-labelledby="delete{{ $product->id }}Label" aria-hidden="true">
            <form action="{{ route('product.delete', [$product->id]) }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete{{ $product->id }}Label">Hapus produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda setuju menghapus produk <strong>{{ $product->name }}</strong> ?
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