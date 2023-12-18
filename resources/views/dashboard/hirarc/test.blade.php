@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>HIRADC</h2>
                    <a href="{{ route('hirarc.tambah') }}" type="button"
                        class="btn text-white btn-sm btn-secondary d-flex justify-content-center align-items-center mb-2"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background: #505050; "><i
                            class="bi bi-chevron-left text-white"></i>Kembali</a>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">

                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px font-weight:700">
                                        keluar dari tambah data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang dimasukkan
                                            belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('hirarc.tambah') }}" type="button"
                                        class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                        style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                    <button type="button"
                                        class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                        data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-title  gap-1 mx-5 my-5  ">
                    <div id="kt_app_content"
                        class="app-content flex-column-fluid rounded   mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">

                        <div class="card ">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong>Tambah Data HIRARC</strong>
                                </div>
                            </div>
                            <div class="card-body">

                                @include('layouts.alerts')

                                <form action="{{ route('hirarc.save', $hirarc->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    {{-- <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label ">Hazard</label>
                                        <div class="col-sm-10 w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input class="form-control bg-secondary" name="hazard"readonly>
                                                @foreach ($hazard as $hazard)
                                                <option value="{{ $hazard->id }}"
                                                    {{ $hirarc->hazard == $hazard->id ? 'selected' : '' }}>
                                                    {{ $hazard->name }}</option>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label ">Risiko</label>
                                        <div class="col-sm-10 w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input class="form-control bg-secondary" name="risk" readonly>
                                                @foreach ($risk as $risk)
                                                <option value="{{ $risk->id }}"
                                                    {{ $hirarc->risk == $risk->id ? 'selected' : '' }}>
                                                    {{ $risk->name }}</option>
                                                @endforeach
                                                
                                                
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Sesuai dengan peraturan
                                            pemerintah</label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="N/A"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" name="kesesuaian"
                                                id="kesesuaian" style="font-family: Arial, Helvetica, sans-serif;" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                                <option value="3">Not Applicable</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kondisi</label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="Normal"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" name="kondisi"
                                                id="kondisi" style="font-family: Arial, Helvetica, sans-serif;" required>
                                                <option value="">- Pilih -</option>
                                                <option value="1">Normal </option>
                                                <option value="2">Not Normal</option>
                                                <option value="3"> Emergency</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Kendali</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control" name="kendali" id="kendali"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label ">Pre Control</label>
                                        <div
                                            class="border  border-gray-300 d-flex justify-content-between align-items-center form-control py-2">
                                            <label class="form-label" data-placeholder="" style="color: #a1a5b7 ">Tambah
                                                data</label>
                                            <button type="button" href=""
                                                class="btn text-white btn-sm btn-primary d-flex justify-content-center align-items-center  rounded-1"
                                                data-bs-toggle="modal" data-bs-target="#PreControl"
                                                style="background: #233EAE">
                                                <i class="bi bi-plus-lg fs-3 text-center text-white"></i>
                                            </button>
                                            {{--  Modal Pre Control --}}
                                            <div class="modal fade" id="PreControl" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Pre
                                                                Control</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="">

                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group my-5">
                                                                    <label class="ps-3" for="select1">Keparahan
                                                                        (severity)</label>
                                                                    <select class="form-control" id="select_pre_severity_"
                                                                        name="pre_severity" data-control="select2"
                                                                        data-hide-search="true" required
                                                                        data-placeholder="Pilih Keparahan
                                                                (severity)">
                                                                        <option value="" selected disabled>Pilih
                                                                            Keparahan
                                                                            (severity)</option>
                                                                        <option value="1">
                                                                            Tergores, sayatan kecil, kerugian dalam rupiah
                                                                            sebesar
                                                                            Rp 1.000.000,-
                                                                        </option>
                                                                        <option value="3">Cidera menyebabkan absen
                                                                            maksimal 3
                                                                            hari, kerugian
                                                                            dalam rupiah sebesar Rp 10.000.000,-</option>
                                                                        <option value="7">Cidera menyebabkan absen
                                                                            lebih dari
                                                                            3 hari, kerugian
                                                                            dalam rupiah sebesar Rp 50.000.000,-</option>
                                                                        <option value="15">
                                                                            Cacat sementara, butuh rawat inap, kerugian
                                                                            dalam rupiah
                                                                            sebesar Rp
                                                                            100.000.000,-</option>
                                                                        <option value="40">
                                                                            Cidera serius atau sampai kematian, kerugian
                                                                            dalam
                                                                            rupiah sebesar Rp
                                                                            1.000.000.000,-</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="ps-3" for="select2">Paparan
                                                                        (Exposure)</label>
                                                                    <select class="form-control" id="select_pre_exposure_"
                                                                        name="pre_exposure" data-control="select2"
                                                                        data-hide-search="true" required
                                                                        data-placeholder="Pilih Paparan
                                                                (Exposure)">
                                                                        <option value="" selected disabled>Pilih
                                                                            Paparan
                                                                            (Exposure)</option>
                                                                        <option value="0.5"> 1 kali dalam setahun
                                                                        </option>
                                                                        <option value="1">Beberapa kali dalam setahun
                                                                        </option>
                                                                        <option value="2">1 kali sebulan</option>
                                                                        <option value="3">1 kali dalam seminggu
                                                                        </option>
                                                                        <option value="6">1 kali dalam sehari</option>
                                                                        <option value="10">Berkelanjutan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group my-5">
                                                                    <label class="ps-3" for="select3">Kemungkinan
                                                                        Terjadi (Probability)</label>
                                                                    <select class="form-control"
                                                                        id="select_pre_probability_"
                                                                        name="pre_probability" data-control="select2"
                                                                        data-hide-search="true" required
                                                                        data-placeholder="Pilih Kemungkinan Terjadi (Probability)">
                                                                        <option value="" selected disabled>Pilih
                                                                            Kemungkinan
                                                                            Terjadi (Probability)</option>
                                                                        <option value="1">
                                                                            Kejadian yang secara teori hanya mungkin terjadi
                                                                        </option>
                                                                        <option value="3">mungkin terjadi sekali dalam
                                                                            10
                                                                            tahun</option>
                                                                        <option value="6">Kejadian yang jarang tetapi
                                                                            dapat
                                                                            sesekali terjadi
                                                                        </option>
                                                                        <option value="10">
                                                                            Peristiwa berulang setidaknya sekali dalam
                                                                            setahun
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <div class="container my-5">
                                                                    <div class="hitung d-flex justify-content-center">
                                                                        <button type="button" id="hitung"
                                                                            class="btn text-center d-flex align-items-center justify-content-center btn-primary btn-sm"
                                                                            style="background: #000957"
                                                                            onclick="hitungpreControl()">Hitung</button>
                                                                    </div>
                                                                </div>
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="col-md-6 col-lg-6 d-flex justify-content-center align-items-center mb-5 mb-lg-0"
                                                                        data-aos="fade-up" data-aos-delay="100">
                                                                        <div class="icon-box d-flex align-items-center justify-content-center "
                                                                            style="width:113px; height:88px; box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1); ">
                                                                            <h4 id="hasilpre" class="title fw-bold"
                                                                                style="font-size: 24px">
                                                                                -<br /></h4>
                                                                            <input id="inputhasilpre" type="hidden"
                                                                                name="hasilprecontrol">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn text-center d-flex justify-content-center px-3 py-2"
                                                                    style=" background:#29CC6A; color:#ffffff;">Simpan</button>
                                                                <button type="button"
                                                                    class="btn text-center d-flex justify-content-center border-0 px-2 py-2"
                                                                    style=" background:#868E96; color:#ffffff;"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal Pre Control --}}
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Penyebab Utama</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control" name="penyebab" id="penyebab"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label w-100">Pengendalian Tambahan
                                            (diusulkan)</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control" name="pengendalian"
                                                id="pengendalian" value="">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Form yang diperlukan</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control" name="form_diperlukan"
                                                id="form_diperlukan" value="">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputNomertelepon3" class="col-sm-2 col-form-label">SOP yang
                                            diperlukan</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control" name="sop" id="sop"
                                                value="">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label ">Post Control</label>
                                        <div
                                            class="border  border-gray-300 d-flex justify-content-between align-items-center form-control py-2">
                                            <label class="form-label" data-placeholder="" style="color: #a1a5b7 ">Tambah
                                                data</label>
                                            <button type="button" href=""
                                                class="btn text-white btn-sm btn-primary d-flex justify-content-center align-items-center  rounded-1"
                                                data-bs-toggle="modal" data-bs-target="#PostControl"
                                                style="background: #233EAE">
                                                <i class="bi bi-plus-lg fs-3 text-center text-white"></i>
                                            </button>
                                            {{-- Modal Post Control --}}
                                            <div class="modal fade" id="PostControl" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Post
                                                                Control</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form method="POST" action="">

                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group my-5">
                                                                    <label class="ps-3"
                                                                        for="select_post_severity_">Keparahan
                                                                        (severity)</label>
                                                                    <select class="form-control"
                                                                        id="select_post_severity_" name="post_severity"
                                                                        data-control="select2" data-hide-search="true"
                                                                        required
                                                                        data-placeholder="Keparahan
                                                                (severity)">
                                                                        <option value="" selected disable>Keparahan
                                                                            (severity)</option>
                                                                        <option value="1">
                                                                            Tergores, sayatan kecil, kerugian dalam rupiah
                                                                            sebesar
                                                                            Rp 1.000.000,-
                                                                        </option>
                                                                        <option value="3">Cidera menyebabkan absen
                                                                            maksimal 3
                                                                            hari, kerugian
                                                                            dalam rupiah sebesar Rp 10.000.000,-</option>
                                                                        <option value="7">Cidera menyebabkan absen
                                                                            lebih dari
                                                                            3 hari, kerugian
                                                                            dalam rupiah sebesar Rp 50.000.000,-</option>
                                                                        <option value="15">
                                                                            Cacat sementara, butuh rawat inap, kerugian
                                                                            dalam rupiah
                                                                            sebesar Rp
                                                                            100.000.000,-</option>
                                                                        <option value="40">
                                                                            Cidera serius atau sampai kematian, kerugian
                                                                            dalam
                                                                            rupiah sebesar Rp
                                                                            1.000.000.000,-</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <label class="ps-3"
                                                                        for="select_post_exposure_">Paparan
                                                                        (Exposure)</label>
                                                                    <select class="form-control"
                                                                        id="select_post_exposure_" name="post_exposure"
                                                                        data-control="select2" data-hide-search="true"
                                                                        required
                                                                        data-placeholder="Paparan
                                                                (Exposure)">
                                                                        <option value="" selected disable>Paparan
                                                                            (Exposure)</option>
                                                                        <option value="0.5"> 1 kali dalam setahun
                                                                        </option>
                                                                        <option value="1">Beberapa kali dalam setahun
                                                                        </option>
                                                                        <option value="2">1 kali sebulan</option>
                                                                        <option value="3">1 kali dalam seminggu
                                                                        </option>
                                                                        <option value="6">1 kali dalam sehari</option>
                                                                        <option value="10">Berkelanjutan</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group my-5">
                                                                    <label class="ps-3" for="select3">Kemungkinan
                                                                        Terjadi (Probability)</label>
                                                                    <select class="form-control"
                                                                        id="select_post_probability_"
                                                                        name="post_probability" data-control="select2"
                                                                        data-hide-search="true" required
                                                                        data-placeholder="Kemungkinan
                                                                Terjadi (Probability)">
                                                                        <option value="" selected disable>Kemungkinan
                                                                            Terjadi (Probability)</option>
                                                                        <option value="1">
                                                                            Kejadian yang secara teori hanya mungkin terjadi
                                                                        </option>
                                                                        <option value="3">mungkin terjadi sekali dalam
                                                                            10
                                                                            tahun</option>
                                                                        <option value="6">Kejadian yang jarang tetapi
                                                                            dapat
                                                                            sesekali terjadi
                                                                        </option>
                                                                        <option value="10">
                                                                            Peristiwa berulang setidaknya sekali dalam
                                                                            setahun
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="container my-5">
                                                                    <div class="hitung d-flex justify-content-center">
                                                                        <button type="button" id="hitung"
                                                                            class="btn text-center d-flex align-items-center justify-content-center btn-primary btn-sm"
                                                                            style="background: #000957"
                                                                            onclick="hitungpostControl()">Hitung</button>
                                                                    </div>
                                                                </div>
                                                                <div class="row d-flex justify-content-center">
                                                                    <div class="col-md-6 col-lg-6 d-flex justify-content-center align-items-center mb-5 mb-lg-0"
                                                                        data-aos="fade-up" data-aos-delay="100">
                                                                        <div class="icon-box d-flex align-items-center justify-content-center "
                                                                            style="width:113px; height:88px; box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1); ">
                                                                            <h4 id="hasilpost" class="title fw-bold"
                                                                                style="font-size: 24px">
                                                                                -<br /></h4>
                                                                            <input id="inputhasilpost" type="hidden"
                                                                                name="hasilpostcontrol">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-end">
                                                                <button type="submit"
                                                                    class="btn text-center d-flex justify-content-center px-3 py-2"
                                                                    style=" background:#29CC6A; color:#ffffff;">Simpan</button>
                                                                <button type="button"
                                                                    class="btn text-center d-flex justify-content-center border-0 px-2 py-2"
                                                                    style=" background:#868E96; color:#ffffff;"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- End Modal Post Control --}}
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputNomertelepon3" class="col-sm-2 col-form-label">Responsible
                                            Person</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control" name="responsible_person"
                                                id="responsible_person" value="">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" name="status" class="form-control" value="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center border-0">
                        <div class=" d-flex justify-content-center">
                            <button type="submit" id="simpanAktifitas"
                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;"
                                data-bs-toggle="modal" data-bs-target="#simpandata">Simpan
                                Data</button>

                            <a href="{{ route('hirarc.tambah') }}" type="submit"
                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                data-bs-toggle="modal" data-bs-target="#resetform"
                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a>

                        </div>
                    </div>
                    <div class="modal fade" id="resetform" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">

                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px font-weight:700">
                                        keluar dari tambah
                                        data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px">
                                            data yang
                                            dimasukkan belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('hirarc.index') }}" type="button"
                                        class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                        style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                    <button type="button"
                                        class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                        data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!--end::Content container-->

    </div>
    </div>
@stop

@section('customscript')
    <script>
        $(document).ready(function() {
            $(".tanggalPicker").flatpickr({
                altInput: true,
                altFormat: "d F Y",
                dateFormat: "Y-m-d",
                locale: "id"
            });
        });
    </script>
@stop
