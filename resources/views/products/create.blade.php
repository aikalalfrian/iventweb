@extends('products.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="pull-left">
                <h2>Tambahkan Produk Baru</h2>
            </div> --}}

            <div class="section-title">
                <h2>Tambahkan Produk Baru</h2>
            </div>
            <div class="pull-right">
                <button class="btn">
                    <a href="{{ route('products.index') }}"> Kembali</a>
                </button>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Upsss!</strong> Ada kesalahn pada kolom yang ada masukan.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Produk</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name Produk">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail</strong>
                    <textarea class="form-control" style="height:150px" name="detail"
                        placeholder="Detail Produk"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Gambar</strong>
                    <input type="file" name="image[]" class="form-control" id="image" placeholder="Gambar Produk" required
                        accept="image/x-png, image/jpeg" multiple>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga</strong>
                    <input type="number" name="harga" class="form-control" placeholder="Harga Produk">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Kategori</strong>
                <div class="form-group">
                    <select name="kategori" id="kategori" class="form-control">
                        @foreach (config('category.category') as $category)
                            <option value="{{ $category }}">{{ $category }}</option>
                        @endforeach


                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stok Produk</strong>
                    <input type="number" name="stok_produk" class="form-control" placeholder="Jumlah Stok">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lokasi</strong>
                    <div class="form-group">
                        <select name="lokasi" id="lokasi" class="form-control">
                            <option value="Kota Yogyakarta">Kota Yogyakarta</option>
                            <option value="Bantul">Bantul</option>
                            <option value="Sleman">Sleman</option>
                            <option value="Gunung Kidul">Gunung Kidul</option>
                            <option value="Kulon Progo">Kulon Progo</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn">Submit</button>
            </div>
        </div>

    </form>
@endsection
