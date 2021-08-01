@extends('products.layoutset')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2>Data Transaksi</h2>
                </div>
                <div class="card">
                    {{-- <div class="card-header">
                        <h3 class="card-title">
                            Data Transaksi
                        </h3>
                    </div> --}}
                    <div class="card-body">
                        <!-- digunakan untuk menampilkan pesan error atau sukses -->
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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pembeli</th>
                                        <th>Harga Satuan</th>
                                        <th>Total</th>
                                        <th>Status Pembayaran</th>
                                        <th>Status Pengiriman</th>
                                        <th>Bukti Pembayaran</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($transaksi as $trs)
                                        @php $total = 0; @endphp
                                        @foreach ($trs->detail as $detail)
                                            @php $total+= $detail->harga*$detail->jumlahHari; @endphp
                                        @endforeach
                                        {{-- {{ dd($trs->order) }} --}}
                                        <tr>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $trs->order->nama_penerima }}
                                            </td>
                                            <td>
                                                {{ number_format($trs->subtotal, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                {{ number_format($total, 0, ',', '.') }}
                                            </td>
                                            <td>
                                                {{ $trs->status_pembayaran }}
                                            </td>
                                            <td>
                                                {{ $trs->status_pengiriman }}
                                            </td>
                                            <td>
                                                {{ $trs->order->bukti_pembayaran ? 'Sudah upload' : 'Belum upload' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
