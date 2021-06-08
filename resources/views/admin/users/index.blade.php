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
                                    <span class="indicator indicator-lg indicator-bordered-reverse indicator-top-left indicator-secondary rounded-circle"></span>
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
                                <a class="link-dark d-inline-block" href="#">
                                    <i class="gd-pencil icon-text"></i>
                                </a>
                                <a class="link-dark d-inline-block" href="#">
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
