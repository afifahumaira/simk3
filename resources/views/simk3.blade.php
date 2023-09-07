<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>SIM K3 Teknik Universitas Diponegoro</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    {{-- <!-- <link href="{{ asset('foto_all/undip.png') }}" rel="icon" />
    <link href="{{ asset('Arsha/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" /> --> --}}

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;1,200;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css"
        integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <!-- Vendor CSS Files --->


    <!-- Vendor CSS Files -->
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

<body>
    @include('sweetalert::alert')
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo me-auto"><a href="#">SIM K3 TEKNIK UNDIP</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            @guest
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                        <li class="dropdown">
                            <a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a class="nav-link scrollto active" href="#profile">Profil K3 Fakultas Teknik</a></li>
                                <li><a class="nav-link scrollto active" href="#strukturOrganisasi">Struktur Organisasi</a>
                                </li>
                                <li><a class="nav-link scrollto active" href="#kebijakank3">Kebijakan Keselamatan Dan
                                        Kesehatan Kerja (K3)</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#"><span>Pelaporan</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a class="nav-link scrollto active" href="{{ route('laporaninsidens') }}">Lapor
                                        Insiden</a></li>
                                <li><a class="nav-link scrollto active" href="{{ route('potensibahayas') }}">Potensi
                                        Bahaya</a></li>
                            </ul>
                        </li>

                        <li><a class="nav-link scrollto" href="#dokumen">Dokumen</a></li>
                        <li><a class="nav-link scrollto" href="#team">Team P2K3</a></li>
                        <li><a class="nav-link scrollto" href="#footer">Kontak</a></li>
                        <li>
                            <img src="Arsha/assets/img/Vector_13.png" alt="" class="Vector img-fluid ps-4" />
                        </li>
                        <li>
                            <img src="Arsha/assets/img/Vector_12.png" alt="" class="Vector img-fluid ps-2" />
                        </li>
                        <li><a id="login" href="{{ url('/register') }}">Daftar</a></li>
                        <li><a id="login" href="{{ url('/login') }}">Masuk</a></li>

                    </ul>

                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
            @endguest
            @auth
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                        <li class="dropdown">
                            <a href="#"><span>Tentang Kami</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a class="nav-link scrollto active" href="#profile">Profil K3 Fakultas Teknik</a></li>
                                <li><a class="nav-link scrollto active" href="#strukturOrganisasi">Struktur Organisasi</a>
                                </li>
                                <li><a class="nav-link scrollto active" href="#kebijakank3">Kebijakan Keselamatan Dan
                                        Kesehatan Kerja (K3)</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#"><span>Pelaporan</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a class="nav-link scrollto active" href="{{ route('laporaninsidens') }}">Lapor
                                        Insiden</a>
                                </li>
                                <li><a class="nav-link scrollto active" href="{{ route('potensibahayas') }}">Potensi
                                        Bahaya</a></li>
                            </ul>
                        </li>

                        <li><a class="nav-link scrollto" href="#dokumen">Dokumen</a></li>
                        <li><a class="nav-link scrollto" href="#team">Team P2K3</a></li>
                        <li><a class="nav-link scrollto" href="#footer">Kontak</a></li>
                        <li>
                            <img src="{{ asset('vendor/Arsha/assets/img/Vector_13.png') }} " alt=""
                                class="Vector img-fluid ps-4" />
                        </li>
                        <li>
                            <img src="{{ asset('vendor/Arsha/assets/img/Vector_12.png') }} " alt=""
                                class="Vector img-fluid ps-2" />
                        </li>
                        <li><a id="login" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li><a id="login" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>

                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
            @endauth

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center ">

        <div class="container ">
            <div class="row m-5">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>Sistem Informasi<br> Manajemen K3<br> Fakultas Teknik UNDIP</h1>
                    <h2>Keselamatan dan kesehatan kerja seluruh <br> civitas akademik merupakan hal yang utama</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="{{ url('/login') }}" class="btn-get-started scrollto">Mulai</a>

                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('vendor/Arsha/assets/img/Bg-Video.png') }}" style="width: 100%; height:100%;"
                        class="img-fluid animated" alt="">
                </div>
            </div>
            <!-- </div> -->

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= About Us Section ======= -->
        <section id="profile" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title mb-3">
                    <img src="Arsha/assets/img/title-dot.png" class="img-fluid animated" alt="">
                </div>

                <div class="row content">
                    <h3 class=" d-flex justify-content-center mb-5 ">PROFIL K3 FAKULTAS TEKNIK</h3>
                    <div class="col-lg-6 d-flex justify-content-center">
                        <div class="col-lg-6 d-flex align-items-center justify-content-center mb-5 mx-0"
                            data-aos="fade-right" data-aos-delay="200">
                            <img src="{{ asset('vendor/Arsha/assets/img/profilee.png') }}"
                                class="img-fluid w-100 h-100 animated ps-5 ms-5 " alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0" data-aos-delay="200">
                        <p class="mb-0">
                        <ol type="1" class="lh-lg ">
                            <li> Merupakan unit pengelola / manajemen risiko Keselamatan, Kesehatan Kerja di Fakultas
                                Teknik Universitas Diponegoro dengan pendekatan Sistem Manajemen K3. </li>
                            <li>Mengelola kondisi darurat dan krisis yang mungkin terjadi di Fakultas Teknik Universitas
                                Diponegoro.</li>
                            <li>Memberikan dukungan dan saran bagi kegiatan belajar mengajar, riset, kegiatan
                                laboratorium, bengkel agar berlangsung secara selamat dan sehat.</li>
                        </ol>
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= strukturOrganisasi Section ======= -->
        <section id="strukturOrganisasi" class="skills pt-2">
            <div class="container pt-4" data-aos="fade-up">

                <div class="row">
                    <div class="section-title pb-0">
                        <h3 class=" ">STRUKTUR ORGANISASI</h3>
                    </div>
                    <div style="text-align: center">
                        <img src=" {{ asset('vendor/Arsha/assets/img/struktur-organisasi.png') }}"
                            class="img-fluid animated mt-1" alt="">

                    </div>
                </div>
                <div class="section-title mt-5">
                    <img src="{{ asset('vendor/Arsha/assets/img/underline.png') }} " class="img-fluid animated"
                        alt="">
                </div>
            </div>
        </section><!-- End strukturOrganisasi Section -->

        <!-- ======= Skills Section ======= -->
        <section id="kebijakank3" class="skills position-relative pt-5 ">

            <div class="container" data-aos="fade-up">

                <div class="row my-5">
                    <div class="section-title fs-5">
                        <h3>Kebijakan Keselamatan Dan Kesehatan Kerja (K3)</h3>
                    </div>
                    <div class="content mb-5">
                        <p style="text-align: center; margin-bottom: 34px;">Fakultas Teknik
                            Universitas Diponegoro mempunyai visi menjadi Fakultas yang Unggul di Tingkat <br>
                            Internasional
                            Berbasis Riset pada Tahun 2024.
                            Untuk mendukung visi tersebut, maka kepuasan <br> pelanggan adalah hal yang utama dan
                            Fakultas
                            Teknik berkomitmen untuk:

                    </div>
                    <div class="row row-sm-6 d-flex justify-content-center gap-4">
                        <div class="col-md-6 col-lg-4  bg-white align-items-center border rounded-start  mb-0 h-100 w-25 "
                            data-aos="fade-up" data-aos-delay="100">
                            <div class=" border border-1  rounded-2 ms-2 m-3 d-flex justify-content-center "
                                style="width: fit-content; height:fit-content">
                                <i class="bi bi-database py-1 px-2 fs-4 text-start "></i>
                            </div>
                            <div class="judul text-start ms-2">
                                <h2>Konsistensi </h2>
                            </div>
                            <div class="text ms-2">
                                <p class=" ps-0 p-2 my-2 rounded-4" style="text-align: justify">
                                    Membangun dan menerapkan Sistem Manajemen Keselamatan dan Kesehatan Kerja (K3)
                                    secara konsisten
                                </p>
                            </div>
                        </div>
                        <!-- align-items-stretch -->
                        <div class="col-md-6 col-lg-4  bg-white border border-1 rounded-0 h-100 w-25"
                            data-aos="fade-up" data-aos-delay="100">
                            <div class=" border border-1  rounded-2 ms-2 m-3 d-flex justify-content-center "
                                style="width: fit-content; height:fit-content">
                                <i class="bi bi-box-arrow-up-right py-1 px-2 fs-4 text-start "></i>
                            </div>
                            <div class="judul text-start ms-2">
                                <h2>Peningkatan </h2>
                            </div>
                            <p class=" ps-0 p-2  my-2 rounded-4" style="text-align: justify">
                                Selalu berusaha meningkatkan kemampuan proses dan produktivitas serta memberikan jasa
                                layanan Tridharma Perguruan Tinggi yang bermutu
                            </p>
                            <!-- </div> -->
                        </div>

                        <div class="col-md-6 col-lg-4  bg-white mb-5 mb-lg-0 h-100 w-25 border rounded-end"
                            data-aos="fade-up" data-aos-delay="100">
                            <!-- <div class="icon-box d-flex align-items-center rounded-4" > -->
                            <div class=" border border-1  rounded-2  ms-2 m-3 d-flex justify-content-center "
                                style="width: fit-content; height:fit-content">
                                <i class="bi bi-file-earmark py-1 px-2 fs-4 text-start "></i>
                            </div>
                            <div class="judul ms-2 m-3 text-start">
                                <h2 class="text-start">Legalitas </h2>
                            </div>
                            <div class="text ms-2">
                                <p class="ps-0 p-2 d-flex align-items-center my-2 rounded-4"
                                    style="text-align: justify">
                                    Mematuhi undang-undang, peraturan dan persyaratan lainnya yang berlaku untuk produk/
                                    jasa, lingkungan, serta Keselamatan dan Kesehatan Kerja
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-5 d-flex justify-content-center gap-4">
                    <div class="col-md-6 col-lg-6  bg-white  mb-5 mb-lg-0 h-100 w-25 border rounded-start"
                        data-aos="fade-up" data-aos-delay="100">
                        <!-- <div class="icon-box d-flex align-items-center rounded-4" > -->
                        <div class=" border border-1  rounded-2 ms-2 m-3 d-flex justify-content-center "
                            style="width: fit-content; height:fit-content">
                            <i class="bi bi-shield-plus py-1 px-2 fs-4 text-start "></i>
                        </div>
                        <div class="judul text-start ms-2">
                            <h2>pencegahan </h2>
                        </div>
                        <div class="text ms-2">
                            <p class=" ps-0 p-2 d-flex align-items-center my-2 rounded-4 "
                                style="text-align: justify">
                                Melakukan pencegahan luka, sakit, penyakit akibat kerja dan memberikan
                                pendidikan/pelatihan terkait Keselamatan dan Kesehatan Kerja (K3) terhadap karyawan.

                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-6  bg-white align-items-center border rounded-end  mb-0 w-25 "
                        data-aos="fade-up" data-aos-delay="100">
                        <!-- <div class="icon-box d-flex align-items-center rounded-4"  > -->
                        <div class=" border border-1   rounded-2 ms-2 m-3 d-flex justify-content-center "
                            style="width: fit-content; height:fit-content">
                            <i class="bi bi-wrench-adjustable-circle py-1 px-2 fs-3 text-start"></i>
                        </div>
                        <div class="judul text-start ms-2">
                            <h2>Perbaikan </h2>
                        </div>
                        <div class="text ms-2">
                            <p class="ps-0 p-2 d-flex align-items-center my-2 rounded-4" style="text-align: justify">
                                Melakukan perbaikan yang berkelanjutan dalam rangka peningkatan kinerja Keselamatan dan
                                Kesehatan Kerja (K3).
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Skills Section -->

        <!-- ======= Why Us Section ======= -->
        {{-- <section id="dokumen" class="media pb-5" style="background-color: #fefaf0;">
            <div class="container" data-aos="fade-up">
                <div class="card-header d-flex justify-content-center mb-lg-2 mb-0 fs-5 ">
                    <div class="text-center">
                        <h3 class="text-center">DOKUMEN</h3>
                    </div>
                    <div class="section-title d-flex align-items-center ">
                        <img src="Arsha/assets/img/3dot.png" class="img-fluid animated" alt="">
                    </div>
                </div>
                <div class="content">
                    <p style="text-align: center; font-size: 18px; margin-bottom: 34px;">Berikut ini adalah dokumen
                        Standar Operasional Prosedur terkait K3 yang digunakan di lingkungan Fakultas Teknik Universitas
                        Diponegoro
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 col-lg-3 d-flex flex-lg-column-reverse align-items-stretch mt-lg-5 mb-0 mb-lg-0"
                        data-aos="fade-up" data-aos-delay="100">
                        <a class="text-reset" href={{ asset('/vendor/Arsha/assets/doc/sop-praktikum.pdf') }}
                            target="blank">
                            <div class="icon-box">
                                <i class="bi bi-clipboard-data-fill"></i>
                                <!-- <h4 class="judul text-reset">YouTube</h4> -->
                            </div>
                            <p class="text-center" style="color: #37517E;">SOP PELAKSANAAN <br> PRAKTIKUM</p>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex align-items-center  mb-5 mb-lg-3 rounded-circle"
                        data-aos="fade-up" data-aos-delay="100">
                        <a class="text-reset " href={{ asset('/vendor/Arsha/assets/doc/sop-AC.pdf') }}
                            target="blank">
                            <div class="icon-box ">
                                <i class="bi bi-building-add"></i>
                                <!-- <h4 class="judul text-reset">Instagram</h4> -->
                            </div>
                            <p class="text-center" style="color: #37517E;">SOP PEMELIHARAAN AIR <br> CONDITIONER (AC)
                            </p>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-3 d-flex flex-lg-column-reverse align-items-stretch mt-lg-3 mb-0 mb-lg-0"
                        data-aos="fade-up" data-aos-delay="100">
                        <a class="text-reset" href={{ asset('/vendor/Arsha/assets/doc/sop-ruang.pdf') }}
                            target="blank">
                            <div class="icon-box">
                                <i class="bi bi-file-earmark-zip"></i>
                                <!-- <h4 class="judul text-reset">YouTube</h4> -->
                            </div>
                            <p class="text-center" style="color: #37517E;">SOP PEMAKAIAN RUANGAN</p>
                        </a>
                    </div>
                </div>
                <div class="section-title mt-5">
                    <img src="{{ asset('vendor/Arsha/assets/img/underline.png') }} " class="img-fluid animated"
                        alt="">
                </div>
            </div>
        </section><!-- End Why Us Section --> --}}

        <!-- ======= Team Section ======= -->
        {{-- <section id="team" class="team section-bg" style="background-color: #fefaf0;">
            <div class="container" data-aos="fade-up">

                <div class="section-title fs-5">
                    <h3>TEAM P2K3</h3>

                </div>

                <div class="row d-flex justify-content-center">

                    <div class="col-md-6 col-lg-6 mt-4 d-flex justify-content-center ">
                        <div class="member " data-aos="zoom-in" data-aos-delay="200">
                            <div class="d-flex justify-content-center"> <img
                                    src="{{ asset('vendor/Arsha/assets/img/cta-bg.jpg') }} "
                                    class="pic img-fluid animated mt-1" alt="">

                            </div>
                            <div class="member-info">
                                <h4>Sayid</h4>
                                <span>Ketua K3</span>
                                <p>Sid@gmail.com</p>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-6 mt-4 d-flex justify-content-center ">
                        <div class="member " data-aos="zoom-in" data-aos-delay="200">
                            <div class="d-flex justify-content-center"> <img
                                    src="{{ asset('vendor/Arsha/assets/img/cta-bg.jpg') }} "
                                    class="pic img-fluid animated mt-1" alt="">
                            </div>
                            <div class="member-info">
                                <h4>Sayid</h4>
                                <span>Ketua K3</span>
                                <p>Sid@gmail.com</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section> --}}
        <!-- End Team Section -->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="pt-5">
            <div class="footer-top ">
                <div class="container">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-6 col-md-6 footer-links text-start ">
                            <h3 class="pt-4" style="font-size: 32px;">KONTAK</h3>
                            <p class="lh-lg">
                                <br />
                                <i class="bi bi-telephone-fill me-3"> 024 - 7460063</i>
                                <br />
                                <i class="bi bi-archive me-3">024 - 7460063</i>
                                <br />
                                <i class="bi bi-geo-alt-fill me-3">Jl. Prof. Soedarto, SH, Tembalang, Semarang, Jawa
                                    Tengah,
                                    Indonesia 50275</i>
                                <br />
                                <a id="footerEmail" href="http://ft.undip.ac.id" class="bi bi-envelope me-1">
                                    teknik@undip.ac.id</a>
                                <br />
                                <a id="footerEmail" href="http://ft.undip.ac.id" class="bi bi-intersect me-1">
                                    http://ft.undip.ac.id</a>
                                <br />
                            </p>
                            <br>
                            <br>
                            <br>

                            <div class="container footer-bottom clearfix d-flex mt-5 ps-0">
                                <div class="copyright align-self-end mt-auto">
                                    &copy; Copyright <strong><span>Teknik Universitas Diponegoro</span></strong>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 footer-links d-flex justify-content-center">
                            <!-- <div>
                  <h3>Maps</h3>
                </div> -->
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1399.9457899351726!2d110.43848313080261!3d-7.050976318737886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c1b512ef20b%3A0xcb858b2ff8548af9!2sDiponegoro%20University%20Faculty%20of%20Engineering!5e0!3m2!1sen!2sid!4v1694087773195!5m2!1sen!2sid"
                                width="420" height="437" style="border-radius: 25px" allowfullscreen=""
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
        {{-- <div id="preloader"></div> --}}
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"
            style="background-color: #37517E;"><i class="bi bi-arrow-up-short"></i></a>
        <!-- ======= End Footer ======= -->

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
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
