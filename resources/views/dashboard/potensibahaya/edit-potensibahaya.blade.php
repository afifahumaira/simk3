@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Edit Data Potensi Bahaya</h2>
                    <a href="{{ route('potensibahaya.index') }}" type="button"
                        class="btn text-white btn-sm btn-secondary d-flex justify-content-center align-items-center mb-2"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background: #505050; width:90px"><i
                            class="bi bi-chevron-left text-white"></i>Kembali</a>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">
                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px; font-weight:700">
                                        keluar dari edit data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang dimasukkan
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
                <div class="page-title  gap-1 mx-5 my-5  ">
                    <form action="{{ route('potensibahaya.editstore', $data['id']) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf


                        <input type="hidden" value="{{ $data->nip_nim }}" name="nip_nim">
                        <div id="kt_app_content"
                            class="app-content flex-column-fluid rounded   mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                            <div class="card ">
                                <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                    <div class="pull-left">
                                        <strong>Data Potensi Bahaya</strong>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label ">Kode Potensi Bahaya</label>
                                        <div class="col-sm-10 w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input class="form-control bg-secondary" name="kode_potensibahaya"
                                                    id="kode_laporinsiden" value="{{ $data->kode_potensibahaya }}" readonly>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group row"> --}}
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Nama Pelapor</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control" name="nama_pelapor" id="lokasi_rinci"
                                                value="{{ $data->nama_pelapor }}">

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email Pelapor</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="email" class="form-control" value="{{ $data->email_pelapor }}"
                                                name="email_pelapor" required>

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputNomertelepon3" class="col-sm-2 col-form-label">NIP/NIM</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="number" class="form-control " value="{{ $data->nip_nim }}"
                                                name="nip_nim">

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputNomertelepon3" class="col-sm-2 col-form-label">No. Telp
                                            Pelapor</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="number" class="form-control "
                                                value="{{ $data->nomer_telepon_pelapor }}" name="nomer_telepon_pelapor">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Foto Tanda Pengenal</label>
                                        <div class=" w-100">
                                            <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                                href="{{ asset('storage/potensi_bahaya/tanda_pengenal/' . $data->tanda_pengenal) }}">
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                    style="background-image:url('{{ asset('storage/potensi_bahaya/tanda_pengenal/' . $data->tanda_pengenal) }}')">
                                                </div>
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                    <i class="bi bi-eye-fill text-white fs-3x"></i>
                                                </div>
                                            </a>
                                            <input type="hidden" class="form-control" name="tanda_pengenal_old"
                                                value="{{ $data->tanda_pengenal }}">
                                            <input type="file" class="form-control mt-3" name="tanda_pengenal"
                                                accept="image/png, image/jpeg">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Status</label>
                                        <div class="w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <select name="status" class="form-select fs-6  w-100"
                                                    data-control="select2" data-hide-search="true"
                                                    data-placeholder="Status" id="status">
                                                    <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>
                                                        Pending
                                                    </option>
                                                    <option value="2" {{ $data->status == 2 ? 'selected' : '' }}>
                                                        Investigasi
                                                    </option>
                                                    <option value="3" {{ $data->status == 3 ? 'selected' : '' }}>
                                                        Sukses
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">P2K3</label>
                                        <div class=" w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <select name="p2k3_id" class="form-select fs-6 w-100"
                                                    data-control="select2" data-hide-search="true"
                                                    data-placeholder="P2K3" required>
                                                    @foreach ($p2k3s as $p2k3)
                                                        <option value="{{ $p2k3->id }}"
                                                            {{ $data->p2k3_id == $p2k3->id ? 'selected' : '' }}>
                                                            {{ $p2k3->nama != '' ? $p2k3->nama : 'Pilih P2K3' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Nama Pelapor</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control" name="nama_pelapor"
                                                id="lokasi_rinci" value="{{ $data->nama_pelapor }}">
                                            <div class="ps-3 pe-5">
                                                <label class="col-sm-2 col-form-label">Tanggal Kejadian</label>
                                                <div class="col-sm-10 w-100">
                                                    <input type="date" id="date" name="waktu_kejadian"
                                                class="form-control tanggalPicker" value="{{ $data->waktu_kejadian }}" placeholder="dd/mm/yyyy" max="<?php echo date('Y-m-d'); ?>">

                                                </div>
                                            </div>


                                            <div class="ps-3 pe-5">
                                                <label class="col-sm-2 col-form-label">Kategori Pelapor</label>
                                                <div class="col-sm-10 w-100">
                                                    <select class="form-select fs-6 w-100" data-control="select2"
                                                        data-hide-search="true" data-placeholder="- Pilih -"
                                                        style="--bs-link-hover-color-rgb: 25, 135, 84;" id=""
                                                        name="kategori_pelapor" style="font-family: 'Inter';">
                                                        <option value="">- Pilih -</option>
                                                        <option value="Dosen"
                                                            {{ $data->kategori_pelapor == 'Dosen' ? 'selected' : '' }}>
                                                            Dosen
                                                        </option>
                                                        <option value="Karyawan"
                                                            {{ $data->kategori_pelapor == 'Karyawan' ? 'selected' : '' }}>
                                                            Karyawan</option>
                                                        <option value="Mahasiswa"
                                                            {{ $data->kategori_pelapor == 'Mahasiswa' ? 'selected' : '' }}>
                                                            Mahasiswa</option>
                                                        <option value="Tamu"
                                                            {{ $data->kategori_pelapor == 'Tamu' ? 'selected' : '' }}>Tamu
                                                        </option>
                                                        <option value="Lainnya"
                                                            {{ $data->kategori_pelapor == 'Lainnya' ? 'selected' : '' }}>
                                                            Lainnya</option>
                                                    </select>

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
                                                <strong>Keterangan</strong>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="ps-3 pe-5">
                                                <label class="col-sm-2 col-form-label">Institusi yang Dikunjungi</label>
                                                <div class="col-sm-10 w-100">
                                                    <input type="text" class="form-control "
                                                        value="{{ $data->institusi }}" name="institusi" readonly>

                                                </div>
                                            </div>

                                            <div class="ps-3 pe-5">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Tujuan</label>
                                                <div class="col-sm-10 w-100">
                                                    <input type="text" class="form-control"
                                                        value="{{ $data->tujuan }}" name="tujuan">

                                                </div>
                                            </div>

                                            <div class="ps-3 pe-5">
                                                <label class="col-form-label">Departemen</label>
                                                <div class=" w-100">
                                                    <select name="departemen_id" class="form-select fs-6 w-100"
                                                        data-control="select2" data-hide-search="true" data-placeholder="departemen_id">
                                                        @foreach ($department as $dep)
                                                            <option value="{{ $dep->id }}"
                                                                {{ $data->departemen_id == $dep->id ? 'selected' : '' }}>
                                                                {{ $dep->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                {{-- <div id="kt_app_content" class="app-content flex-column-fluid rounded bg-light mt-20 mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);" >  --}}
                                <div class="animated fadeIn mt-20 mb-10 ">
                                    <div class="card ">
                                        <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                            <div class="pull-left">
                                                <strong class="d-flex ">Data Potensi Bahaya</p></strong>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="ps-3 pe-5">
                                                <label class="col-sm-2 col-form-label">Unit Civitas Akademika</label>
                                                <div class="col-sm-10 w-100">
                                                    <select class="form-select fs-6 w-100" data-control="select2"
                                                        data-hide-search="true" data-placeholder="- Pilih -"
                                                        data-kt-placement="bottom"
                                                        style="--bs-link-hover-color-rgb: 25, 135, 84;" id=""
                                                        name="unit_civitas_akademika_box" style="font-family: 'Inter';">
                                                        <option value="">- Pilih -</option>
                                                        <option value="Dosen"
                                                            {{ $data->unit_civitas_akademika_box == 'Dosen' ? 'selected' : '' }}>
                                                            Dosen</option>
                                                        <option value="Karyawan"
                                                            {{ $data->unit_civitas_akademika_box == 'Karyawan' ? 'selected' : '' }}>
                                                            Karyawan</option>
                                                        <option value="Mahasiswa"
                                                            {{ $data->unit_civitas_akademika_box == 'Mahasiswa' ? 'selected' : '' }}>
                                                            Mahasiswa</option>
                                                        <option value="Tamu"
                                                            {{ $data->unit_civitas_akademika_box == 'Tamu' ? 'selected' : '' }}>
                                                            Tamu</option>
                                                        <option value="Lainnya"
                                                            {{ $data->unit_civitas_akademika_box == 'Lainnya' ? 'selected' : '' }}>
                                                            Lainnya</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="ps-3 pe-5">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Lokasi</label>
                                                <div class="col-sm-10 w-100">
                                                    <input type="text" class="form-control"
                                                        value="{{ $data->lokasi }}" name="lokasi">

                                                </div>
                                            </div>

                                            <div class="ps-3 pe-5">
                                                <label for="inputNomertelepon3" class="col-sm-2 col-form-label">Potensi
                                                    Bahaya</label>
                                                <div class="col-sm-10 w-100">
                                                    <select class="form-select fs-6 w-100" data-control="select2"
                                                        data-hide-search="true" data-placeholder="- Pilih -"
                                                        data-kt-placement="bottom"
                                                        style="--bs-link-hover-color-rgb: 25, 135, 84;" id=""
                                                        name="potensi_bahaya" style="font-family: 'Inter';">
                                                        <option value="">- Pilih -</option>
                                                        <option value="Fisik"
                                                            {{ $data->potensi_bahaya == 'Fisik' ? 'selected' : '' }}>Fisik
                                                        </option>
                                                        <option value="Kimiawi"
                                                            {{ $data->potensi_bahaya == 'Kimiawi' ? 'selected' : '' }}>
                                                            Kimiawi
                                                        </option>
                                                        <option value="Biologis"
                                                            {{ $data->potensi_bahaya == 'Biologis' ? 'selected' : '' }}>
                                                            Biologis
                                                        </option>
                                                        <option value="Ergonomi"
                                                            {{ $data->potensi_bahaya == 'Ergonomi' ? 'selected' : '' }}>
                                                            Ergonomi
                                                        </option>
                                                        <option value="Psikologi"
                                                            {{ $data->potensi_bahaya == 'Psikologi' ? 'selected' : '' }}>
                                                            Psikologi
                                                        </option>
                                                        <option value="Lainnya"
                                                            {{ $data->potensi_bahaya == 'Lainnya' ? 'selected' : '' }}>
                                                            Lainnya
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="ps-3 pe-5">
                                                <label for="inputUnit" class="col-sm-2 col-form-label">Deskripsi Potensi
                                                    Bahaya</label>
                                                <div class="col-sm-10 w-100">
                                                    <textarea class="form-control" id="kronologi" name="deskripsi_potensi_bahaya">{{ $data->deskripsi_potensi_bahaya }}</textarea>
                                                </div>
                                            </div>
                                            <div class="ps-3 pe-5">
                                                <label for="inputUnit" class="col-sm-2 col-form-label">Resiko
                                                    Bahaya</label>
                                                <div class="col-sm-10 w-100">
                                                    <input type="text" class="form-control "
                                                        value="{{ $data->resiko_bahaya }}" name="resiko_bahaya">
                                                </div>
                                            </div>

                                            <div class="ps-3 pe-5">
                                                <label for="inputUnit" class="col-sm-2 col-form-label">Usulan
                                                    Perbaikan</label>
                                                <div class="col-sm-10 w-100">
                                                    <textarea class="form-control" id="kronologi" name="usulan_perbaikan">{{ $data->usulan_perbaikan }}</textarea>
                                                </div>
                                            </div>
                                            <div class="ps-3 pe-5">
                                                <label class="col-sm-2 col-form-label">Foto Kejadian</label>
                                                <div class="col-sm-10 w-100">
                                                    <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                                        href="{{ asset('storage/potensi_bahaya/gambarkejadian/' . $data->gambar) }}">
                                                        <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                            style="background-image:url('{{ asset('storage/potensi_bahaya/gambarkejadian/' . $data->gambar) }}')">
                                                        </div>
                                                        <div
                                                            class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                            <i class="bi bi-eye-fill text-white fs-3x"></i>
                                                        </div>
                                                    </a>
                                                    <input type="hidden" name="gambar_old" value="{{ $data->gambar }}">
                                                    <input type="file" class="form-control" name=" $data->gambar"
                                                        id="foto_kejadian">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="container d-flex justify-content-center">
                                    <div class=" d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                            style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;"
                                            data-bs-toggle="modal" data-bs-target="#simpandata"
                                            onclick="showDiv()">Simpan
                                            Data
                                        </button>
                                        <a href="{{ route('potensibahaya.edit', $data->id) }}" type="submit"
                                            class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                            data-bs-toggle="modal" data-bs-target="#resetform"
                                            style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
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
                                                            style="color: #16243D; font-size: 20px; font-weight:700">keluar
                                                            dari
                                                            edit
                                                            data?
                                                            <p class="mb-0 mt-2 text-center "
                                                                style="color: #DC3545; font-weight:400; font-size:14px">
                                                                data yang
                                                                dimasukkan belum tersimpan </p>
                                                        </h2>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center border-0">
                                                        <a href="{{ route('potensibahaya.edit', $data->id) }}"
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
            <!--end::Content container-->

        </div>
    </div>
@stop

@section('customscript')
<script>
    // $(document).ready(function() {
    //     $(".tanggalPicker").flatpickr({
    //         altInput: true,
    //         altFormat: "d F Y",
    //         dateFormat: "Y-m-d",
    //         locale: "id"
    //     });
    // });

    $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
    month = '0' + month.toString();
    if(day < 10)
    day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#txtDate').attr('max', maxDate);
});
</script>
@stop
