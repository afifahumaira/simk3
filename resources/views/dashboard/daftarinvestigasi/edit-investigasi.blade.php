@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Edit Data Investigasi Laporan Insiden</h2>
                    <a href="{{ route('daftarinvestigasi.index') }}" type="button"
                        class="btn text-white btn-secondary btn-sm d-flex justify-content-center align-items-center mb-2"
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
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px font-weight:700">
                                        keluar dari edit data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang dimasukkan
                                            belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('daftarinvestigasi.index') }}" type="button"
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
                    <div class="card ">
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
                            <form class="lh-lg" method="POST"
                                action="{{ route('daftarinvestigasi.update', $investigasi->laporinsiden_id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                {{-- <div class="ps-3 pe-5">
                                        <label class="col-form-label">P2K3</label>
                                        <div class=" w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <select name="p2k3_id" class="form-select fs-6 w-100" data-control="select2"
                                                    data-hide-search="true" data-placeholder="P2K3" required>
                                                    @foreach ($p2k3s as $p2k3)
                                                        <option value="{{ $p2k3->id }}"
                                                            {{ $investigasi->p2k3_id == $p2k3->id ? 'selected' : '' }}>
                                                            {{ $p2k3->nama != '' ? $p2k3->nama : 'Pilih P2K3' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Laporan Insiden ID</label>
                                    <div class=" w-100">
                                        <input class="form-control bg-secondary" name="laporinsiden_id" id="laporinsiden_id"
                                            value="{{ $investigasi->laporinsiden_id }}" readonly>
                                    </div>
                                </div>

                                <div class="ps-3 pe-5">
                                    <label class="col-form-label">Departemen</label>
                                    <div class=" w-100">
                                        <select name="departemen_id" class="form-select fs-6 w-100" data-control="select2"
                                            data-hide-search="true" data-placeholder="Lokasi">
                                            @foreach ($departemen as $dep)
                                                <option value="{{ $dep->id }}"
                                                    {{ $investigasi->departemen_id == $dep->id ? 'selected' : '' }}>
                                                    {{ $dep->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label">Lokasi</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="text" class="form-control" name="lokasi" id="lokasi"
                                            value="{{ $investigasi->lokasi }}">

                                    </div>
                                </div>
                                <div class="ps-3 pe-5">
                                    <label class="col-form-label ">Kategori</label>
                                    <div class=" w-100">
                                        <div class="form-group label-floating is-empty is-focused">
                                            <input class="form-control bg-secondary" name="kategori" id="kategori"
                                                value="{{ $investigasi->kategori }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label">Penyebab Langsung</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="text" class="form-control" name="penyebab_langsung"
                                            id="penyebab_langsung" value="{{ $investigasi->penyebab_langsung }}">

                                    </div>
                                </div>
                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label">Penyebab Tidak Langsung</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="text" class="form-control" name="penyebab_tidak_langsung"
                                            id="penyebab_tidak_langsung"
                                            value="{{ $investigasi->penyebab_tidak_langsung }}">

                                    </div>
                                </div>
                                <div class="ps-3 pe-5">
                                    <label class="col-sm-2 col-form-label">Penyebab Dasar</label>
                                    <div class="col-sm-10 w-100">
                                        <input type="text" class="form-control" name="penyebab_dasar"
                                            id="penyebab_dasar" value="{{ $investigasi->penyebab_dasar }}" readonly>

                                    </div>
                                </div>
                        </div>
                    </div>

                    <div class="card mt-10">
                        <div class="card-header d-flex align-items-center fs-3 fw-normal">
                            <div class="pull-left">
                                <strong>Kontrol Perbaikan</strong>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="ps-3 pe-5">
                                <label class="col-sm-2 col-form-label">Tenggat Waktu</label>
                                <div class="col-sm-10 w-100">
                                    <input type="date" id="date" name="tenggat_waktu"
                                        class="form-control tanggalPicker" value="<?php echo date('Y-m-d', strtotime($investigasi['tenggat_waktu'])); ?>"
                                        placeholder="dd/mm/yyyy" min="<?php echo date('Y-m-d'); ?>">
                                </div>
                            </div>
                            <div class="ps-3 pe-5">
                                <label class="col-sm-2 col-form-label">Tindakan</label>
                                <div class="col-sm-10 w-100">
                                    <input type="text" class="form-control" name="tindakan" id="tindakan"
                                        value="{{ $investigasi->tindakan }}">
                                </div>
                            </div>

                            <div class="ps-3 pe-5">
                                <label class="col-sm-2 col-form-label ">P2K3</label>
                                <div class="col-sm-10 w-100">
                                    <div class="form-group label-floating is-empty is-focused">
                                        <select name="p2k3_id" class="form-select fs-6 w-100" data-control="select2"
                                            data-hide-search="true" data-placeholder="P2K3" required>
                                            @foreach ($p2k3s as $p2k3)
                                                <option value="{{ $p2k3->id }}"
                                                    {{ $investigasi->p2k3_id == $p2k3->id ? 'selected' : '' }}>
                                                    {{ $p2k3->nama != '' ? $p2k3->nama : 'Pilih P2K3' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-10">
                        <div class="card-body pt-5">
                            <div class="ps-3 pe-5">
                                <label class="col-form-label">Status Investigasi</label>
                                <div class="w-100">
                                    <div class="form-group label-floating is-empty is-focused">
                                        <select name="status" class="form-select fs-6  w-100" data-control="select2"
                                            data-hide-search="true" data-placeholder="Status" id="status">

                                            <option value="2" {{ $investigasi->status == 2 ? 'selected' : '' }}>
                                                Investigasi
                                            </option>
                                            <option value="3" {{ $investigasi->status == 3 ? 'selected' : '' }}>
                                                Tuntas
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="container d-flex justify-content-center">
                    <div class=" d-flex justify-content-center">
                        <button type="submit" id="simpanData"
                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                            style="background: #29CC6A;height: 45px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan
                            Data</button>

                        {{-- <a href="{{ route('daftarinvestigasi.index') }}" type="submit"
                            class="btn btn-primary text-white d-flex align-items-center justify-content-center"
                            data-bs-toggle="modal" data-bs-target="#tuntasInves"
                            style=" margin : 10px 20px 30px 20px; width: 124.33px;height: 45px; font-size:14px; border-radius: 5px;">Tuntaskan
                            Investigasi</a> --}}
                        {{-- Modal Tuntaskan Invest --}}
                        <div class="modal fade" id="tuntasInves" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div> --}}
                                    <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                        <h2 class="mt-5 text-center"
                                            style="color: #16243D; font-size: 20px font-weight:700">Anda yakin ingin
                                            menuntaskan investigasi?
                                            <p class="mb-0 mt-3 text-center "
                                                style="color: #DC3545; font-weight:400; font-size:14px"> Status investigasi
                                                akan berubah menjadi tuntas dan Investigasi diselesaikan </p>
                                        </h2>
                                    </div>
                                    <div class="modal-footer pt-0 d-flex justify-content-center border-0">
                                        <button type="submit" id="simpanData"
                                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                            style="background: #29CC6A;width:76px; height:31px;">Ya
                                        </button>
                                        <button type="button"
                                            class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                            data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End Modal Tuntaskan Invest --}}
                        <a href="{{ route('daftarinvestigasi.index') }}" type="submit"
                            class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                            data-bs-toggle="modal" data-bs-target="#resetform"
                            style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px;height: 45px; font-size:14px; border-radius: 5px;">Reset</a>
                        <div class="modal fade" id="resetform" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div> --}}
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
                                        <a href="{{ route('daftarinvestigasi.ubah', $investigasi->id) }}" type="button"
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

                {{-- </div> --}}
                <!--end::Content container-->
            </div>
        </div>
    </div>
    </div>
@stop

@section('customscript')
    <script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#status').on('change', function() {
                if ($(this).val() === '3') {
                    $('#simpanData').prop('type', 'button');
                    $('#simpanData').attr('data-bs-toggle', 'modal');
                    $('#simpanData').attr('data-bs-target', '#tuntasInves');
                } else {
                    $('#simpanData').prop('type', 'submit');
                    $('#simpanData').removeAttr('data-bs-toggle');
                    $('#simpanData').removeAttr('data-bs-target');
                }
            });
        });
    </script>
@stop
