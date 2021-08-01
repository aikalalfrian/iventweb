@extends('products.layout')

@section('content')
    {{-- account page --}}
    <form method="post">
        <div class="container-crud">
            <div class="row">
                {{-- <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{ asset('images/account-blank.jpg') }}" alt="" />
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file" />
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                            {{ Auth::user()->name }}
                        </h5>
                        <a href="{{ route('products.index') }}">
                            Toko Anda
                        </a>
                        {{-- <p class="proile-rating">RANKINGS : <span>8/10</span></p> --}}
                        {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">About</a>
                            </li>
                        </ul> --}}
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Pemilik Toko</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-md-6">
                                        <label>No. telepon</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>123 456 7890</p>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    {{-- account page --}}

@endsection
