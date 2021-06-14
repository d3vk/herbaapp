@extends('layouts.dashboard')

@section('title', 'Ubah produk')

@section('content')
    <div class="card">
        <div class="card-body pt-5">
            <form method="POST" action="{{ route('product.update', [$product->id]) }}" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $product->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Harga</label>
                    <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ $product->price }}" required autocomplete="price">

                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Supply Produk
                    </label>
                    <select name="status" id="status" class="form-control">
                        <option value="Tersedia">Tersedia</option>
                        <option value="Kosong">Kosong</option>
                        <option value="Hampir habis">Hampir habis</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="short_description">Penjelasan Singkat Produk</label>
                    <input id="short_description" type="text"
                        class="form-control @error('short_description') is-invalid @enderror" name="short_description"
                        value="{{ $product->short_description }}" required autocomplete="short_description">

                    @error('short_description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi Produk</label>
                    <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                        name="description" required rows="4" cols="50"
                        autocomplete="description">{{ $product->description }}</textarea>

                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="good_for">Baik digunakan untuk menangani</label>
                    <input id="good_for" type="text" class="form-control @error('good_for') is-invalid @enderror"
                        name="good_for" value="{{ $product->good_for }}" required autocomplete="good_for">

                    @error('good_for')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="how_to">Cara pemakaian</label>
                    <input id="how_to" type="text" class="form-control @error('how_to') is-invalid @enderror" name="how_to"
                        value="{{ $product->how_to }}" required autocomplete="how_to">

                    @error('how_to')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ingredients">Komposisi</label>
                    <input id="ingredients" type="text" class="form-control @error('ingredients') is-invalid @enderror"
                        name="ingredients" value="{{ $product->ingredients }}" required autocomplete="ingredients">

                    @error('ingredients')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group no-margin">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="gd-pencil"></i> Ubah produk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
