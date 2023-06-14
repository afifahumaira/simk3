@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Detail User P2K3</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <a href="{{ route('p2k3.index') }}" type="button" class="btn btn-secondary text-white btn-sm mb-2"
                    style="background: #505050"><i class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">

                <tbody>
                    <tr>

                        <th>Nama</th>
                        <td>{{$data->nama}}</td>

                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$data->user->email}}</td>

                    </tr>
                    <tr>
                        <th>Jabatan</th>
                        <td>{{$data->user->hak_akses}}</td>

                    </tr>
                    <tr>

                        <th>Departemen</th>
                        <td>{{$data->departemen}}</td>

                    </tr>

                    <tr>

                        <th>Foto Profil</th>
                        <td><img src="{{asset('/berkas/'. $data->avatar)}}" class="rounded"></td>

                    </tr>
                </tbody>
            </table>

            <!--end::Content container-->
        </div>
    </div>
@stop
