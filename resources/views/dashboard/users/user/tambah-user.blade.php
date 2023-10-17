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
                        style="background: #505050; "><i class="bi bi-chevron-left text-white"></i>Kembali</a>
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
                                <form class="lh-lg">
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
                                            <input type="text" class="form-control" name="lokasi_rinci" id="lokasi_rinci"
                                                value="">

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label ">Email</label>
                                        <div class="col-sm-10 w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input class="form-control " type="email" value="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label ">Password</label>
                                        <div class="col-sm-10 w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input id="password" type="password" placeholder="Password" name="password"
                                                    required autocomplete="new-password" class="form-control ">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Role</label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="-Pilih-"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" id=""
                                                style="font-family: Arial, Helvetica, sans-serif;">
                                                <option value="">- Pilih -</option>
                                                <option value="*">Admin </option>
                                                <option value="* ">Pimpinan </option>
                                                <option value="*">K3 Departemen</option>
                                                <option value="*">P2K3</option>
                                                <option value="*">Tamu</option>

                                            </select>

                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Departemen</label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="-Pilih-"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" id=""
                                                style="font-family: Arial, Helvetica, sans-serif;">
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
                                        <label class="col-sm-2 col-form-label">Foto Profil</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="file" class="form-control" name="gambar" id="gambar">

                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="container d-flex justify-content-center">
                        <div>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                            <a style="margin: 30px" href="{{ route('user.tambah') }}" class="btn btn-secondary"
                                type="reset"> Reset
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content container-->

        </div>
    </div>
@stop
