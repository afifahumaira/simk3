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
            @foreach ($hirarcs as $hirarc)
            <div class="content card">
                <div class="card-body table-responsive">
                    <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">
                        
                            <tr>
                                <th>Departemen</th>
                                <td>{{ $hirarc->departemen->name }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>{{ $hirarc->location->name }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pelapor</th>
                                <td>{{ $hirarc->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Lapor</th>
                                <td>{{ $hirarc->created_at ? $hirarc->created_at->translatedFormat('d F Y') : '' }}</td>
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
                            {{-- @foreach ($hirarc as $hirarc)
                            @php
                            dd( $hirarc );
                            @endphp --}}
                                <tr>
                                    <td>{{ $hirarc->activity }}</td>
                                    <td>{{ $hirarc->hazard }}</td>
                                    <td>{{ $hirarc->risk }}</td>
                                    <td>{{ $hirarc->kesesuaian }}</td>
                                    <td>{{ $hirarc->kondisi }}</td>
                                    <td>{{ $hirarc->kendali }}</td>
                                    <td>{{ $hirarc->current_severity }}</td>
                                    <td>{{ $hirarc->current_exposure }}</td>
                                    <td>{{ $hirarc->current_probability }}</td>
                                    <td>{{ $hirarc->current_risk_rating }}</td>
                                    <td>{{ $hirarc->current_risk_category }}</td>
                                    <td>{{ $hirarc->penyebab }}</td>
                                    <td>{{ $hirarc->usulan }}</td>
                                    <td>{{ $hirarc->form_diperlukan }}</td>
                                    <td>{{ $hirarc->sop }}</td>
                                    <td>{{ $hirarc->residual_severity }}</td>
                                    <td>{{ $hirarc->residual_exposure }}</td>
                                    <td>{{ $hirarc->residual_probability }}</td>
                                    <td>{{ $hirarc->residual_risk_rating }}</td>
                                    <td>{{ $hirarc->residual_risk_category }}</td>
                                    <td>{{ $hirarc->penanggung_jawab }}</td>
                                    <td>{{ $hirarc->status }}</td>
                                </tr>
                            {{-- @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>                
            @endforeach

        </div>
    </div>
@stop
