@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Detail Data Investigasi Laporan Insiden</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <a href="{{ route('daftarinvestigasi.index') }} " type="button"
                    class="btn btn-secondary text-white btn-sm mb-2" style="background: #505050"><i
                        class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">
                <tbody>
                    <tr>
                        <th style="width: 40%">P2K3</th>
                        <td>{{ $investigasi->p2k3?->nama }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%">Kategori</th>
                        <td>{{ $investigasi->kategori }}</td>
                    </tr>
                    
                    <tr>
                        <th style="width: 40%">Lokasi Kejadian</th>
                        <td>{{ $investigasi->departemen?->name }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%">Penyebab Langsung</th>
                        <td>{{ $investigasi->penyebab_langsung }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%">Penyebab Tidak Langsung</th>
                        <td>{{ $investigasi->penyebab_tidak_langsung }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%">Penyebab Dasar</th>
                        <td>{{ $investigasi->penyebab_dasar }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%">Tenggat Waktu</th>
                        <td>{{ $investigasi->tenggat_waktu ? $investigasi->tenggat_waktu->translatedFormat('d F Y') : '' }}</td>
                    </tr>
                    <tr>
                        <th style="width: 40%">Tindakan</th>
                        <td>{{ $investigasi->tindakan }}</td>
                    </tr>
                    
                </tbody>
            </table>
            <!--end::Content container-->
        </div>
    </div>
@stop
