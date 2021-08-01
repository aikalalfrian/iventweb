@extends('alamatpengiriman.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-12 mb-2">
                <div class="card border-0">
                    <div class="card-header border-0">
                        <div class="row">
                            <div class="col">
                                <h4 class="title" style="font-weight : bold; color: #fff;">Alamat Pengiriman</h4>
                            </div>
                            <div class="col-auto">
                                <button class="btn pull-right">
                                    <a href="{{ URL::to('checkout') }}">
                                        Kembali Ke Checkout
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border-0">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <th>Alamat</th>
                                        <th>No tlp</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($itemalamatpengiriman as $pengiriman)
                                        <tr>
                                            <td>
                                                {{ $pengiriman->nama_penerima }}
                                            </td>
                                            <td>
                                                {{ $pengiriman->alamat }}<br />
                                                {{ $pengiriman->kelurahan }}, {{ $pengiriman->kecamatan }}<br />
                                                {{ $pengiriman->kota }}, {{ $pengiriman->provinsi }} -
                                                {{ $pengiriman->kodepos }}
                                            </td>
                                            <td>
                                                {{ $pengiriman->no_tlp }}
                                            </td>
                                            <td>
                                                <form action="{{ route('alamatpengiriman.update', $pengiriman->id) }}"
                                                    method="post">
                                                    @method('patch')
                                                    @csrf()
                                                    @if ($pengiriman->status == 'utama')
                                                        <button type="submit" class="btn pull-right" disabled>Alamat
                                                            Utama</button>
                                                    @else
                                                        <button type="submit" class="btn pull-right">Ubah Ke
                                                            Utama</button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-12">
                <div class="card border-0">
                    <div class="card-header border-0">
                        <h4 class="title" style="font-weight : bold; color: #fff;">
                            Form Alamat Pengiriman
                        </h4>
                    </div>
                    <div class="card-body border-0">
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
                        <form action="{{ route('alamatpengiriman.store') }}" method="post">
                            @csrf()
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama_penerima">Nama Penerima</label>
                                        <input type="text" name="nama_penerima" class="form-control"
                                            value={{ old('nama_penerima') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" name="alamat" class="form-control" value={{ old('alamat') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_tlp">No Tlp</label>
                                        <input type="text" name="no_tlp" class="form-control" value={{ old('no_tlp') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="provinsi">Provinsi</label>
                                        <input type="text" name="provinsi" class="form-control"
                                            value={{ old('provinsi') }}>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="kota">Kota</label>
                                        <input type="text" name="kota" class="form-control" value={{ old('kota') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="kecamatan">Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control"
                                            value={{ old('kecamatan') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelurahan">Kelurahan</label>
                                        <input type="text" name="kelurahan" class="form-control"
                                            value={{ old('kelurahan') }}>
                                    </div>
                                    <div class="form-group">
                                        <label for="kodepos">Kodepos</label>
                                        <input type="text" name="kodepos" class="form-control"
                                            value={{ old('kodepos') }}>
                                    </div>
                                    <div class="col-auto">
                                        <div class="form-group pull-right">
                                            <button type="submit" class="btn">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
