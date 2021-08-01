<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Ivent</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href="{{ asset('images/logo-ivent-2.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="{{ asset('images/loader-ivent.gif') }}" alt="#" /></div>
    </div>

    {{-- navbar --}}
    <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top bg-ivent">
        <div class="container">
            <div class="row">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('images/logo-ivent.png') }}"
                        alt="#"></a>

                <div class="col md-5">
                    <div class="menu-area">
                        <div class="limit-box">
                            <nav class="main-menu">
                                <ul class="menu-area-main">
                                    <li> <a class="nav-link" href="{{ route('search') }}">Sewa</a> </li>
                                    <li><a class="nav-link" href="{{ route('products.index') }}">Buka Toko</a></li>
                                    <li><a class="nav-link" href="{{ route('cart.index') }}">Pesanan</a></li>


                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">Masuk</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">Daftar</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Keluar
                                                </a>

                                                {{-- <a class="dropdown-item" href="{{ route('products.index') }}">
                                                    Buka Toko
                                                </a> --}}
                                                <a class="dropdown-item" href="/account">
                                                    Akun
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    {{-- end navbar --}}

    {{-- carousel --}}
    <section>
        <div id="main_slider" class="section carousel slide banner-main" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#main_slider" data-slide-to="0" class="active"></li>
                <li data-target="#main_slider" data-slide-to="1"></li>
                <li data-target="#main_slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/carousel-1.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/carousel-2.png') }}" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </section>
    {{-- carousel --}}

    {{-- search bar --}}
    <form class="search-box" action="/search/cari" method="GET">
        <input name="cari" id="searchbox" placeholder="" value="{{ old('cari') }}">
        <div class="search-icon">
            <button class="button-search">
                <img src="{{ asset('images/search-icon.ico') }}" type="submit">
            </button>
        </div>
    </form>

    {{-- search bar --}}


    {{-- category --}}
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card-cat">
                    <img src="{{ asset('images/Eo.png') }}" class="card-img" alt="img">
                    <a class="card-text" href="{{ route('search') }}">Event<br />Organizer</a>
                </div>
            </div>
            <div class="col">
                <div class="card-cat">
                    <img src="{{ asset('images/Vendor.png') }}" class="card-img" alt="img">
                    <a class="card-text" href="{{ route('search') }}">Vendor<br />Acara</a>
                </div>
            </div>
        </div>
    </div>
    {{-- category --}}


    {{-- product acara --}}
    <div class="container-x">
        <h1 class="text-x">Maksimalkan Acara Anda Dengan Produk Berikut</h1>
        <div class="scrolling-wrapper" id="data">
            @foreach ($products->shuffle() as $product)
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
                            <span>Rp. {{ number_format($product->harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
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

    <!-- Javascript files-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/plugin.js') }}"></script>
    <!-- Owl Carousel JS -->
    <script src="js_2/owl-carousel.js"></script>
    <!-- sidebar -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- javascript -->
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>
<script>
    window.onload = function() {
        $('.scrolling-wrapper').slick({
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-next"></button>',
            centerMode: true,
            slidesToShow: 3,
            slidesToScroll: 2
        });
    };
</script>

<script>
    const texts = ['Apa yang kamu perlukan untuk melengkapi acara mu?', 'Cari Vendor?', 'Cari Event Organizer?',
        'Semua Ada Disini Kok :D'
    ];
    const input = document.querySelector('#searchbox');
    const animationWorker = function(input, texts) {
        this.input = input;
        this.defaultPlaceholder = this.input.getAttribute('placeholder');
        this.texts = texts;
        this.curTextNum = 0;
        this.curPlaceholder = '';
        this.blinkCounter = 0;
        this.animationFrameId = 0;
        this.animationActive = false;
        this.input.setAttribute('placeholder', this.curPlaceholder);

        this.switch = (timeout) => {
            this.input.classList.add('imitatefocus');
            setTimeout(
                () => {
                    this.input.classList.remove('imitatefocus');
                    if (this.curTextNum == 0)
                        this.input.setAttribute('placeholder', this.defaultPlaceholder);
                    else
                        this.input.setAttribute('placeholder', this.curPlaceholder);

                    setTimeout(
                        () => {
                            this.input.setAttribute('placeholder', this.curPlaceholder);
                            if (this.animationActive)
                                this.animationFrameId = window.requestAnimationFrame(this.animate)
                        },
                        timeout);
                },
                timeout);
        }

        this.animate = () => {
            if (!this.animationActive) return;
            let curPlaceholderFullText = this.texts[this.curTextNum];
            let timeout = 500;
            if (this.curPlaceholder == curPlaceholderFullText + '|' && this.blinkCounter == 5) {
                this.blinkCounter = 0;
                this.curTextNum = (this.curTextNum >= this.texts.length - 1) ? 0 : this.curTextNum + 1;
                this.curPlaceholder = '|';
                this.switch(1000);
                return;
            } else if (this.curPlaceholder == curPlaceholderFullText + '|' && this.blinkCounter < 5) {
                this.curPlaceholder = curPlaceholderFullText;
                this.blinkCounter++;
            } else if (this.curPlaceholder == curPlaceholderFullText && this.blinkCounter < 5) {
                this.curPlaceholder = this.curPlaceholder + '|';
            } else {
                this.curPlaceholder = curPlaceholderFullText
                    .split('')
                    .slice(0, this.curPlaceholder.length + 1)
                    .join('') + '|';
                timeout = 150;
            }
            this.input.setAttribute('placeholder', this.curPlaceholder);
            setTimeout(
                () => {
                    if (this.animationActive) this.animationFrameId = window.requestAnimationFrame(this
                        .animate)
                },
                timeout);
        }

        this.stop = () => {
            this.animationActive = false;
            window.cancelAnimationFrame(this.animationFrameId);
        }

        this.start = () => {
            this.animationActive = true;
            this.animationFrameId = window.requestAnimationFrame(this.animate);
            return this;
        }
    }

    document.addEventListener("DOMContentLoaded", () => {
        let aw = new animationWorker(input, texts).start();
        input.addEventListener("focus", (e) => aw.stop());
        input.addEventListener("blur", (e) => {
            aw = new animationWorker(input, texts);
            if (e.target.value == '') setTimeout(aw.start, 500);
        });
    });
</script>

</html>
