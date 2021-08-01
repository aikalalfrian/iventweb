@extends('transaksi.layout')

@section('content')
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Status Transaksi Anda</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-12">
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
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>NO</th>
                                <th>TOTAL</th>
                                <th></th>
                                <th>STATUS PEMBAYARAN</th>
                                <th></th>
                                <th>STATUS PENGIRIMAN</th>
                                <th>LIHAT DETAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($itemorder as $order)
                                @php $total = 0; @endphp
                                @foreach ($order->cart->detail as $detail)
                                    @php $total+= $detail->harga*$detail->jumlahHari; @endphp
                                @endforeach
                                <tr>
                                    <td>
                                        {{ ++$no }}
                                    </td>
                                    <td class="price" data-title="Price">Rp.
                                        {{ number_format($total, 0, ',', '.') }}
                                    </td>
                                    @if ($order->cart->status_pembayaran == 'belum' && $order->bukti_pembayaran == null)
                                        <td>
                                        <td class="price" data-title="Price">
                                            Belum dibayar
                                        </td>
                                        </td>
                                    @elseif($order->cart->status_pembayaran == 'belum' && $order->bukti_pembayaran !=
                                        null)
                                        <td>
                                        <td class="price" data-title="Price">
                                            Menunggu Verifikasi
                                        </td>
                                        </td>
                                    @else
                                        <td>
                                        <td class="price" data-title="Price">
                                            Sudah dibayar
                                        </td>
                                        </td>
                                    @endif
                                    <td>

                                    <td class="price" data-title="Price">
                                        {{ $order->cart->status_pengiriman }}
                                    </td>

                                    <td>
                                        <div class="button5">
                                            <button class="btn">
                                                <a href="{{ route('transaksi.show', $order->id) }}">
                                                    Detail
                                                </a>
                                            </button>
                                            @if ($itemuser->role == 'admin')
                                                <a href="{{ route('transaksi.edit', $order->id) }}"
                                                    class="btn btn-sm btn-primary mb-2">
                                                    Edit
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
        </div>
    </div>
@endsection
