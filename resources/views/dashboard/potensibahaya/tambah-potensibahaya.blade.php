@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">
        <form action="{{ route('potensibahaya.tambah') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
                <div id="kt_app_content" class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                    <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                        <!--begin::Page title-->
                        <h2>Tambah Data Potensi Bahaya</h2>
                        <a href="{{ route('potensibahaya.index') }}" type="button"
                            class="btn text-white btn-sm btn-secondary d-flex justify-content-center align-items-center mb-2"
                            data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            style="background: #505050; width:90px"><i class="bi bi-chevron-left text-white"></i>Kembali</a>
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div> --}}
                                    <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                        <h2 class="mt-5 text-center"
                                            style="color: #16243D; font-size: 20px; font-weight:700">
                                            keluar dari tambah data?
                                            <p class="mb-0 mt-2 text-center "
                                                style="color: #DC3545; font-weight:400; font-size:14px"> data yang
                                                dimasukkan
                                                belum tersimpan </p>
                                        </h2>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center border-0">
                                        <a href="{{ route('potensibahaya.index') }}" type="button"
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
                    <div class="page-title  gap-1 mx-5 mb-5">
                        <div id="kt_app_content"
                            class="app-content flex-column-fluid rounded   mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">

                            <div class="card ">
                                <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                    <div class="pull-left">
                                        <strong>Data Potensi Bahya</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label ">Kode Potensi Bahaya</label>
                                    <div class="col-sm-10 w-100">
                                        <div class="form-group  label-floating is-empty is-focused">
                                            <input class="form-control bg-secondary" name="kode_potensibahaya"
                                                id="kode_potensibahaya" value="{{ $kode }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label">Nama Pelapor</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="text" class="form-control" name="nama_pelapor" id="lokasi_rinci"
                                            value="{{ old('nama_pelapor') }}">

                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email Pelapor</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="email" class="form-control" name="email_pelapor" value="{{ old('email_pelapor') }}">

                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputNomertelepon3" class="col-sm-2 col-form-label">NIP/NIM</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="number" class="form-control " name="nip_nim" value="{{ old('nip_nim') }}">

                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputNomertelepon3" class="col-sm-2 col-form-label">No. Telp
                                        Pelapor</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="number" class="form-control " name="nomer_telepon_pelapor" value="{{ old('nomer_telepon_pelapor') }}">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label">Foto Tanda Pengenal</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="file" class="form-control" name="tanda_pengenal" id="tanda_pengenal" accept="image/png, image/jpeg">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label">Tanggal Kejadian</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="date" id="date" class="form-control tanggalPicker" name="waktu_kejadian">

                                    </div>
                                </div>


                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label">Kategori Pelapor</label>
                                    <div class="col-sm-10 w-100">
                                        <select class="form-select fs-6 w-100" data-kt-placement="bottom"
                                            data-control="select2" data-hide-search="true"
                                            data-placeholder="- Pilih -"
                                            style="--bs-link-hover-color-rgb: 25, 135, 84;" id=""
                                            name="kategori_pelapor" style="font-family: 'Inter';">
                                            <option value="">- Pilih -</option>
                                            <option value="Dosen">Dosen</option>
                                            <option value="Karyawan">Karyawan</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option value="Tamu">Tamu</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- {{-- Data Pelapor --}} -->
                    <div class="animated fadeIn mx-5 mb-5">
                        <div class="card">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong>Keterangan</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label">Institusi yang Dikunjungi</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="text" class="form-control" name="institusi" value="Fakultas Teknik">

                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tujuan</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="text" class="form-control" name="tujuan">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="animated fadeIn mx-5 mb-10 ">
                        <div class="card ">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong class="d-flex ">Data Potensi Bahaya</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label">Unit Civitas Akademika</label>
                                    <div class="col-sm-10 w-100">
                                        <select class="form-select fs-6 w-100" data-control="select2"
                                            data-hide-search="true" data-placeholder="- Pilih -"
                                            data-kt-placement="bottom" style="--bs-link-hover-color-rgb: 25, 135, 84;"
                                            id="" name="unit_civitas_akademika_box"
                                            style="font-family: 'Inter';">
                                            <option value="">- Pilih -</option>
                                            <option value="Dosen">Dosen</option>
                                            <option value="Karyawan">Karyawan</option>
                                            <option value="Mahasiswa">Mahasiswa</option>
                                            <option value="Tamu">Tamu</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="text" class="form-control" name="lokasi">

                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputNomertelepon3" class="col-sm-2 col-form-label">Potensi
                                        Bahaya</label>
                                    <div class="col-sm-10 w-100">
                                        <select class="form-select fs-6 w-100" data-control="select2"
                                            data-hide-search="true" data-placeholder="- Pilih -"
                                            data-kt-placement="bottom" style="--bs-link-hover-color-rgb: 25, 135, 84;"
                                            id="" name="potensi_bahaya" style="font-family: 'Inter';">
                                            <option value="">- Pilih -</option>
                                            <option value="Fisik">Fisik</option>
                                            <option value="Kimiawi">Kimiawi</option>
                                            <option value="Biologis">Biologis</option>
                                            <option value="Ergonomi">Ergonomi</option>
                                            <option value="Psikologi">Psikologi</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="ps-3 pe-5">
                                    <label for="inputUnit" class="col-sm-2 col-form-label">Deskripsi Potensi
                                        Bahaya</label>
                                    <div class="col-sm-10 w-100">
                                        <textarea class="form-control" id="kronologi" name="deskripsi_potensi_bahaya"></textarea>
                                    </div>
                                </div>
                                <div class="ps-3 pe-5">
                                    <label for="inputUnit" class="col-sm-2 col-form-label">Resiko
                                        Bahaya</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="text" class="form-control " name="resiko_bahaya">
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label for="inputUnit" class="col-sm-2 col-form-label">Usulan
                                        Perbaikan</label>
                                    <div class="col-sm-10 w-100">
                                        <textarea class="form-control" id="kronologi" name="usulan_perbaikan"></textarea>
                                    </div>
                                </div>
                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label">Foto Kejadian</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="file" class="form-control" name="gambar" id="gambar" accept="image/png, image/jpeg">

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
                    <div class="container d-flex justify-content-center">
                        <div class=" d-flex justify-content-center">
                            <button type="submit"
                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan Data</button>
                            <a href="{{ route('potensibahaya.tambah') }}" type="submit"
                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                data-bs-toggle="modal" data-bs-target="#resetform"
                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
                            <div class="modal fade" id="resetform" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">

                                        <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                            <h2 class="mt-5 text-center"
                                                style="color: #16243D; font-size: 20px; font-weight:700">
                                                Reset data yang akan di masukkan?
                                                <p class="mb-0 mt-2 text-center "
                                                    style="color: #DC3545; font-weight:400; font-size:14px">
                                                    data yang
                                                    dimasukkan belum tersimpan </p>
                                            </h2>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center border-0">
                                            <a href="{{ route('potensibahaya.tambah') }}" type="button"
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
            </div>
        </form>
    </div>
    <!--end::Content container-->

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
