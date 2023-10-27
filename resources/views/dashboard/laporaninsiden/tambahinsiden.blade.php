@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2 style="color: #16243D; font-family: Plus Jakarta Sans, sans-serif; font-size:16px;">Tambah Data Lapor
                        Insiden</h2>
                    <a href="{{ route('laporan-insiden.index') }}" type="button"
                        class="btn text-white btn-sm btn-secondary d-flex justify-content-center align-items-center mb-2"
                        style="background: #505050; " data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i
                            class="bi bi-chevron-left text-white"></i>Kembali</a>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">

                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5" style="color: #16243D; font-size: 20px font-weight:700">keluar dari
                                        tambah data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang dimasukkan
                                            belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('laporan-insiden.index') }}" type="button"
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
                                    <strong
                                        style="color: #16243D; font-family: Plus Jakarta Sans, sans-serif; font-size:16px;">Data
                                        Kejadian</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="lh-lg" method="POST" action="{{ route('laporan-insiden.insert') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label ">Kode Lapor Insiden</label>
                                        <div class=" w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input class="form-control bg-secondary" name="kode_laporinsiden"
                                                    id="kode_laporinsiden" value="{{ $kode }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Waktu Kejadian</label>
                                        <div class=" w-100">
                                            <input type="date" id="date" name="waktu_kejadian"
                                                class="form-control tanggalPicker" placeholder="dd/mm/yyyy"
                                                max="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Lokasi</label>
                                        <div class=" w-100">
                                            <select name="departemen_id" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Lokasi">
                                                @foreach ($departments as $dep)
                                                    <option value="{{ $dep->id }}"
                                                        {{ old('departemen_id') == $dep->id ? 'selected' : '' }}>
                                                        {{ $dep->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Lokasi Rinci</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="lokasi_rinci" id="lokasi_rinci"
                                                value="{{ old('lokasi_rinci', request()->input('lokasi_rinci')) }}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Jenis Insiden</label>
                                        <div class=" w-100">
                                            <select name="jenis_insiden" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Jenis Insiden">
                                                <option value="Pingsan"
                                                    {{ old('jenis_insiden') == 'Pingsan' ? 'selected' : '' }}>Pingsan
                                                </option>
                                                <option value="Serangan Jantung"
                                                    {{ old('jenis_insiden') == 'Serangan Jantung' ? 'selected' : '' }}>
                                                    Serangan Jantung</option>
                                                <option value="Asma"
                                                    {{ old('jenis_insiden') == 'Asma' ? 'selected' : '' }}>Asma</option>
                                                <option value="Pendarahan"
                                                    {{ old('jenis_insiden') == 'Pendarahan' ? 'selected' : '' }}>Pendarahan
                                                </option>
                                                <option value="Keracunan"
                                                    {{ old('jenis_insiden') == 'Keracunan' ? 'selected' : '' }}>Keracunan
                                                </option>
                                                <option value="Cidera"
                                                    {{ old('jenis_insiden') == 'Cidera' ? 'selected' : '' }}>Cidera
                                                </option>
                                                <option value="Lainnya"
                                                    {{ old('jenis_insiden') == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kronologi Kejadian</label>
                                        <div class=" w-100">
                                            <textarea rows="3" class="form-control" name="kronologi" id="kronologi"
                                                value="{{ old('kronologi', request()->input('kronologi')) }}"></textarea>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Penyebab Insiden</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="penyebab_insiden" id="penyebab_insiden"
                                                value="{{ old('penyebab_insiden', request()->input('penyebab_insiden')) }}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Foto Kejadian</label>
                                        <div class=" w-100">
                                            <input type="file" class="form-control" name="gambar" id="gambar"
                                                accept="image/png, image/jpeg">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Status</label>
                                        <div class=" w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input class="form-control bg-secondary" name="status" id="status"
                                                    value="Pending" readonly>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <!-- {{-- Data Pelapor --}} -->
                    <div class="animated fadeIn">

                        <div class="card">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong
                                        style="color: #16243D; font-family: Plus Jakarta Sans, sans-serif; font-size:16px;">Data
                                        Pelapor</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Nama Pelapor</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="nama_pelapor"
                                            value="{{ old('nama_pelapor', request()->input('nama_pelapor')) }}">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputEmail3" class="col-form-label">Email Pelapor</label>
                                    <div class=" w-100">
                                        <input type="email" class="form-control" name="email_pelapor"
                                            value="{{ old('email_pelapor', request()->input('email_pelapor')) }}">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputNomertelepon3" class="col-form-label">No. Telp
                                        Pelapor</label>
                                    <div class=" w-100">
                                        <input type="number" class="form-control" name="nomer_telepon_pelapor"
                                            value="{{ old('nomor_telepon_pelapor', request()->input('nomor_telepon_pelapor')) }}">
                                    </div>
                                </div>

                                {{-- <div class="ps-3 pe-5">
                                    <label for="inputUnit" class="col-form-label">Unit</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="unit_pelapor">
                                    </div>
                                </div> --}}
                                <div class="ps-3 pe-5">
                                    <label for="inputfotokejadian" class="col-form-label">Foto Tanda
                                        Pengenal</label>
                                    <div class=" w-100">
                                        <input type="file" class="form-control" name="tanda_pengenal"
                                            accept="image/png, image/jpeg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="animated fadeIn mt-10 mb-10">
                        <div class="card">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong
                                        style="color: #16243D; font-family: Plus Jakarta Sans, sans-serif; font-size:16px;">Data
                                        Korban
                                        <span style="color:#fc0000">(Apabila tidak mengetahui data korban dapat
                                            dikosongkan)
                                        </span></strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Nama Korban</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="nama_korban"
                                            value="{{ old('nama_korban', request()->input('nama_korban')) }}">

                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputEmail3" class="col-form-label">Email Korban</label>
                                    <div class=" w-100">
                                        <input type="email" class="form-control" name="email_korban"
                                            value="{{ old('email_korban', request()->input('email_korban')) }}">

                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputNomertelepon3" class="col-form-label">No. Telp
                                        Korban</label>
                                    <div class=" w-100">
                                        <input type="number" class="form-control" name="nomer_telepon_korban"
                                            value="{{ old('nomor_telepon_korban', request()->input('nomor_telepon_korban')) }}">
                                    </div>
                                </div>

                                {{-- <div class="ps-3 pe-5">
                                    <label for="inputUnit" class="col-form-label">Unit</label>
                                    <div class=" w-100">
                                        <input type="text" class="form-control" name="unit_korban">
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>


                    <div class="container d-flex justify-content-center">
                        <div class=" d-flex justify-content-center">
                            <button type="submit" id="submitButton"
                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                style="background: #29CC6A;height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan
                                Data</button>
                            <a href="{{ route('laporan-insiden.index') }}" type="submit"
                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                data-bs-toggle="modal" data-bs-target="#resetform"
                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px;height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
                            <div class="modal fade" id="resetform" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">

                                        <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                            <h2 class="mt-5 text-center"
                                                style="color: #16243D; font-size: 20px font-weight:700">Reset data yang
                                                akan dimasukkan?
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
                            </div>
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
    <script>
        // $(document).ready(function() {
        //     $(".tanggalPicker").flatpickr({
        //         altInput: true,
        //         altFormat: "d F Y",
        //         dateFormat: "Y-m-d",
        //         locale: "id"
        //     });
        // });

        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();

            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;
            $('#txtDate').attr('max', maxDate);
        });
        // document.addEventListener('DOMContentLoaded', function() {
        //     const submitButton = document.querySelector('#submitButton');

        //     submitButton.addEventListener('click', function(event) {
        //         event.preventDefault();

        //         Swal.fire({
        //             icon: 'success',
        //             title: 'Berhasil',
        //             text: 'Data Laporan Insiden berhasil disimpan!',
        //             iconHtml: '<i class="bi bi-person-check"></i>',
        //             showCloseButton: true
        //         }).then(function(result) {
        //             if (result.isConfirmed) {
        //                 window.location.href = "{{ route('simk3.index') }}";
        //             }
        //         });
        //     });
        // });
    </script>


@stop
