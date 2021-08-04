<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
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
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<!-- body -->

<body class="main-layout">
    <div class="row">
        <div id="header-atas" class="col-6 kiri" style="background-color: #A2D5F2">
            {{-- kiri --}}
            <div class="logo"> <a href=""><img src="{{ asset('images/logo-ivent.png') }}" alt="#"></a>
            </div>

            <img src="{{ asset('images/register-1.png') }}" alt="#" class="tengah">

        </div>

        <div class="col-6 kanan">
            {{-- kanan --}}
            <div class="welcome-text">
                <h1 class="title" style="font-weight: bold;">Selamat Datang!</h1>
                <h3 class="title" style="margin-bottom: 20px;">Silahkan daftarkan akun anda untuk bergabung bersama kami
                </h3>
            </div>

            <div class="card-register">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-login row">
                            <label for="name"
                                class="col-md-6 col-form-label text-md-top">{{ __('Nama Lengkap') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="Masukkan Nama Lengkapmu...">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-login row">
                            <label for="email"
                                class="col-md-6 col-form-label text-md-top">{{ __('Alamat Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Masukkan Alamat Emailmu...">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-login row">
                            <label for="password"
                                class="col-md-6 col-form-label text-md-top">{{ __('Kata Sandi') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password" placeholder="Masukkan Kata Sandimu...">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-login row">
                            <label for="password-confirm"
                                class="col-md-6 col-form-label text-md-top">{{ __('Konfirmasi Kata Sandi') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password"
                                    placeholder="Konfirmasi Kata Sandimu...">
                            </div>
                        </div>

                        <div class="form-btn-register row">

                            <button type="submit" class="btn btn-register">
                                {{ __('Register') }}
                            </button>
                        </div>

                        <div class="form-link-register">
                            <a class="btn btn-link" href="{{ route('login') }}">
                                Punya akun? Login sekarang
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end Contact Us-->
    <!-- footer start-->
    <div id="plant" class="footer layout_padding">
        <div class="container">
            <p>
                <a class="text-center" href=""> Privasi</a>
                <a class="text-center" href=""> Syarat & Ketentuan</a>
                <a class="text-center" href=""> FAQ</a>
            </p>
        </div>
    </div>

    <!-- Javascript files-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/plugin.js') }}"></script>
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

</html>
