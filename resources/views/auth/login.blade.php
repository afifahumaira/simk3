<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>Login SIM K3 FT</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('foto_all/undip.png') }}" rel="icon" />
    <link href="{{ asset('Arsha/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <link href="{{ asset('vendor/Arsha/assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/Arsha/assets/vendor/bootstrap/css/bootstrap.min.css') }} " rel="stylesheet" />
    <link href="{{ asset('vendor/Arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/Arsha/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/Arsha/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/Arsha/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet" />
    <link href="{{ asset('vendor/Arsha/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/styleshadow.css') }}" rel="stylesheet" />
</head>

</html>

<body>

    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-5 d-none d-md-flex bg-image"></div>


            <!-- The content half -->
            <div class="col-md-7 bg-light">
                <div class="login d-flex align-items-center py-5">
                    <!-- Demo content-->
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-10 col-xl-7 mx-auto ">
                                <div class="d-flex justify-content-center">
                                    <h3 class="display-4  mb-5 pb-5">SIM K3 TEKNIK UNDIP</h3>
                                </div>
                                <div class="">
                                    <h3 class="display-4 fs-3">MASUK</h3>
                                    <p class="text-muted mb-4">Masuk untuk mengakses halaman website ini.</p>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input id="inputEmail" type="email" name="email" :value="old('email')"
                                            required autofocus placeholder="Email address" required="" autofocus=""
                                            class="form-control border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="password" type="password" name="password" required
                                            autocomplete="current-password" placeholder="Password" required=""
                                            class="form-control border-0 shadow-sm px-4 text-primary">
                                    </div>

                                    <div class="text-center d-flex justify-content-end mt-4">
                                        @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                href="{{ route('password.request') }}">
                                                <p><u>Lupa password?</u></p>
                                            </a>
                                        @endif
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary btn-block text-uppercase mb-2 mt-3 shadow-sm d-flex justify-content-center align-items-center mx-auto">
                                        {{ __('MASUK') }} </button>
                                    <div class="text-center d-flex justify-content-center mt-2">
                                        <p>Belum Memiliki akun?<a href="f-regist.html" class="font-italic text-muted">
                                                <u>Daftar disini</u></a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <style>
        .login,
        .image {
            min-height: 100vh;
        }

        .bg-image {
            background-image: url('{{ asset('vendor/Arsha/assets/img/bg_lgn.jpg') }} ');
            background-size: cover;
            background-position: center center;
        }
    </style>

    <!-- Vendor JS Files -->
    <script src="{{ asset('vendor/Arsha/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/Arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/Arsha/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('vendor/Arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendor/Arsha/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/Arsha/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('vendor/Arsha/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('vendor/Arsha/assets/js/main.js') }}"></script>
</body>

</html>
