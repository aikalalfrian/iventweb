@extends('products.layoutset')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            {{-- <div class="pull-left">
                <h2>Buka Toko</h2>
            </div> --}}

            <div class="section-title">
                <h2>Produk Anda</h2>
            </div>

            <div class="pull-right">
                <button class="btn">
                    <a href="{{ route('products.create') }}"> Tambahkan Produk </a>
                </button>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @foreach ($products as $product)
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
                            <a title="Lihat Produk" href="{{ route('products.show', $product->id) }}">Lihat
                                Produk</a>
                        </div>
                    </div>
                </div>
                <div class="product-content">
                    <h3><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                    </h3>
                    <div class="product-price">
                        <span>Rp.
                            {{ number_format($product->harga, 0, ',', '.') }}</span>
                    </div>
                    <h6><a href="{{ route('products.show', $product->id) }}">{{ $product->lokasi }}</a>
                    </h6>

                </div>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    <button class="btn2">
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                    </button>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn2">Hapus</button>
                </form>

            </div>
        </div>
    @endforeach

    {!! $products->links() !!}

@endsection
