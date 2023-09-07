@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Detail Data HIRARC</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <a href="{{ route('hirarc.index') }} " type="button" class="btn btn-secondary text-white btn-sm mb-2"
                    style="background: #505050"><i class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <div class="content card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">
                        
                            <tr>
                                <th>Departemen</th>
                                <td>{{ $hirarcs->departemen->name }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>{{ $hirarcs->location->name }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pelapor</th>
                                <td>{{ $hirarcs->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lapor</th>
                                <td>{{ $hirarcs->created_at ? $hirarcs->created_at->translatedFormat('d F Y') : '' }}</td>
                            </tr>
                        
                    </table>

                    <table class="table table-bordered border-secondary px-3 py-3 mb-5 shadow mt-10">
                        <thead>
                            <tr>
                                <th scope="col">Aktifitas</th>
                                <th scope="col">Hazard</th>
                                <th scope="col">Resiko</th>
                                <th scope="col">Kesesuaian Dengan Aturan</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Pengendalian</th>
                                <th scope="col">Keparahan Saat Ini</th>
                                <th scope="col">Paparan Saat Ini</th>
                                <th scope="col">Probabilitas Kejadian Saat Ini</th>
                                <th scope="col">Tingkat Resiko Saat Ini</th>
                                <th scope="col">Kategori Saat Ini</th>
                                <th scope="col">Penyebab Utama</th>
                                <th scope="col">Usulan</th>
                                <th scope="col">Formulir yang Dibutuhkan</th>
                                <th scope="col">SOP yang Dibutuhkan</th>
                                <th scope="col">Keparahan Residual</th>
                                <th scope="col">Paparan Residual</th>
                                <th scope="col">Probabilitas Residual</th>
                                <th scope="col">Tingkat Resiko Residual</th>
                                <th scope="col">Kategori Residual</th>
                                <th scope="col">Penanggung Jawab</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($hirarcs as $hirarc)
                            @php
                            dd( $hirarc );
                            @endphp --}}
                                <tr>
                                    <td>{{ $hirarcs->activity }}</td>
                                    <td>{{ $hirarcs->hazard }}</td>
                                    <td>{{ $hirarcs->risk }}</td>
                                    <td>{{ $hirarcs->kesesuaian }}</td>
                                    <td>{{ $hirarcs->kondisi }}</td>
                                    <td>{{ $hirarcs->kendali }}</td>
                                    <td>{{ $hirarcs->current_severity }}</td>
                                    <td>{{ $hirarcs->current_exposure }}</td>
                                    <td>{{ $hirarcs->current_probability }}</td>
                                    <td>{{ $hirarcs->current_risk_rating }}</td>
                                    <td>{{ $hirarcs->current_risk_category }}</td>
                                    <td>{{ $hirarcs->penyebab }}</td>
                                    <td>{{ $hirarcs->usulan }}</td>
                                    <td>{{ $hirarcs->form_diperlukan }}</td>
                                    <td>{{ $hirarcs->sop }}</td>
                                    <td>{{ $hirarcs->residual_severity }}</td>
                                    <td>{{ $hirarcs->residual_exposure }}</td>
                                    <td>{{ $hirarcs->residual_probability }}</td>
                                    <td>{{ $hirarcs->residual_risk_rating }}</td>
                                    <td>{{ $hirarcs->residual_risk_category }}</td>
                                    <td>{{ $hirarcs->penanggung_jawab }}</td>
                                    <td>{{ $hirarcs->status }}</td>
                                </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
