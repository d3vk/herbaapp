@extends('layouts.dashboard')

@section('title', 'Detail Company')

@section('content')
    <div class="jumbotron" style="background-color: rgba(7,215,247,.1) !important">
        <div class="row">
            <div class="col-8 mx-auto">
                <h2 class="display-5">{{ $company->name }}</h2>
                <p class="strong">{{ $company->profile }}</p>
                <p class="strong"><i class="gd-location-pin"></i> {{ $company->address }}</p>
                <a href="https://api.whatsapp.com/send?phone={{ preg_replace('/^0/', '62', $company->phone) }}"
                    target="_blank" class="btn btn-sm btn-soft-success"><i class="fab fa-whatsapp"></i> Kontak</a>
                <button type="button" data-toggle="modal" data-target="#create" class="btn btn-sm btn-soft-success">Hire</button>
            </div>
            <div class="col-4 mx-auto text-center">
                <img src="{{ asset('storage/users-avatar/' . $company->user->avatar) }}" alt="company logo" width="90px"
                    height="90px" style="object-fit: cover;" class="rounded-circle">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card flex-row align-items-center p-3 p-md-4"
                style="background-color: rgba(252,213,59,.2) !important">
                <div class="icon icon-lg bg-soft-primary rounded-circle mr-3">
                    <i class="gd-bar-chart icon-text d-inline-block text-primary"></i>
                </div>
                <div>
                    <h4 class="lh-1 mb-1">23</h4>
                    <h6 class="mb-0">Dalam Pengerjaan</h6>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card flex-row align-items-center p-3 p-md-4"
                style="background-color: rgba(252,213,59,.2) !important">
                <div class="icon icon-lg bg-soft-primary rounded-circle mr-3">
                    <i class="gd-face-smile icon-text d-inline-block text-primary"></i>
                </div>
                <div>
                    <h4 class="lh-1 mb-1">90</h4>
                    <h6 class="mb-0">Pekerjaan Selesai</h6>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
<div id="create" class="modal fade" role="dialog"
    aria-labelledby="createLabel" aria-hidden="true">
    <form action="{{ route('maklon.order') }}" method="post">
        @method('post')
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createLabel">Hire Pekerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="client">Nama Penyewa</label>
                        <input id="client" type="text" class="form-control" name="client"
                            value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="worker">Nama Pekerja</label>
                        <input id="worker_id" type="text" class="form-control" name="worker_id"
                            value="{{ $company->id }}" hidden>
                        <input id="worker" type="text" class="form-control" name="worker"
                            value="{{ $company->name }} / {{ $company->user->name }}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="4" name="keterangan" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-soft-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-soft-success">Hire</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection