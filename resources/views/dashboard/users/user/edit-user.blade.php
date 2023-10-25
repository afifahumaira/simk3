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
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px; font-weight:700">
                                        keluar dari edit data?
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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
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

                                    {{-- <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control bg-secondary" name="name"
                                                id="name" value="{{ $data->name }}" readonly>

                                        </div>
                                    </div> --}}

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label ">Nama Pengguna</label>
                                        <div class=" w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input class="form-control" name="name" id="name"
                                                    value="{{ $data->name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label ">Username</label>
                                        <div class=" w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input class="form-control bg-secondary" name="username" id="username"
                                                    value="{{ $data->username }}" readonly>
                                            </div>
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
                                                <option value="{{ $data->hak_akses }}">- Pilih -</option>
                                                <option value="Admin" {{ $data->hak_akses == '1' ? 'selected' : '' }}>
                                                    Admin </option>
                                                <option value="Pimpinan" {{ $data->hak_akses == '2' ? 'selected' : '' }}>
                                                    Pimpinan
                                                </option>
                                                <option value="K3 Departemen"
                                                    {{ $data->hak_akses == '3 ' ? 'selected' : '' }}>K3
                                                    Departemen</option>
                                                <option value="P2K3" {{ $data->hak_akses == '4' ? 'selected' : '' }}>
                                                    P2K3</option>
                                                <option value="Pengguna" {{ $data->hak_akses == '5' ? 'selected' : '' }}>
                                                    Pengguna</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Departemen</label>
                                        <div class="col-sm-10 w-100">
                                            <select name="departemen_id" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="departemen_id">
                                                @foreach ($departemen as $dep)
                                                    <option value="{{ $dep->id }}"
                                                        {{ $data->departemen_id == $dep->id ? 'selected' : '' }}>
                                                        {{ $dep->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    {{-- <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Foto Profil</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="file" class="form-control" name="avatar" id="avatar">
                                        </div>
                                    </div> --}}

                                    {{-- </form> --}}
                            </div>
                        </div>
                    </div>

                    <div class=" d-flex justify-content-center">
                        <button type="submit"
                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                            style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;"
                            data-bs-toggle="modal" data-bs-target="#simpandata" onclick="showDiv()">Simpan
                            Data</button>
                        <a href="{{ route('user.edit', $data->id) }}" type="submit"
                            class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                            data-bs-toggle="modal" data-bs-target="#resetform"
                            style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
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
                                            style="color: #16243D; font-size: 20px; font-weight:700">
                                            Reset data
                                            yang
                                            akan dimasukkan?
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
                                            data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-danger text-white d-flex align-items-center justify-content-center"
                            data-bs-toggle="modal" data-bs-target="#resetpw"
                            style="background: #DC3545; margin : 10px 20px 30px 20px;  height: 38px; font-size:14px; border-radius: 5px;">Reset
                            Password</button>
                        <div class="modal fade" role="dialog" id="resetpw" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    {{-- <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div> --}}
                                    <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                        <h2 class="mt-5 text-center"
                                            style="color: #16243D; font-size: 20px; font-weight:700">
                                            Yakin ingin mereset password pengguna?
                                            <p class="mb-0 mt-2 text-center "
                                                style="color: #DC3545; font-weight:400; font-size:14px"> Password akun akan
                                                berubah </p>
                                        </h2>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center border-0">
                                        <form action="{{ route('user.reset', $data->id) }}" method="post">
                                            @csrf
                                            <div class="d-flex justify-content-between">
                                                <button type="submit"
                                                    class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1 pr-2"
                                                    style="width:76px; height:31px; background: #29CC6A;">Ya</button>
                                                <button type="button" data-bs-dismiss="modal"
                                                    class="btn btn-secondary text-center d-flex align-items-center rounded-1 pl-2"
                                                    data-bs-dismiss="modal"
                                                    style="width:76px; height:31px; ">Tidak</button>
                                            </div>
                                            {{-- <input type="hidden" value=""> --}}
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content container-->
            </form>
        </div>
    </div>
@stop
