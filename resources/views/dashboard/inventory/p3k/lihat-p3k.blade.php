@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Detail Data P3K</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <a href="{{ route('p3k.index') }}" type="button" class="btn btn-secondary text-white btn-sm mb-2"
                    style="background: #505050"><i class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">

                <tbody>
                    <tr>

                        <th>Kode ID</th>
                        <td>P3K-1</td>

                    </tr>
                    <tr>
                        <th>Nama Benda</th>
                        <td>{{$data->name}}</td>

                    </tr>
                    <tr>
                        <th>Tipe</th>
                        <td>{{$data->tipe}}</td>

                    </tr>
                    <tr>
                        <th>Departemen</th>
                        <td>{{$data->departemen->name}}</td>
                    </tr>
                    <tr>
                        <th>Berat </th>
                        <td>{{$data->berat}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Pergantian Alat P3K</th>
                        <td>{{$data->tanggal_kadaluwarsa}}</td>
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <td>{{$data->lokasi}}</td>
                    </tr>
                    <tr>
                        <th>Kondisi</th>
                        <td>{{$data->kondisi}}</td>
                    </tr>
                    <tr>
                        <th>Foto Benda</th>
                        <td><img src="{{ asset('berkas/' . $data->gambar) }}" alt=""></td>
                    </tr>
                </tbody>
            </table>

            <!--end::Content container-->
        </div>
    </div>
@stop
