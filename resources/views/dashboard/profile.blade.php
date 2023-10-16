@extends ('layouts.layout')

@section('custom-css')
    <style>
        .page-title,
        .page-title .app-toolbar-wrapper button,
        .page-title .modal .modal-body,
        .page-title .modal .modal-body form input {
            font-size: 16px !important;
        }
    </style>
@stop
@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Profile Anda</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <div>
                    <a href="{{ route('dashboard') }}" type="button" class="btn btn-secondary text-white btn-sm mb-2 mr-2"
                        style="background: #505050"><i class="bi bi-chevron-left text-white mb-1"></i>Kembali</a>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModalCenter"
                        class="btn btn-secondary bg-primary text-white btn-sm mb-2"><i
                            class="bi bi-pencil-square text-white  mb-1"></i>Edit Profile</button>
                </div>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->

            <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">
                <tbody>
                    <tr>
                        <th class="">Nama</th>
                        <td> {{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <th class="">Email</th>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <th class="">Jabatan</th>
                        <td>
                            {{ Auth::user()->hak_akses }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <!--Edit Modal-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" data-bs-backdrop="static" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLongTitle">Ubah Data Profile</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ Auth::user()->id }}" name="id" id="id">
                                <div class="container">
                                    <div class="mb-3">
                                        <label class="form-labels">Nama</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ Auth::user()->name }}">
                                    </div>
                                    <div class="my-5">
                                        <label class="form-labels">Email</label>
                                        <input type="text" class="form-control" name="email" id="email"
                                            value="{{ Auth::user()->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-labels">Password Terbaru* (Wajib Di Isi)</label>
                                        <input type="password" class="form-control" name="password" id="password">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" style="background: #505050" class="btn text-white"
                                        data-bs-dismiss="modal">Kembali</button>
                                    <button type="submit" style="background: #29CC6A"
                                        class="btn text-white">Simpan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!--END Modal-->


            <!--end::Content container-->
        </div>
    </div>
@stop
