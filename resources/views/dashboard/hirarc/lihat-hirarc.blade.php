@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
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
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">
                        <tbody>
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
                        </tbody>
                    </table>

                    <table class="table table-bordered border-secondary px-3 py-3 mb-5 shadow mt-10">
                        <thead>
                            <tr>
                                <th scope="col">Aktifitas</th>
                                <th scope="col">Bahaya (Hazard)</th>
                                <th scope="col">Risiko</th>
                                <th scope="col">Pre Control</th>
                                <th scope="col">Solusi</th>
                                <th scope="col">Past Control</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hirarc->hirarc_detail as $detail)
                                <tr>
                                    <td>{{ $detail->activity->name }}</td>
                                    <td>{{ $detail->hazard->name }}</td>
                                    <td>{{ $detail->risk->name }}</td>
                                    <td>{{ $detail->prerating->hasilprecontrol ?? '' }}</td>
                                    <td>{{ $detail->hirarc_detail_control->control_child->name ?? '' }}</td>
                                    <td>{{ $detail->postrating->hasilpostcontrol ?? '' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
