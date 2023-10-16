@extends ('layouts.layout')

@section('content')

    @include('layouts.alerts')

    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Tambah Data Investigasi Laporan Potensi Bahaya</h2>
                    <a href="{{ route('investigasipotensi.index') }}" type="button"
                        class="btn btn-secondary text-white btn-sm d-flex justify-content-center align-items-center mb-2"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background: #505050; "><i
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
                                    <h2 class="mt-5" style="color: #16243D; font-size: 20px font-weight:700">keluar dari
                                        tambah data insiden?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang dimasukkan
                                            belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('investigasipotensi.index') }}" type="button"
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
                <form class="lh-lg" method="POST" action="{{ route('investigasipotensi.simpan') }}">
                    @csrf
                    <input type="hidden" name="potensibahaya_id" value="{{ $lap->id }}">
                    <input type="hidden" name="departemen_id" value="{{ $lap->departemen_id }}">
                    <div class="page-title  gap-1 mx-5 my-5  ">
                        <div class="card">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong>Data Kejadian</strong>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label ">Lokasi Kejadian Pelapor</label>
                                    <div class="col-sm-10 w-100">
                                        <div class="form-group label-floating is-empty is-focused">
                                            <input class="form-control bg-secondary" name="lokasi" id="lokasi"
                                                value="{{ $lap->lokasi }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label ">Potensi Bahaya</label>
                                    <div class="col-sm-10 w-100">
                                        <div class="form-group label-floating is-empty is-focused">
                                            <input class="form-control bg-secondary" name="potensi_bahaya"
                                                id="potensi_bahaya" value="{{ $lap->potensi_bahaya }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label ">Risiko</label>
                                    <div class="col-sm-10 w-100">
                                        <div class="form-group label-floating is-empty is-focused">
                                            <input class="form-control bg-secondary" name="risiko" id="risiko"
                                                value="{{ $lap->risiko }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label ">Usulan</label>
                                    <div class="col-sm-10 w-100">
                                        <div class="form-group label-floating is-empty is-focused">
                                            <input class="form-control bg-secondary" name="usulan" id="usulan"
                                                value="{{ $lap->usulan }}" readonly>
                                        </div>
                                    </div>
                                </div>

                                <!-- {{-- Data Pelapor --}} -->

                                <div class="card">
                                    <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                        <div class="pull-left">
                                            <strong>Kontrol Perbaikan</strong>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Tindakan</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control" name="tindakan">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label ">P2K3</label>
                                        <div class="col-sm-10 w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input type="hidden" class="form-control bg-secondary" name="p2k3_id"
                                                    value="{{ $lap->p2k3_id }}">
                                                <input class="form-control bg-secondary" name="p2k3"
                                                    value="{{ $lap->p2k3->nama }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="ps-3 pe-5">
                                            <label class="col-sm-2 col-form-label ">Tenggat Waktu</label>
                                            <div class="col-sm-10 w-100">
                                                <div class="form-group">
                                                    <input class="form-control tanggalPicker" name="tenggat_waktu"
                                                        id="tenggat_waktu">
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
                                        style="background: #29CC6A;height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan
                                        Data</button>
                                    <a href="{{ route('investigasipotensi.tambah', $lap->id) }}"
                                        class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal" data-bs-target="#resetform"
                                        style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px;height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
                                    <div class="modal fade" id="resetform" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content">
                                                {{-- <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div> --}}
                                                <div
                                                    class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                                    <h2 class="mt-5 text-center"
                                                        style="color: #16243D; font-size: 20px font-weight:700">Reset data
                                                        yang
                                                        akan dimasukkan?
                                                        <p class="mb-0 mt-2 text-center "
                                                            style="color: #DC3545; font-weight:400; font-size:14px"> data
                                                            yang
                                                            dimasukkan belum tersimpan </p>
                                                    </h2>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center border-0">
                                                    <a href="{{ route('investigasipotensi.tambah', $lap->id) }}"
                                                        type="button"
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
                </form>
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
