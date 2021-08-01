@extends('transaksi.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Pembayaran</h2>
                </div>
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
            </div>
            <div class="col col-lg-8 col-md-8 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title" style="font-weight : bold;">Daftar Pesanan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            No
                                        </th>
                                        <th class="text-center">
                                            Nama Produk
                                        </th>
                                        <th class="text-center">
                                            Harga Per Hari
                                        </th>
                                        <th class="text-center">
                                            Jumlah Hari
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total =0; @endphp
                                    @foreach ($itemorder->cart->detail as $detail)
                                        @php $total+= $detail->harga*$detail->jumlahHari; @endphp
                                        <tr>
                                            <td class="text-center">
                                                {{ $no++ }}
                                            </td>
                                            <td class="text-center">
                                                {{ $detail->product->name }}
                                            </td>
                                            <td class="text-center">
                                                Rp. {{ number_format($detail->harga) }}
                                            </td>
                                            <td class="text-center">
                                                {{ $detail->jumlahHari }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="text-center">
                                            <b>Total : </b>
                                        </td>
                                        <td class="text-center">
                                            <b>
                                                Rp. {{ number_format($total) }}
                                            </b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn">
                            <a href="{{ route('transaksi.index') }}">Tutup</a>
                        </button>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="title" style="font-weight : bold;">Alamat Pengiriman</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <th>Alamat Penerima</th>
                                        <th>Nomor Telepon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $itemorder->nama_penerima }}
                                        </td>
                                        <td>
                                            {{ $itemorder->alamat }}<br />
                                            {{ $itemorder->kelurahan }}, {{ $itemorder->kecamatan }}<br />
                                            {{ $itemorder->kota }}, {{ $itemorder->provinsi }} -
                                            {{ $itemorder->kodepos }}
                                        </td>
                                        <td>
                                            {{ $itemorder->no_tlp }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="title" style="font-weight : bold;">Transfer</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <th><img src="{{ asset('images/bni.png') }}" class="bni-img"> Ivent Jaya Makmur</th>
                                    <th class="text-right">Rek. 17523135</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text">
                                            Total yang harus anda bayar kan sebesar
                                            Rp. {{ number_format($total) }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="title" style="font-weight : bold;">Ringkasan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>
                                            Total
                                        </td>
                                        <td class="text-right">
                                            Rp. {{ number_format($total, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td>
                                            Subtotal
                                        </td>
                                        <td class="text-right">
                                            Rp. {{ number_format($itemorder->cart->subtotal, 0, ',', '.') }}
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <td>
                                            Status Pembayaran
                                        </td>
                                        <td class="text-right">
                                            {{ $itemorder->cart->status_pembayaran }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Status Pengiriman
                                        </td>
                                        <td class="text-right">
                                            {{ $itemorder->cart->status_pengiriman }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="title" style="font-weight : bold;">Upload Bukti Pembayaran</h4>
                    </div>
                    <div class="card-body">
                        <div class="table">
                            <table class="table table-borderless">
                                <tbody>
                                    <form action="{{ route('transaksi.update', $itemorder->cart->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <label class="file">
                                                <input type="file" id="file" name="bukti_pembayaran"
                                                    aria-label="File browser example">
                                                <span class="file-custom"></span>
                                            </label>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn">Kirim</button>
                                        </div>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
