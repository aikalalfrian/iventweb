@extends('products.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Lihat Produk</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-12">
                <div class="blog-single-main">
                    <div class="row">
                        <div class="col-12">
                            <div class="image">
                                <img class="default-detail"
                                    src="{{ $product->images()->first() ? asset($product->images()->first()->image) : asset('images/account-blank.jpg') }}"
                                    alt="image" id="Myimg">
                            </div>
                            <div class="blog-detail">
                                <div class="main-sidebar">
                                    <div class="single-widget category">
                                        <h2 class="blog-title">{{ $product->name }}</h2>
                                        <h2 class="title">Keterangan Produk</h2>
                                        <div class="content">
                                            <p>{{ $product->detail }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12">
                <div class="main-sidebar">
                    <!-- Single Widget -->
                    <div class="single-widget category">
                        <h3 class="title">Detail Produk</h3>
                        <ul class="categor-list">
                            <li>
                                <h6>Kategori</h6> <span>{{ $product->kategori }}</span>
                            </li>
                            <li>
                                <h6>Lokasi</h6> <span>{{ $product->lokasi }}</span>
                            </li>
                            <li>
                                <h6>Stok Produk</h6> <span>{{ $product->stok_produk }}</span>
                            </li>
                            <li>
                                <h6>Penjual</h6> <span>{{ $product->user->name }}</span>
                            </li>
                            <li>
                                <h6>Harga</h6> <span>Rp. {{ number_format($product->harga, 0, ',', '.') }}</span>
                            </li>
                            <li>
                                <a href="https://wa.me/6282265157751" target="_blank" class="wa-logo"><img
                                        src="{{ asset('images/wa.png') }}" alt="logo">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!--/ End Single Widget -->
                    <!-- Single Widget -->
                    <form action="{{ route('cartdetail.store') }}" method="POST">
                        @csrf
                        <div class="single-widget recent-post">
                            <div class="bootstrap-iso">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <!-- Form code begins -->
                                            <form method="post">
                                                <div class="form-group">
                                                    <!-- Date input -->
                                                    <label class="control-label" for="date"
                                                        style="font-weight : bold;">Tanggal Mulai</label>
                                                    <input class="form-control" id="date-mulai" name="date_mulai"
                                                        placeholder="MM/DD/YYY" type="date" required />
                                                </div>
                                                <div class="form-group">
                                                    <!-- Date input -->
                                                    <label class="control-label" for="date"
                                                        style="font-weight : bold;">Tanggal Selesai</label>
                                                    <input class="form-control" id="date-selesai" name="date_selesai"
                                                        placeholder="MM/DD/YYY" type="date" required />
                                                </div>
                                            </form>
                                            <!-- Form code ends -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right">
                                <div class="row">
                                    <div class="button5" style="margin: 20px 20px;">
                                        <input type="hidden" name="id_product" value={{ $product->id }}>
                                        <button class="btn" type="submit">
                                            <a>Tambah Pesanan</a>
                                        </button>

                                        <button class="btn" type="button">
                                            <a href="{{ route('search') }}"> Lihat Produk Lain</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                    </form>
                    <!-- End Single Post -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Mymodal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="section-title">
                                    <h2 style="margin-top: 50px;">Detail Gambar Produk</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="image">
                                    @foreach ($product->images as $img)
                                        <img class="default-modal" src="{{ asset($img->image) }}" alt="image">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default-modal" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    </div>



@endsection
