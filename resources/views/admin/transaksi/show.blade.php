@extends('admin.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-8 col-md-8 mb-2">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Item</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>
                                            Nama Produk
                                        </th>
                                        <th>
                                            Penjual
                                        </th>

                                        <th>
                                            Harga Satuan
                                        </th>
                                        {{-- <th>
                                            Subtotal
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total =0; @endphp
                                    @foreach ($itemorder->cart->detail as $detail)
                                        @php $total+= $detail->harga*$detail->jumlahHari; @endphp
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $detail->product->name }}
                                            </td>
                                            <td>
                                                {{ $detail->product->user->name }}
                                            </td>

                                            <td>
                                                {{ number_format($detail->harga, 0, ',', '.') }}
                                            </td>
                                            {{-- <td>
                                                {{ number_format($detail->subtotal, 0, ',', '.') }}
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">
                                            <b>Total</b>
                                        </td>
                                        <td class="text-left">
                                            <b>
                                                {{ number_format($total, 0, ',', '.') }}
                                            </b>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.transaksi.index') }}" class="btn btn-sm btn-danger">Kembali</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Alamat Pengiriman</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <th>Alamat</th>
                                        <th>No tlp</th>
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
            </div>
            <div class="col col-lg-4 col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ringkasan</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>
                                            Total
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($total, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td>
                                            Subtotal
                                        </td>
                                        <td class="text-right">
                                            {{ number_format($itemorder->cart->subtotal, 0, ',', '.') }}
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

                @if ($itemorder->bukti_pembayaran && $itemorder->cart->status_pembayaran == 'belum')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Verifikasi Pembayaran</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <form action="{{ route('admin.transaksi.update', $itemorder->cart->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input hidden type="text" name="status_pembayaran" value="sudah dibayar">
                                            <button class="btn btn-md btn-primary" type="submit">Verifikasi
                                                Pembayaran</button>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($itemorder->bukti_pembayaran && $itemorder->cart->status_pembayaran == 'sudah dibayar' && $itemorder->cart->status_pengiriman == 'belum')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Kirim Produk</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <form action="{{ route('admin.transaksi.update', $itemorder->cart->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input hidden type="text" name="status_pengiriman" value="sedang dikirim">
                                            <button class="btn btn-md btn-primary" type="submit">Kirim</button>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                @if ($itemorder->bukti_pembayaran && $itemorder->cart->status_pembayaran == 'sudah dibayar' && $itemorder->cart->status_pengiriman == 'sedang dikirim')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Produk Sampai</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <form action="{{ route('admin.transaksi.update', $itemorder->cart->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input hidden type="text" name="status_pengiriman" value="terkirim">
                                            <button class="btn btn-md btn-primary" type="submit">Sampai</button>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bukti Pembayaran</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <a>
                                        <img class="default-img"
                                            src="{{ asset('public/image/' . $itemorder->bukti_pembayaran) }}"
                                            alt="image">
                                    </a>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
