@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Detail Users</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <a href="{{ route('user.index') }}" type="button" class="btn btn-secondary text-white btn-sm mb-2"
                    style="background: #505050"><i class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">
                <tbody>
                <tr>

                    <th>Nama</th>
                    <td>{{$data->name}}</td>

                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$data->email}}</td>

                </tr>
                <tr>
                    <th>Jabatan</th>
                    <td>{{$data->hak_akses}}</td>

                </tr>
                <tr>

                    <th>Departemen</th>
                    @if($data->departemen_id != null)
                    <td>{{$data->departemen->name}}</td>
                    @endif
                    {{-- @if ($data->p2k3 != null)
                    <td>{{$data->p2k3->departemen}}</td>
                    @endif --}}
                </tr>

                <tr>

                    <th>Foto Profil</th>
                    <td><img src="{{ asset('berkas/' . $data->avatar) }}" style="width:auto; height:55px;" class="rounded"></td>

                </tr>
                </tbody>

                    {{-- <tr>

                <th>Foto Benda</th>
                <td><img src="https://laravel.com/img/logomark.min.svg" class="rounded"></td>

              </tr> --}}
            </table>

            <!--end::Content container-->
        </div>
    </div>
@stop
