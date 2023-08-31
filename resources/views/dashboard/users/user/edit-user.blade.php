@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Data User</h2>
                    <a href="{{ route('user.index') }}" type="button"
                        class="btn  btn-sm btn-secondary text-white d-flex justify-content-center align-items-center mb-2"
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
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px; font-weight:700">
                                        keluar dari tambah data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang dimasukkan
                                            belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('user.index') }}" type="button"
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
                                    <strong>Edit Data Users</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="lh-lg" action="{{ route('user.update', $data->id) }}"
                                    enctype="multipart/form-data" method="post">
                                    @csrf
                                    {{-- <div class="ps-3 pe-5">
                  <label class="col-sm-2 col-form-label ">Kode ID</label>
                  <div class="col-sm-10 w-100">
                  <div class="form-group label-floating is-empty is-focused">
                  <input class="form-control bg-secondary" name="kode_laporinsiden" id="kode_apar" value="ID NUMBER" readonly>
                  </div>
                  </div>
              </div> --}}

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control bg-secondary" name="lokasi_rinci"
                                                id="lokasi_rinci" value="{{ $data->name }}" readonly>

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label ">Email</label>
                                        <div class="col-sm-10 w-100 ">
                                            <div class="form-group label-floating is-empty is-focused ">
                                                <input class="form-control bg-secondary " type="email"
                                                    value="{{ $data->email }}" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Role</label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="-Pilih-" name="hak_akses"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" id="hak_akses"
                                                style="font-family: 'Inter';">
                                                <option value="">- Pilih -</option>
                                                <option value="1" {{ $data->hak_akses == 'Admin' ? 'selected' : '' }}>
                                                    Admin </option>
                                                <option value="2"
                                                    {{ $data->hak_akses == 'Pimpinan' ? 'selected' : '' }}>Pimpinan
                                                </option>
                                                <option value="3"
                                                    {{ $data->hak_akses == 'K3 Departemen' ? 'selected' : '' }}>K3
                                                    Departemen</option>
                                                <option value="4" {{ $data->hak_akses == 'P2K3' ? 'selected' : '' }}>
                                                    P2K3</option>
                                                <option value="5" {{ $data->hak_akses == 'Tamu' ? 'selected' : '' }}>
                                                    Tamu</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Departemen</label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="Departemen"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" id="departemen_id"
                                                style="font-family: 'Inter';" name="departemen_id">
                                                <option value="">- Pilih -</option>
                                                <option value="1" {{ $data->departemen_id == 1 ? 'selected' : '' }}>
                                                    Teknik Sipil</option>
                                                <option value="2" {{ $data->departemen_id == 2 ? 'selected' : '' }}>
                                                    Teknik Arsitektur</option>
                                                <option value="3" {{ $data->departemen_id == 3 ? 'selected' : '' }}>
                                                    Teknik Kimia</option>
                                                <option value="4" {{ $data->departemen_id == 4 ? 'selected' : '' }}>
                                                    Teknik Perencanaan Wilayah dan Kota</option>
                                                <option value="5" {{ $data->departemen_id == 5 ? 'selected' : '' }}>
                                                    Teknik Mesin</option>
                                                <option value="6" {{ $data->departemen_id == 6 ? 'selected' : '' }}>
                                                    Teknik Elektro</option>
                                                <option value="7" {{ $data->departemen_id == 7 ? 'selected' : '' }}>
                                                    Teknik Industri</option>
                                                <option value="8" {{ $data->departemen_id == 8 ? 'selected' : '' }}>
                                                    Teknik Lingkungan</option>
                                                <option value="9" {{ $data->departemen_id == 9 ? 'selected' : '' }}>
                                                    Teknik Perkapalan</option>
                                                <option value="10" {{ $data->departemen_id == 10 ? 'selected' : '' }}>
                                                    Teknik Geologi</option>
                                                <option value="11" {{ $data->departemen_id == 11 ? 'selected' : '' }}>
                                                    Teknik Geodesi</option>
                                                <option value="12" {{ $data->departemen_id == 12 ? 'selected' : '' }}>
                                                    Teknik Komputer</option>
                                                <option value="13" {{ $data->departemen_id == 13 ? 'selected' : '' }}>
                                                    Dekanat FT</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Foto Profil</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="file" class="form-control" name="avatar" id="avatar">
                                        </div>
                                    </div>
                                    <div class=" d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                            style="background: #29CC6A;
        height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;"
                                            data-bs-toggle="modal" data-bs-target="#simpandata"
                                            onclick="showDiv()">Simpan Data</button>
                                        <a href="{{ route('user.edit', $data->id) }}" type="submit"
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
                                                            style="color: #16243D; font-size: 20px; font-weight:700">
                                                            keluar dari
                                                            edit
                                                            data?
                                                            <p class="mb-0 mt-2 text-center "
                                                                style="color: #DC3545; font-weight:400; font-size:14px">
                                                                data yang
                                                                dimasukkan belum tersimpan </p>
                                                        </h2>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-center border-0">
                                                        <a href="{{ route('user.edit', $data->id) }}" type="button"
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
                                </form>
                            </div>
                        </div>
                    </div>

                    {{--                    <div class="container d-flex justify-content-center"> --}}
                    {{--                        <div class=" d-flex justify-content-center"> --}}
                    {{--                            <button type="submit" --}}
                    {{--                                class="btn btn-success text-white d-flex justify-content-center align-items-center " --}}
                    {{--                                style="background: #29CC6A; --}}
                    {{--            height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;" --}}
                    {{--                                data-bs-toggle="modal" data-bs-target="#simpandata" onclick="showDiv()">Simpan --}}
                    {{--                                Data</button> --}}
                    {{--                            <div class="modal fade" id="simpandata" data-bs-keyboard="false" tabindex="-1" --}}
                    {{--                                aria-labelledby="staticBackdropLabel" aria-hidden="true"> --}}
                    {{--                                <div class="modal-dialog modal-dialog-centered "> --}}
                    {{--                                    <div class="modal-content"> --}}
                    {{--                                        --}}{{-- <div class="modal-header"> --}}
                    {{--                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> --}}
                    {{--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    {{--                  </div> --}}
                    {{--                                        <div class="modal-body mt-5 "> --}}
                    {{--                                            <div class="d-flex justify-content-center align-items-center"> --}}
                    {{--                                                <i class="bi bi-person-check text-center" --}}
                    {{--                                                    style="font-size: 60px; color:#16243D"></i> --}}
                    {{--                                            </div> --}}
                    {{--                                            <p class="mb-0 mt-2 text-center " --}}
                    {{--                                                style="color: #16243D; font-weight:400; font-size:14px"> Data berhasil --}}
                    {{--                                                diperbaharui! </p> --}}
                    {{--                                        </div> --}}

                    {{--                                    </div> --}}
                    {{--                                </div> --}}
                    {{--                            </div> --}}
                    {{--                            <a href="{{ route('user.edit', $data->id) }}" type="submit" --}}
                    {{--                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center" --}}
                    {{--                                data-bs-toggle="modal" data-bs-target="#resetform" --}}
                    {{--                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; --}}
                    {{--            height: 38px; font-size:14px; border-radius: 5px;">Reset</a> --}}
                    {{--                            <div class="modal fade" id="resetform" data-bs-backdrop="static" data-bs-keyboard="false" --}}
                    {{--                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true"> --}}
                    {{--                                <div class="modal-dialog modal-dialog-centered "> --}}
                    {{--                                    <div class="modal-content"> --}}
                    {{--                                        --}}{{-- <div class="modal-header"> --}}
                    {{--                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> --}}
                    {{--                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    {{--                                  </div> --}}
                    {{--                                        <div class="modal-body mt-5 d-flex justify-content-center align-items-center"> --}}
                    {{--                                            <h2 class="mt-5 text-center" --}}
                    {{--                                                style="color: #16243D; font-size: 20px font-weight:700">keluar dari edit --}}
                    {{--                                                data? --}}
                    {{--                                                <p class="mb-0 mt-2 text-center " --}}
                    {{--                                                    style="color: #DC3545; font-weight:400; font-size:14px"> data yang --}}
                    {{--                                                    dimasukkan belum tersimpan </p> --}}
                    {{--                                            </h2> --}}
                    {{--                                        </div> --}}
                    {{--                                        <div class="modal-footer d-flex justify-content-center border-0"> --}}
                    {{--                                            <a href="{{ route('user.edit', $data->id) }}" type="button" --}}
                    {{--                                                class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1" --}}
                    {{--                                                style="width:76px; height:31px; background: #29CC6A;">Ya</a> --}}
                    {{--                                            <button type="button" --}}
                    {{--                                                class="btn btn-secondary text-center d-flex align-items-center rounded-1" --}}
                    {{--                                                data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button> --}}

                    {{--                                        </div> --}}
                    {{--                                    </div> --}}
                    {{--                                </div> --}}
                    {{--                            </div> --}}
                    {{--                        </div> --}}
                    {{--                    </div> --}}
                </div>
            </div>
            <!--end::Content container-->

        </div>
    </div>
@stop
