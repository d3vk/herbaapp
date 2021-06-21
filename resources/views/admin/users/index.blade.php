@extends('layouts.dashboard')

@section('title', 'Lihat Pengguna')

@section('content')
    <div class="table-responsive-xl">
        <table class="table text-nowrap mb-0">
            <thead>
                <tr>
                    <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Name</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Email</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Registration Date</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($users as $user)
                    <tr>
                        <td class="py-3">{{ $num }}</td>
                        <td class="align-middle py-3">
                            <div class="d-flex align-items-center">
                                <div class="d-inline-block position-relative mr-2">
                                    @if ($user->is_admin == 1)
                                        <span
                                            class="indicator indicator-lg indicator-bordered-reverse indicator-top-left indicator-secondary rounded-circle"></span>
                                    @endif
                                    <img class="avatar rounded-circle mr-md-2"
                                        src="https://ui-avatars.com/api/?name={{ $user->name }}&color=8BC34A&background=F0F4C3"
                                        alt="{{ $user->name }}">
                                </div>
                                {{ $user->name }}
                            </div>
                        </td>
                        <td class="py-3">{{ $user->email }}</td>
                        <td class="py-3">{{ $user->created_at }}</td>
                        <td class="py-3">
                            <div class="position-relative">
                                <a class="link-dark d-inline-block" href="{{ route('admin.users.edit', [$user->id]) }}">
                                    <i class="gd-pencil icon-text"></i>
                                </a>
                                <a class="link-dark d-inline-block" data-toggle="modal"
                                    data-target="#delete{{ $user->id }}">
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
        {{ $users->links('layouts.pagination') }}
    </div>
@endsection

@section('modal')
    @foreach ($users as $user)
        {{-- <button type="button" data-toggle="modal" data-target="#exampleModal">Tes</button> --}}

        <div id="delete{{ $user->id }}" class="modal fade" role="dialog"
            aria-labelledby="delete{{ $user->id }}Label" aria-hidden="true">
            <form action="{{ route('admin.users.delete', [$user->id]) }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="delete{{ $user->id }}Label">Hapus pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda setuju menghapus pengguna <strong>{{ $user->name }}</strong> ?
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
