@extends('layouts.shop')

@section('title', $product->name)

@section('css')
    <style>
        fieldset.active {
            display: block !important
        }

        fieldset {
            display: none
        }

        .pic0 {
            width: 400px;
            height: 500px;
            margin-left: 65px;
            margin-right: 0px;
            display: block
        }

        .product-pic {}

        .thumbnails {
            position: absolute
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

        .tb {
            width: 54px;
            height: 54px;
            border: 1px solid grey;
            margin: 2px;
            opacity: 0.4;
            cursor: pointer
        }

        .tb-active {
            opacity: 1
        }

        .thumbnail-img {
            width: 54px;
            height: 54px
        }

        @media screen and (max-width: 768px) {
            .pic0 {
                width: 250px;
                height: auto;
            }

            .thumbnail-img {
                width: 44px;
                height: 44px
            }

            .tb {
                width: 44px;
                height: 44px;
            }

            .product-detail {
                margin-top: 2rem;
            }
        }

    </style>
@endsection

@section('content')
    <div class="container mt-3 mb-5">
        <div class="row justify-content-between">
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="">
                    <div class="card" style="border: 0px;">
                        <div class="flex-column thumbnails">
                            <div id="f1" class="tb tb-active"> <img class="thumbnail-img fit-image"
                                    src="{{ asset('images/' . $img[0]) }}"> </div>
                            @for ($i = 1; $i <= count($img) - 1; $i++)
                                <div id="f{{ $i + 1 }}" class="tb"> <img class="thumbnail-img fit-image"
                                        src="{{ asset('images/' . $img[$i]) }}"> </div>
                            @endfor
                        </div>
                        <fieldset id="f11" class="active">
                            <div class="product-pic"> <img class="pic0 fit-image" src="{{ asset('images/' . $img[0]) }}">
                            </div>
                        </fieldset>
                        @for ($i = 1; $i <= count($img) - 1; $i++)
                            <fieldset id="f{{ $i + 1 }}1" class="">
                                <div class="product-pic"> <img class="pic0 fit-image"
                                        src="{{ asset('images/' . $img[$i]) }}">
                                </div>
                            </fieldset>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-5 col-sm-5 product-detail">
                <h4><strong>{{ $product->name }}</strong></h4>
                <h6>{{ $product->short_description }}</h6>
                <h5><strong>Rp {{ number_format("$product->price", 0, ',', '.') }}</strong></h5>
                <div class="form-group pt-3 pb-3">
                    <label for="quantity">Jumlah</label>
                    <div class="row">
                        <form action="{{ route('addToCart') }}" method="post" class="d-flex flex-row">
                            @csrf
                            <div class="col-4">
                                <input id="product_id" type="text" class="form-control" name="product_id"
                                    value="{{ $product->id }}" required hidden>
                                <input id="quantity" type="number" class="form-control" name="quantity" value="1" required
                                    autocomplete="quantity">
                            </div>
                            <div class="col-8"><button type="submit" class="btn btn-success"><i class="fas fa-plus"></i>
                                    Keranjang</button></div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="product-detail" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#description" role="tab" aria-controls="description"
                                    aria-selected="true">Deskripsi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#good_for" role="tab" aria-controls="good_for"
                                    aria-selected="false">Baik untuk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#how_to" role="tab" aria-controls="how_to"
                                    aria-selected="false">Penggunaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#ingredients" role="tab" aria-controls="ingredients"
                                    aria-selected="false">Komposisi</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content mt-3">
                            <div class="tab-pane active" id="description" role="tabpanel">
                                <p class="card-text text-justify">{{ $product->description }}</p>
                            </div>

                            <div class="tab-pane" id="good_for" role="tabpanel" aria-labelledby="good_for-tab">
                                <p class="card-text text-justify">{{ $product->good_for }}</p>
                            </div>

                            <div class="tab-pane" id="how_to" role="tabpanel" aria-labelledby="how_to-tab">
                                <p class="card-text text-justify">{{ $product->how_to }}</p>
                            </div>

                            <div class="tab-pane" id="ingredients" role="tabpanel" aria-labelledby="ingredients-tab">
                                <p class="card-text text-justify">{{ $product->ingredients }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <img class="rounded-circle"
                            src="https://ui-avatars.com/api/?name={{ $product->merchant->name }}&color=8BC34A&background=F0F4C3"
                            alt="{{ $product->merchant->name }}">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 align-items-center" style="margin-top: .2rem;">
                        <h4>{{ $product->merchant->name }}</h4>
                        <h6>{{ $product->merchant->address }}</h6>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $(".tb").hover(function() {

                $(".tb").removeClass("tb-active");
                $(this).addClass("tb-active");

                current_fs = $(".active");

                next_fs = $(this).attr('id');
                next_fs = "#" + next_fs + "1";

                $("fieldset").removeClass("active");
                $(next_fs).addClass("active");

                current_fs.animate({}, {
                    step: function() {
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'display': 'block'
                        });
                    }
                });
            });

        });

        $('#product-detail a').on('click', function(e) {
            e.preventDefault()
            $(this).tab('show')
        })

    </script>
@endsection
