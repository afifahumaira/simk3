<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>SIM K3 Teknik Universitas Diponegoro</title>
    <meta charset="utf-8" />
    <meta name="description" content="Saul HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
    <meta name="keywords"
        content="Saul, bootstrap, bootstrap 5, dmin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Saul HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/products/saul-html-pro" />
    <meta property="og:site_name" content="Keenthemes | Saul HTML Free" />
    <link rel="canonical" href="https://preview.keenthemes.com/saul-html-free" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Flex:wght@100;200;300;400;500;600;700;800;900;1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!-- Favicons -->
    {{-- <!-- <link href="{{ asset('foto_all/undip.png') }}" rel="icon" />
    <link href="{{ asset('Arsha/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon" /> --> --}}

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

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
    <link href="{{ asset('plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="content mt-3">
        <div class="container">

            <div class="animated fadeIn">
                <br><br><br>

                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="pull-left">
                            <h2>Tambah Data Lapor Insiden</h2>
                        </div>
                        <div class="pull-right d-flex justify-content-end">
                            <a href="{{ route('laporaninsidens') }}" type="button"
                                class="btn text-white btn-sm btn-secondary d-flex justify-content-center align-items-center mb-2"
                                style="background: #505050; width:90px" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                <i class="bi bi-chevron-left text-white"></i> Kembali
                            </a>

                        </div>

                    </div>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">

                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5" style="color: #16243D; font-size: 20px font-weight:700">keluar
                                        dari
                                        tambah data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang
                                            dimasukkan
                                            belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('simk3.index') }}" type="button"
                                        class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                        style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                    <button type="button"
                                        class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                        data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- {{-- Data Kejadian --}} -->
                    <div class="content mt-3 p-3">
                        <div class="animated fadeIn">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="pull-left">
                                        <strong>Data Kejadian</strong>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="lh-lg">
                                        <div class="ps-3 pe-5">
                                            <label class="col-sm-2 col-form-label ">Kode Lapor Insiden</label>
                                            <div class="col-sm-10 w-100">
                                                <div class="form-group label-floating is-empty is-focused">
                                                    <input class="form-control bg-secondary" name="kode_laporinsiden"
                                                        id="kode_laporinsiden" value="INSDN-1" readonly>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="ps-3 pe-5">
                                            <label class="col-sm-2 col-form-label">Waktu Kejadian</label>
                                            <div class="col-sm-10 w-100">
                                                <input type="datetime-local" id="date" class="form-control">
                                            </div>
                                        </div>

                                        <div class="ps-3 pe-5">
                                            <label class="col-sm-2 col-form-label">Lokasi</label>
                                            <div class="col-sm-10 w-100">
                                                <select class="form-select fs-6 w-100" data-control="select2"
                                                    data-hide-search="true" id=""
                                                    style="font-family: 'Inter';">
                                                    <option value="">- Pilih -</option>
                                                    <option value="*">Teknik Sipil</option>
                                                    <option value="* ">Teknik Arsitektur</option>
                                                    <option value="*">Teknik Kimia</option>
                                                    <option value="*">Teknik Perencanaan Wilayah dan Kota</option>
                                                    <option value="*">Teknik Mesin</option>
                                                    <option value="*">Teknik Elektro</option>
                                                    <option value="*">Teknik Industri</option>
                                                    <option value="*">Teknik Lingkungan</option>
                                                    <option value="*">Teknik Perkapalan</option>
                                                    <option value="*">Teknik Geologi</option>
                                                    <option value="*">Teknik Geodesi</option>
                                                    <option value="*">Teknik Komputer</option>
                                                    <option value="*">Dekanat FT</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="ps-3 pe-5">
                                            <label class="col-sm-2 col-form-label">Lokasi Rinci</label>
                                            <div class="col-sm-10 w-100">
                                                <input type="text" class="form-control" name="lokasi_rinci"
                                                    id="lokasi_rinci" value="">

                                            </div>
                                        </div>


                                        <div class="ps-3 pe-5">
                                            <label class="col-sm-2 col-form-label">Jenis Insiden</label>
                                            <div class="col-sm-10 w-100">
                                                <select class="form-select fs-6 w-100" data-control="select2"
                                                    data-hide-search="true" data-placeholder="Lokasi"
                                                    style="--bs-link-hover-color-rgb: 25, 135, 84;"
                                                    id="lokasiinspeksi" style="font-family: 'Inter';">
                                                    <option value="">- Pilih -</option>
                                                    <option value="Pingsan">Pingsan</option>
                                                    <option value="Serangan Jantung">Serangan Jantung</option>
                                                    <option value="Asma">Asma</option>
                                                    <option value="Pendarahan">Pendarahan</option>
                                                    <option value="Keracunan">Keracunan</option>
                                                    <option value="Cidera">Cidera</option>
                                                    <option value="*">Lainnya</option>
                                                </select>

                                            </div>
                                        </div>

                                        <div class="ps-3 pe-5">
                                            <label class="col-sm-2 col-form-label">Foto Kejadian</label>
                                            <div class="col-sm-10 w-100">
                                                <input type="file" class="form-control" name="gambar"
                                                    id="gambar">

                                            </div>
                                        </div>

                                        <div class="ps-3 pe-5">
                                            <label class="col-sm-2 col-form-label">Status</label>
                                            <div class="col-sm-10 w-100">
                                                <div class="form-group label-floating is-empty is-focused">
                                                    <input class="form-control bg-secondary" name="kode_laporinsiden"
                                                        id="kode_laporinsiden" value="INSDN NUMBER" readonly>
                                                </div>
                                            </div>
                                        </div>

                                </div>
                            </div>
                        </div>

                        <!-- {{-- Data Pelapor --}} -->
                        <div class="animated fadeIn">

                            <div class="card">
                                <div class="card-header d-flex align-items-center ">
                                    <div class="pull-left">
                                        <strong>Data
                                            Pelapor</strong>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Nama Pelapor</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control ">

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email Pelapor</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="email" class="form-control">

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputNomertelepon3" class="col-sm-2 col-form-label">No. Telp
                                            Pelapor</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="number" class="form-control ">

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputUnit" class="col-sm-2 col-form-label">Unit</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label for="inputfotokejadian" class="col-sm-2 col-form-label">Foto Tanda
                                            Pengenal</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="file" class="form-control">

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="animated fadeIn mt-20 mb-10">
                            <div class="card">
                                <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                    <div class="pull-left">
                                        <strong class="d-flex ">Data
                                            Korban <p style="color:#fc0000"> (Apabila tidak mengetahui data korban
                                                dapat dikosongkan)
                                            </p></strong>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Nama Pelapor</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control ">

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email Pelapor</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="email" class="form-control">

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputNomertelepon3" class="col-sm-2 col-form-label">No. Telp
                                            Pelapor</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="number" class="form-control ">

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputUnit" class="col-sm-2 col-form-label">Unit</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                    <div class="container d-flex justify-content-center">
                        <div class=" d-flex justify-content-center">
                            <button type="submit"
                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;"
                                data-bs-toggle="modal" data-bs-target="#simpandata" onclick="showDiv()">Simpan
                                Data</button>
                            <div class="modal fade" id="simpandata" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">

                                        <div class="modal-body mt-5 ">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <i class="bi bi-person-check text-center"
                                                    style="font-size: 60px; color:#16243D"></i>
                                            </div>
                                            <p class="mb-0 mt-2 text-center "
                                                style="color: #16243D; font-weight:400; font-size:14px"> Data berhasil
                                                diperbaharui! </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('laporaninsidens') }}" type="submit"
                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                data-bs-toggle="modal" data-bs-target="#resetform"
                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
                            <div class="modal fade" id="resetform" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">

                                        <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                            <h2 class="mt-5 text-center"
                                                style="color: #16243D; font-size: 20px font-weight:700">keluar dari
                                                tambah
                                                data?
                                                <p class="mb-0 mt-2 text-center "
                                                    style="color: #DC3545; font-weight:400; font-size:14px"> data yang
                                                    dimasukkan belum tersimpan </p>
                                            </h2>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center border-0">
                                            <a href="{{ route('laporaninsidens') }}" type="button"
                                                class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                            <button type="button"
                                                class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                data-bs-dismiss="modal"
                                                style="width:76px; height:31px; ">Tidak</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<style>
    strong {
        font-weight: bold !important;
        font-family: Roboto Flex !important;
        font-size: 16px;
    }

    h2 {
        font-family: Roboto Flex !important;
        font-size: 24px;
        font-weight: bold;
    }

    .container {
        background-color: #fdf7e5;
        font-family: Roboto !important;
        font-size: 16px !important;
    }

    .card {
        margin-bottom: 3rem;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: 100%;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, .125);
        padding: 1rem;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
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
<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>


</html>
