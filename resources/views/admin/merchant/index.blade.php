@extends('layouts.dashboard')

@section('title', 'Daftar Merchant')

@section('content')
    <div class="table-responsive-xl table-stripped">
        <table class="table text-nowrap mb-0">
            <thead>
                <tr>
                    <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Name</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Owner</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Registration Date</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($merchants as $merchant)
                    <tr>
                        <td class="py-3">{{ $num }}</td>
                        <td class="align-middle py-3">
                            <div class="d-flex align-items-center">
                                {{ $merchant->name }}
                            </div>
                        </td>
                        <td class="py-3">
                            {{ $merchant->user->name }}
                        </td>
                        <td class="py-3">{{ $merchant->created_at }}</td>
                        <td class="py-3">
                            <div class="position-relative">
                                <a class="link-dark d-inline-block" data-toggle="modal" data-target="#delete{{ $merchant->id }}">
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
        {{ $merchants->links('layouts.pagination') }}
    </div>
@endsection

@section('modal')
    @foreach ($merchants as $merchant)
        {{-- <button type="button" data-toggle="modal" data-target="#exampleModal">Tes</button> --}}

        <div id="delete{{ $merchant->id }}" class="modal fade" role="dialog"
            aria-labelledby="delete{{ $merchant->id }}Label" aria-hidden="true">
            <form action="{{ route('admin.merchant.delete', [$merchant->id]) }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete{{ $merchant->id }}Label">Hapus toko</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda setuju menghapus toko <strong>{{ $merchant->name }}</strong> ?
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