@extends('cart.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Checkout</h2>
                </div>
            </div>
            <div class="col col-8">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-warning">{{ $error }}</div>
                    @endforeach
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-warning">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="row mb-2">
                    <div class="col col-12 mb-2">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="title" style="font-weight : bold;">Produk Pesanan Anda</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Produk</th>
                                            <th class="text-center">Harga Per Hari</th>
                                            <th class="text-center">Jumlah Hari</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $total =0; @endphp
                                        @foreach ($itemcart->detail as $detail)
                                            @php $total+= $detail->harga*$detail->jumlahHari; @endphp

                                            <tr>
                                                <td class="text-center">
                                                    {{ $no++ }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $detail->product->name }}
                                                </td>
                                                <td class="text-center">
                                                    Rp. {{ number_format($detail->harga, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $detail->jumlahHari }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="title" style="font-weight : bold;">Alamat Pengiriman</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nama Penerima</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">No tlp</th>
                                                <th class="text-center">Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($itemalamatpengiriman)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $itemalamatpengiriman->nama_penerima }}
                                                    </td>
                                                    <td>
                                                        {{ $itemalamatpengiriman->alamat }}<br />
                                                        {{ $itemalamatpengiriman->kelurahan }},
                                                        {{ $itemalamatpengiriman->kecamatan }}<br />
                                                        {{ $itemalamatpengiriman->kota }},
                                                        {{ $itemalamatpengiriman->provinsi }} -
                                                        {{ $itemalamatpengiriman->kodepos }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $itemalamatpengiriman->no_tlp }}
                                                    </td>
                                                    <td>
                                                        <button class="btn pull-right">
                                                            <a href="{{ route('alamatpengiriman.index') }}">
                                                                Edit Alamat
                                                            </a>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button class="btn pull-left">
                                        <a href="{{ route('alamatpengiriman.index') }}">
                                            Tambah Alamat
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title" style="font-weight : bold;">Ringkasan</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            {{-- <tr>
                                <td>No Invoice</td>
                                <td class="text-right">
                                    {{ $itemcart->no_invoice }}
                                </td>
                            </tr> --}}
                            {{-- <tr>
                                <td>Subtotal</td>
                                <td class="text-right">
                                    Rp. {{ number_format($itemcart->subtotal, 0, ',', '.') }}
                                </td>
                            </tr> --}}
                            <tr>
                                <td>Total Biaya</td>

                                <td class="text-right">
                                    Rp. {{ number_format($total, 0, ',', '.') }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('transaksi.store') }}" method="post">
                            @csrf()
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn">Buat Pesanan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
