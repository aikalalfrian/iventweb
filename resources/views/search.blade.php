@extends('layouts.ivent')

@section('content')
    <!-- Start Product Area -->
    <div class="product-area section">
        <div class="container">
            @if (is_null($cari))
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Produk Pendukung Acaramu</h2>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="tab-content" id="myTabContent">
                            <!-- Start Single Tab -->
                            <div class="tab-pane fade show active" id="man" role="tabpanel">
                                <div class="tab-single">
                                    <div class="row">

                                        @foreach ($products->shuffle() as $product)
                                            <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                <div class="single-product">
                                                    <div class="product-img">
                                                        <a href="{{ route('products.show', $product->id) }}">
                                                            <img class="default-img"
                                                                src="{{ $product->images()->first() ? asset($product->images()->first()->image) : asset('images/account-blank.jpg') }}"
                                                                alt="image">
                                                        </a>
                                                        <div class="button-head">
                                                            <div class="product-action-2">
                                                                <a title="Lihat Produk"
                                                                    href="{{ route('products.show', $product->id) }}">Lihat
                                                                    Produk</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3><a
                                                                href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                                        </h3>
                                                        <div class="product-price">
                                                            <span>Rp.
                                                                {{ number_format($product->harga, 0, ',', '.') }}</span>
                                                        </div>
                                                        <h6><a
                                                                href="{{ route('products.show', $product->id) }}">{{ $product->lokasi }}</a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        {!! $products->links() !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Area -->

    <!-- Start Most Popular -->
    @if (is_null($cari))
        <div class="product-area most-popular section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Pilihan Vendor Keperluan Acara</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel popular-slider">
                            <!-- Start Single Product -->
                            @foreach ($productVendor->shuffle() as $product)
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('products.show', $product->id) }}">
                                            <img class="default-img"
                                                src="{{ $product->images()->first() ? asset($product->images()->first()->image) : asset('images/account-blank.jpg') }}"
                                                alt="image">
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action-2">
                                                <a title="Lihat Produk"
                                                    href="{{ route('products.show', $product->id) }}">Lihat
                                                    Produk</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a
                                                href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="product-price">
                                            <span>Rp. {{ number_format($product->harga, 0, ',', '.') }}</span>
                                        </div>
                                        <h6><a
                                                href="{{ route('products.show', $product->id) }}">{{ $product->lokasi }}</a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach

                            <!-- End Single Product -->

                            <!-- End Single Product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Start Most Popular -->
    @if (is_null($cari))
        <div class="product-area most-popular section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Pilihan Event Organizer</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel popular-slider">
                            <!-- Start Single Product -->

                            @foreach ($productEo->shuffle() as $product)

                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('products.show', $product->id) }}">
                                            <img class="default-img"
                                                src="{{ $product->images()->first() ? asset($product->images()->first()->image) : asset('images/account-blank.jpg') }}"
                                                alt="image">
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action-2">
                                                <a title="Lihat Produk"
                                                    href="{{ route('products.show', $product->id) }}">Lihat
                                                    Produk</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a
                                                href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="product-price">
                                            <span>Rp. {{ number_format($product->harga, 0, ',', '.') }}</span>
                                        </div>
                                        <h6><a
                                                href="{{ route('products.show', $product->id) }}">{{ $product->lokasi }}</a>
                                        </h6>
                                    </div>
                                </div>
                            @endforeach

                            <!-- End Single Product -->

                            <!-- End Single Product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
