@extends ('layouts.layout')

@section('customcss')
    <style>
        .table-container {
            max-width: 500px;
            /* Adjust the max-height as needed */
            overflow-y: auto;
            white-space: nowrap;
        }

        /* Customize the scrollbar */
        .table-container::-webkit-scrollbar {
            width: 12px;
            /* Set the width of the scrollbar */
        }

        .table-container::-webkit-scrollbar-track {
            background-color: #62df0e;
            /* Set the background color of the track */
        }

        .table-container::-webkit-scrollbar-thumb {
            background-color: #ca2525;
            /* Set the color of the thumb */
            border-radius: 5px;
            /* Adjust the thumb border radius */
        }
    </style>
@stop
@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Detail Data HIRARC</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <div class="">
                    <a href="{{ route('hirarc.tambahDetail') }}" type="button" class="btn btn-primary btn-sm mb-2"
                        style="background: #233EAE">Tambah Data +</a>
                    <a href="{{ route('hirarc.index') }} " type="button"
                        class="btn btn-secondary text-white btn-sm ms-2 mb-2" style="background: #505050"><i
                            class="bi bi-chevron-left text-white"></i>Kembali</a>
                </div>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->

            <div class="content card">
                <div class="card-body table-responsive table-container">
                    <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">

                        <tr>
                            <th>Departemen</th>
                            <td>{{ $hirarcs->first()->departemen?->name }}</td>


                        </tr>
                        <tr>
                            <th> Lokasi </th>
                            <td><select id="location_id" name="location_id" class="form-select" data-control="select2">
                                    <option value="">Pilih Lokasi</option>
                                    @foreach ($locations as $loc)
                                        <option value="{{ $loc->id }}"
                                            {{ request()->has('location_id') ? (request()->location_id == $loc->id ? 'selected' : '') : '' }}>
                                            {{ $loc->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    </table>

                    <table class="table table-bordered border-secondary px-3 py-3 mb-5 shadow mt-10">
                        <thead>
                            <tr>
                                <th scope="col" class="col-1">Action</th>
                                {{-- <th>Lokasi</th> --}}
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
                            @php
                                $preintedLoc = [];
                                $printedAct = [];
                                $printedHazard = [];
                            @endphp
                            @foreach ($hirarcs as $hirarc)
                                <tr>
                                    <td align="center"> <a href="{{ route('hirarc.edit', $hirarc->id) }}" type="button"
                                            class="btn  btn-sm bg-primary my-2" style="width:20px;"><i
                                                class="bi bi-pencil-square text-dark d-flex justify-content-center align-items-center"></i></a>
                                        <button type="button" class="btn  btn-sm my-2"
                                            style="width:20px; background:#DC3545" data-bs-toggle="modal"
                                            data-bs-target="#deleteForm{{ $hirarc->id }}"><i
                                                class="bi bi-trash text-dark d-flex justify-content-center align-items-center"></i></button>

                                        <div class="modal fade" id="deleteForm{{ $hirarc->id }}" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered ">
                                                <div class="modal-content">

                                                    <form method="POST" action="{{ route('hirarc.delete', $hirarc->id) }}">
                                                        @csrf
                                                        <div
                                                            class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                                            <h2 class="mt-5 text-center"
                                                                style="color: #16243D; font-size: 20px font-weight:700">
                                                                Yakin data
                                                                ingin dihapus?
                                                            </h2>
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center border-0">
                                                            <button type="submit"
                                                                class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                                style="width:76px; height:31px; background: #29CC6A;">Ya</button>
                                                            <button type="button"
                                                                class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                                data-bs-dismiss="modal"
                                                                style="width:76px; height:31px; ">Tidak</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- @if (!isset($printedLoc[$hirarc->location_id]))
                                        <td rowspan="{{ $locCount[$hirarc->location_id] }}">
                                            {{ $hirarc->location->name }}
                                        </td>
                                        @php
                                            $printedLoc[$hirarc->location_id] = true;
                                        @endphp
                                    @endif --}}

                                    @if (!isset($printedAct[$hirarc->activity]))
                                        <td rowspan="{{ $actCount[$hirarc->activity] }}">
                                            {{ $hirarc->activity }}
                                        </td>
                                        @php
                                            $printedAct[$hirarc->activity] = true;
                                        @endphp
                                    @endif

                                    @if (!isset($printedHazard[$hirarc->hazard]))
                                        <td rowspan="{{ $hazardCount[$hirarc->hazard] }}">
                                            {{ $hirarc->hazard }}
                                        </td>
                                        @php
                                            $printedHazard[$hirarc->hazard] = true;
                                        @endphp
                                    @endif

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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
@stop
@section('customscript')
    <script>
        $(document).ready(function() {
            // Get the select filter element
            var selectFilter = $("#location_id");

            // Get the current URL
            var currentUrl = window.location.href;

            // Bind an event handler to the change event of the select filter
            selectFilter.on("change", function() {

                const selectedValue = selectFilter.val();
                const currentURL = window.location.href;
                const url = new URL(currentURL);
                const params = new URLSearchParams(url.search);

                // Check if the "filter" parameter already exists
                if (params.has('location_id')) {
                    // Update the existing "filter" parameter with the selected value
                    params.set('location_id', selectedValue);
                } else {
                    // If "filter" parameter doesn't exist, add it
                    params.append('location_id', selectedValue);
                }

                // Set the updated query parameters back to the URL object
                url.search = params.toString();

                // Redirect to the updated URL, which will reload the page
                window.location.href = url.toString();
            });
        });
    </script>
@stop
