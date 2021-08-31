@extends('layouts.dashboard')

@section('title', 'Penyedia Jasa')

@section('content')
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="font-weight-semi-bold border-top-0 py-2">#</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Nama</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Telepon</th>
                    <th class="font-weight-semi-bold border-top-0 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $num = 1;
                @endphp
                @foreach ($companies as $company)
                    <tr>
                        <td class="align-middle py-3">{{ $num }}</td>
                        <td class="align-middle py-3">
                            <div class="d-flex align-items-center">
                                <div class="d-inline-block position-relative mr-2">
                                    <img class="avatar rounded-circle mr-md-2"
                                        src="{{ asset('storage/users-avatar/'.$company->user->avatar) }}"
                                        alt="{{ $company->name }}">
                                </div>
                                {{ $company->name }}
                            </div>
                        </td>
                        <td class="align-middle py-3">{{ $company->phone }}</td>
                        <td class="align-middle py-3">
                            <a class="btn btn-soft-success" href="{{ route('company.detail', $company->id) }}" role="button">Lihat</a>
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
