<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>Ivent</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/logo-ivent-2.png') }}" type="image/gif" />
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">

    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css_2/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css_2/magnific-popup.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css_2/font-awesome.css">
    <!-- Fancybox -->
    <link rel="stylesheet" href="css_2/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css_2/themify-icons.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="css_2/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="css_2/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css_2/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css_2/owl-carousel.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="css_2/slicknav.min.css">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="css_2/reset.css">
    <link rel="stylesheet" href="css_2/style.css">
    <link rel="stylesheet" href="css_2/responsive.css">



</head>

<body class="js">

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="loader"><img src="{{ asset('images/loader-ivent.gif') }}" alt="#" /></div>
        </div>
    </div>
    <!-- End Preloader -->

    {{-- SEMENTARA_TIDAK_DIPAKAI --}}

    <nav class="navbar navbar-expand-sm bg-light navbar-light bg-ivent">
        <div class="container ">
            <div class="row">
                <header class="header shop">
                    <div class="middle-inner bg-ivent">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-12">
                                    <!-- Logo -->
                                    <div class="logo">
                                        <a href="{{ route('home') }}"><img src="images/logo-ivent.png" alt="logo"></a>
                                    </div>
                                    <!--/ End Logo -->
                                </div>
                                <div class="col-lg-8 col-md-7 col-12">
                                    <div class="search-bar-top">
                                        <div class="search-bar">
                                            <select>
                                                <option selected="selected">Kategori</option>
                                                <option>Panggung</option>
                                                <option>Alat Musik</option>
                                                <option>Event Organizer</option>
                                                <option>Wedding Organizer</option>
                                            </select>
                                            <form action="/search/cari" method="GET">
                                                <input name="cari"
                                                    placeholder="Apa yang kamu perlukan untuk melengkapi acara mu?..."
                                                    value="{{ old('cari') }}">
                                                <button class="btnn"><img class="search-icon"
                                                        src="{{ asset('images/search-icon.ico') }}"
                                                        type="submit"></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-3 col-12">
                                    <div class="right-bar">
                                        <!-- Search Form -->
                                        <div class="sinlge-bar shopping">
                                            <a href="#"><img class="single-icon"
                                                    src="{{ asset('images/account.png') }}" alt="#"></a>
                                            <!-- Shopping Item -->
                                            <div class="shopping-item">
                                                <div class="dropdown-cart-header">
                                                    <ul class="shopping-list">
                                                        <li>
                                                            <a href="#">{{ Auth::user()->name }}</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="bottom">
                                                    <a href="{{ route('cart') }}" class="btn animate">Pesanan</a>
                                                </div>
                                            </div>
                                            <!--/ End Shopping Item -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

            </div>
        </div>
    </nav>
    {{-- end navbar --}}

    <div class="col-xl-3 col-lg-4 col-md-4 col-12">

        <div class="single-product">
            <div class="product-img">
                <a href="{{ route('detailProduct') }}">
                    <img class="default-img" src="{{ $product->image }}" alt="image">
                </a>
                <div class="button-head">
                    <div class="product-action-2">
                        <a title="Lihat Produk" href="{{ route('detailProduct') }}">Lihat
                            Produk</a>
                    </div>
                </div>
            </div>
            <div class="product-content">
                <h3><a href="{{ route('detailProduct') }}">{{ $product->name }}</a>
                </h3>
                <div class="product-price">
                    <span>Rp. {{ $product->harga }}</span>
                </div>
                <h6><a href="{{ route('detailProduct') }}">{{ $product->lokasi }}</a>
                </h6>
            </div>
        </div>
    </div>


    {{-- footer --}}
    <div id="footer" class="Address layout_padding">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <img class="footer-brand" src="{{ asset('images/logo-ivent.png') }}" alt="#">
                        <p class="alamat">Candirejo, Sardonoharjo,
                            Kec. Ngaglik, Kabupaten Sleman,
                            Daerah Istimewa Yogyakarta 55581</p>
                    </div>
                </div>
                <div class="col">
                    <p class="info-footer">Tentang Ivent</p>
                    <p class="info-footer">FAQ</p>
                    <p class="info-footer">Syarat & Ketentuan</p>
                </div>
                <div class="col">
                    <p class="info-footer">Daftar Akun</p>
                    <p class="info-footer">Buka Toko</p>
                </div>
                <div class="col">
                    <p class="info-footer">Instagram</p>
                    <p class="info-footer">Facebook</p>
                </div>
            </div>
        </div>
    </div>
    {{-- footer --}}

    <!-- Jquery -->
    <script src="js_2/jquery.min.js"></script>
    <script src="js_2/jquery-migrate-3.0.0.js"></script>
    <script src="js_2/jquery-ui.min.js"></script>
    <!-- Popper JS -->
    <script src="js_2/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="js_2/bootstrap.min.js"></script>
    <!-- Color JS -->
    <script src="js_2/colors.js"></script>
    <!-- Slicknav JS -->
    <script src="js_2/slicknav.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="js_2/owl-carousel.js"></script>
    <!-- Magnific Popup JS -->
    <script src="js_2/magnific-popup.js"></script>
    <!-- Fancybox JS -->
    <script src="js_2/facnybox.min.js"></script>
    <!-- Waypoints JS -->
    <script src="js_2/waypoints.min.js"></script>
    <!-- Countdown JS -->
    <script src="js_2/finalcountdown.min.js"></script>
    <!-- Nice Select JS -->
    <script src="js_2/nicesellect.js"></script>
    <!-- Ytplayer JS -->
    <script src="js_2/ytplayer.min.js"></script>
    <!-- Flex Slider JS -->
    <script src="js_2/flex-slider.js"></script>
    <!-- ScrollUp JS -->
    {{-- <script src="js_2/scrollup.js"></script> --}}
    <!-- Onepage Nav JS -->
    <script src="js_2/onepage-nav.min.js"></script>
    <!-- Easing JS -->
    <script src="js_2/easing.js"></script>
    <!-- Active JS -->
    <script src="js_2/active.js"></script>
</body>

</html>
