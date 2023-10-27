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

    <div class="container">
        <div class="row ">
            <!-- The content half -->
            <div class="col-md-7 col-lg-5 mx-auto my-auto">
                <div class="login card border-0 shadow rounded-4 my-5">
                    <!-- Demo content-->
                    <div class="card-body p-4 p-sm-5 ">
                        <div class="card-title mb-5">
                            <h3 class="">Lupa Kata Sandi</h3>
                            <p style="color: #B9B9B9">Masukkan email anda untuk mendapatkan instruksi
                                selanjutnya.</p>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input id="inputEmail" type="email" name="email" :value="old('email')" required
                                    autofocus placeholder="Email address" class="form-control border-0 shadow-sm px-4">
                            </div>

                            <button type="submit"
                                class="btn btn-block text-uppercase px-5 mb-2 mt-5 shadow-sm d-flex justify-content-center align-items-center mx-auto"
                                style="background-color:#16243D; color:#fff">
                                {{ __('MASUK') }} </button>

                        </form>

                    </div><!-- End -->

                </div>
            </div><!-- End -->

        </div>
    </div>
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <style>
        .card-title p {
            font-size: 20px;
            font-weight: 400;
            color: #B9B9B9;
        }

        .card-title {
            font-size: 28px !important;
            font-weight: bold !important;
        }

        body {
            height: 90vh;
            background-image: url('{{ asset('vendor/Arsha/assets/img/bg_login.png') }} ');
            background-size: cover;
            background-position: center center;
        }

        .container,
        .row {
            height: 100%;
        }

        .form-group input {
            background-color: #F5F4EF;
            color: #16243D;
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
