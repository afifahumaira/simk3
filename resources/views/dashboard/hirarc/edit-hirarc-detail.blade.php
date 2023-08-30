@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Edit Data HIRARC</h2>
                    <a href="{{ route('hirarc.index') }}" type="button"
                        class="btn text-white btn-secondary btn-sm d-flex justify-content-center align-items-center mb-2"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background: #505050; width:90px"><i
                            class="bi bi-chevron-left text-white"></i>Kembali</a>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">
                                {{-- <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div> --}}
                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px font-weight:700">
                                        keluar dari edit data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang dimasukkan
                                            belum tersimpan </p>
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
                <div class="page-title  gap-1 mx-5 my-5  ">
                    <div id="kt_app_content"
                        class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">

                        <div class="card bg-light">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong style="color: #16243D; font-family: Roboto Flex; font-size:16px;">Data
                                        HIRARC</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('hirarc.update', $hirarc->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Departemen</label>
                                        <div class=" w-100">
                                            <select name="departemen_id" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Departemen">
                                                @foreach ($departments as $dep)
                                                    <option value="{{ $dep->id }}"
                                                        {{ $hirarc->departemen_id == $dep->id ? 'selected' : '' }}>
                                                        {{ $dep->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Lokasi</label>
                                        <div class=" w-100">
                                            <select name="location_id" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Lokasi">
                                                @foreach ($locations as $loc)
                                                    <option value="{{ $loc->id }}"
                                                        {{ $hirarc->location_id == $loc->id ? 'selected' : '' }}>
                                                        {{ $loc->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Aktifitas</label>
                                        <div class=" w-100">
                                            <select name="activity" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Aktifitas">
                                                @foreach ($activitie as $act)
                                                    <option value="{{ $act->name }}"
                                                        {{ $hirarc->activitie == $act->id ? 'selected' : '' }}>
                                                        {{ $act->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Hazard</label>
                                        <div class=" w-100">
                                            <select name="hazard" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Hazard">
                                                @foreach ($hazard as $hazard)
                                                    <option value="{{ $hazard->name }}"
                                                        {{ $hirarc->hazard == $hazard->id ? 'selected' : '' }}>
                                                        {{ $hazard->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Resiko</label>
                                        <div class=" w-100">
                                            <select name="risk" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Resiko">
                                                @foreach ($risk as $risk)
                                                    <option value="{{ $risk->name }}"
                                                        {{ $hirarc->risk == $risk->id ? 'selected' : '' }}>
                                                        {{ $risk->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Sesuai dengan peraturan
                                            pemerintah</label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="N/A"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" name="kesesuaian"
                                                id="kesesuaian" style="font-family: 'Inter';" required>
                                                <option value="{{ $hirarc->kesesuaian }}">- Pilih -</option>
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
                                                id="kondisi" style="font-family: 'Inter';" required>
                                                <option value="{{ $hirarc->kondisi }}">- Pilih -</option>
                                                <option value="1">Normal </option>
                                                <option value="2">Not Normal</option>
                                                <option value="3"> Emergency</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Pengendalian</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="kendali"
                                                id="kendali" value="{{ $hirarc->kendali }}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label" for="select1">Keparahan Risko
                                            (severity) Saat Ini</label>
                                        <select class="form-control" id="current_severity"
                                            onchange="risk_rating()"
                                            name="current_severity" data-control="select2"
                                            data-hide-search="true" required
                                            data-placeholder="Pilih Keparahan Risiko
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

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Paparan Rsiko
                                            (Exposure) Saat Ini</label>
                                        <select class="form-control" id="current_exposure"
                                            onchange="risk_rating()"
                                            name="current_exposure" data-control="select2"
                                            data-hide-search="true" required
                                            data-placeholder="Pilih Paparan Risiko
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

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kemungkinan Risiko
                                            Terjadi Saat Ini(Probability)</label>
                                        <select class="form-control"
                                            onchange="risk_rating()"
                                            id="current_probability"
                                            name="current_probability" data-control="select2"
                                            data-hide-search="true" required
                                            data-placeholder="Pilih Kemungkinan Risiko Terjadi (Probability)">
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

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Tingkat Risiko Saat Ini</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="current_risk_rating"
                                                id="current_risk_rating" value="{{ $hirarc->current_risk_rating }}" readonly>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kategori Risiko Saat Ini
                                            </label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="Pilih Kategori Risiko Saat Ini"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" name="current_risk_category"
                                                id="current_risk_category" style="font-family: 'Inter';" required>
                                                <option value="{{ $hirarc->current_risk_category }}">- Pilih -</option>
                                                <option id="current_1" value="1">Slight</option>
                                                <option id="current_2" value="2">Low</option>
                                                <option id="current_3" value="3">Medium</option>
                                                <option id="current_4" value="4">High</option>
                                                <option id="current_5" value="5">Very High</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Penyebab Utama</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="penyebab"
                                                id="penyebab" value="{{ $hirarc->penyebab }}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Usulan</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="usulan"
                                                id="usulan" value="{{ $hirarc->usulan }}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Formulir yang Dibutuhkan</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="form_diperlukan"
                                                id="form_diperlukan" value="{{ $hirarc->form_dibutuhkan }}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">SOP</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="sop"
                                                id="sop" value="{{ $hirarc->sop }}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Keparahan
                                            (severity) Residual</label>
                                        <select class="form-control"
                                            onchange="risk_residual()"
                                            id="residual_severity" name="residual_severity"
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

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Paparan Risiko
                                            (Exposure) Residual</label>
                                        <select class="form-control"
                                            onchange="risk_residual()"
                                            id="residual_exposure" name="residual_exposure"
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
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kemungkinan Risiko
                                            Terjadi (Probability) Residual</label>
                                        <select class="form-control"
                                            id="residual_probability"
                                            onchange="risk_residual()"
                                            name="residual_probability" data-control="select2"
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

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Tingkat Risiko Residual</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="residual_risk_rating"
                                                id="residual_risk_rating" value="{{ $hirarc->residual_risk_rating }}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kategori Risiko Residual</label>
                                        <div class=" w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="Pilih Kategori Risiko Residual"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" name="residual_risk_category"
                                                id="residual_risk_category" style="font-family: 'Inter';" required>
                                                <option value="{{ $hirarc->residual_risk_category }}">- Pilih -</option>
                                                <option value="1">Slight</option>
                                                <option value="2">Low</option>
                                                <option value="3">Medium</option>
                                                <option value="4">High</option>
                                                <option value="5">Very High</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Penanggung Jawab </label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="penanggung_jawab"
                                                id="penanggung_jawab" value="{{ $hirarc->penanggung_jawab }}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Status</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="status"
                                                id="status" value="{{ $hirarc->status }}">
                                        </div>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center border-0">
                                        <div class=" d-flex justify-content-center">
                                            <button type="submit" id="simpanHirarc"
                                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                                style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;"
                                                data-bs-toggle="modal" data-bs-target="#simpandata">Simpan
                                                Data</button>

                                            <a href="{{ route('hirarc.index') }}" type="submit"
                                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                                data-bs-toggle="modal" data-bs-target="#resetform"
                                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a>

                                        </div>
                                    </div>

                </form>
            </div>
        </div>
    </div>
                            {{-- <a href="{{ route('laporan-insiden.tambah') }}" type="submit"
                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                data-bs-toggle="modal" data-bs-target="#resetform"
                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px;height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
                            <div class="modal fade" id="resetform" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">

                                        <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                            <h2 class="mt-5 text-center"
                                                style="color: #16243D; font-size: 20px font-weight:700">keluar dari tambah
                                                data?
                                                <p class="mb-0 mt-2 text-center "
                                                    style="color: #DC3545; font-weight:400; font-size:14px"> data yang
                                                    dimasukkan belum tersimpan </p>
                                            </h2>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center border-0">
                                            <a href="{{ route('laporan-insiden.tambah') }}" type="button"
                                                class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                            <button type="button"
                                                class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!--end::Content container-->

        </div>
    </div>
@stop

@section('customscript')
    <script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".tanggalPicker").flatpickr({
                altInput: true,
                altFormat: "d F Y",
                dateFormat: "Y-m-d",
                locale: "id"
            });
        });

        function risk_rating() {
            var severity = document.getElementById("current_severity").value;
            var exposure = document.getElementById("current_exposure").value;
            var proby = document.getElementById("current_probability").value;
            var risk_rating = severity * exposure * proby;
            document.getElementById("current_risk_rating").value = risk_rating;
            var cat = document.getElementById("current_risk_category")
            if ( risk_rating >= "20"){
                $("current_risk_category select").val("1").change;
            } else if (risk_rating >= "21" && risk_rating <= "70" ){
                cat.option[1].selected = true;
                $("current_risk_category select").val("2").change;    
            } else if (risk_rating >= "71" && risk_rating <= "200"){
                cat.option[2].selected = true;
                $("current_risk_category select").val("3").change;
            } else if (risk_rating => "201" && risk_rating <= "400"){
                cat.option[3].selected = true;
                $("current_risk_category select").val("4").change;
            } else {
                cat.option[4].selected = true;
                $("current_risk_category select").val("5").change;
            }
        }

        function risk_residual() {
            var severity = document.getElementById("residual_severity").value;
            var exposure = document.getElementById("residual_exposure").value;
            var proby = document.getElementById("residual_probability").value;
            var risk_rating = severity * exposure * proby;
            document.getElementById("residual_risk_rating").value = risk_rating;
            if ( risk_rating >= "20"){
                $("residual_risk_category select").val("1").change;
            } else if (risk_rating >= "21" && risk_rating <= "70" ){
                $("residual_risk_category select").val("2").change;    
            } else if (risk_rating >= "71" && risk_rating <= "200"){
                $("residual_risk_category select").val("3").change;
            } else if (risk_rating => "201" && risk_rating <= "400"){
                $("residual_risk_category select").val("4").change;
            } else {
                $("residual_risk_category select").val("5").change;
            }
        }
    </script>
@stop
