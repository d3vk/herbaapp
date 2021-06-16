@extends('layouts.shop')

@section('title', $product->name)

@section('content')
    <div class="container mt-3 mb-5">
        <div class="row">
            <div class="col-4">
                <div class="ecommerce-gallery" data-mdb-zoom-effect="true" data-mdb-auto-height="true">
                    <div class="row py-3 shadow-5">
                        <div class="col-12 mb-1">
                            <div class="lightbox">
                                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                                    alt="Gallery image 1" class="ecommerce-gallery-main-img active w-100" />
                            </div>
                        </div>
                        <div class="col-3 mt-1">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                                data-mdb-img="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14a.jpg"
                                alt="Gallery image 1" class="active w-100" />
                        </div>
                        <div class="col-3 mt-1">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg"
                                data-mdb-img="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12a.jpg"
                                alt="Gallery image 2" class="w-100" />
                        </div>
                        <div class="col-3 mt-1">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
                                data-mdb-img="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13a.jpg"
                                alt="Gallery image 3" class="w-100" />
                        </div>
                        <div class="col-3 mt-1">
                            <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                                data-mdb-img="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15a.jpg"
                                alt="Gallery image 4" class="w-100" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
