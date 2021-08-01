@extends('cart.layout')

@section('content')
    <div class="shopping-cart section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Pesanan Anda</h2>
                    </div>
                </div>
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
                                <th class="text-left">PRODUK</th>
                                <th class="text-center">HARGA PER HARI</th>
                                <th class=""></th>
                                <th class="text-center">JUMLAH HARI</th>
                                <th class=""></th>
                                <th class="text-center">TINDAKAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total =0; @endphp
                            @foreach ($itemcart->detail as $detail)
                                @php $total+= $detail->harga*$detail->jumlahHari; @endphp
                                <tr>
                                    {{-- <td class="image" data-title="No">
                                        <a href="{{ route('products.show', $detail->product->id) }}"><img
                                                src="{{ asset($detail->product->image) }}" alt="image"></a>
                                    </td> --}}
                                    <td class="product-des" data-title="Description">
                                        <p class="text-left"><a href="#">{{ $detail->product->name }}</a></p>
                                        <p class="text-left"> Penjual : {{ $detail->product->user->name }}</p>
                                        <p class="text-left" style="color: #FFEBB7;">Maboriosam in a tonto nesciung eget
                                            distingy magndapibus.</p>

                                    </td>
                                    {{-- <td class="qty" data-title="Qty">
                                        <div class="input-group">
                                            <input type="text" name="quant[3]" class="input-number" data-min="1"
                                                data-max="100" value="3">
                                        </div>
                                    </td> --}}
                                    <td class="text-center" data-title="Price"><span>Rp.
                                            {{ number_format($detail->harga, 0, ',', '.') }}</span>
                                    </td>
                                    <td class=""></td>
                                    <td class="text-center" data-title="Price"><span>
                                            {{ $detail->jumlahHari }}</span>
                                    </td>
                                    <td class=""></td>
                                    <td>
                                        <div class="text-center">
                                            <form action="{{ route('cartdetail.destroy', $detail->id) }}" method="post"
                                                style="display:inline;">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn3">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
            <div class="row" style="margin-top: 50px;">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row ">
                            <div class="col-lg-8 col-md-5 col-12">
                                <div class="left">

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-7 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Biaya Sewa Per Hari<span>
                                                Rp. {{ number_format($itemcart->subtotal, 0, ',', '.') }}</span></li>
                                        <li class="last">Total + Jumlah Hari<span>Rp.
                                                {{ number_format($total, 0, ',', '.') }}</span>
                                        </li>
                                    </ul>
                                    <div class="row">
                                        <div class="button5">
                                            <button class="btn">
                                                <a href="{{ URL::to('checkout') }}">
                                                    Checkout</a>
                                            </button>

                                            <form action="{{ url('kosongkan') . '/' . $itemcart->id }}" method="post">
                                                @method('patch')
                                                @csrf()
                                                <button type="submit" class="btn">Kosongkan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
@endsection
