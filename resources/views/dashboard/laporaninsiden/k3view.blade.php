@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">
        <div class="card m-5">
            <div class="card-header py-3 shadow-sm d-flex justify-content-between align-items-center">
                <!--begin::Page title-->
                <h2 class="card-title fw-bold ">Daftar Laporan Insiden</h2>

                <div id="kt_docs_search_handler_basic" class="mt-1" data-kt-search-keypress="true"
                    data-kt-search-min-length="2" data-kt-search-enter="true" data-kt-search-layout="inline">
                    <form data-kt-search-element="form" class="w-100 position-relative shadow-sm rounded"
                        autocomplete="off">
                        <input type="hidden" />
                        <i
                            class="ki-duotone ki-magnifier fs-3 fs-lg-2 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span
                                class="path1"></span><span class="path2"></span></i>
                        <input type="text" class="form-control form-control-solid px-15 bg-white" name="search"
                            value="" placeholder="Search " data-kt-search-element="input" />
                        <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                            data-kt-search-element="spinner">
                            <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                        </span>
                        <span
                            class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                            data-kt-search-element="clear">
                        </span>
                    </form>
                </div>

                <div class="card-toolbar">
                    <div class="ps-3 pe-5  d-flex align-items-center justify-content-end ">
                        {{-- <label class="col-form-label pe-4">Status :</label> --}}
                        <div class="w-0 ">
                            <select name="filter" id="filter" class="form-select fs-4 w-100 shadow"
                                data-control="select2" data-hide-search="true">
                                <option value="">Status</option>
                                <option value="1"
                                    {{ request()->has('filter') ? (request()->filter == 1 ? 'selected' : false) : '' }}>
                                    Pending</option>
                                <option value="2"
                                    {{ request()->has('filter') ? (request()->filter == 2 ? 'selected' : false) : '' }}>
                                    Ditindak
                                    lanjuti</option>
                                <option value="3"
                                    {{ request()->has('filter') ? (request()->filter == 3 ? 'selected' : false) : '' }}>
                                    Tuntas
                                </option>

                            </select>
                        </div>
                    </div>
                    {{-- <a href="{{ route('laporan-insiden.tambah') }}" class="btn btn-sm btn-primary"
                        style="background: #233EAE">
                        Tambah Data +
                    </a> --}}
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-rounded table-bordered">
                        <thead>
                            <tr class="fw-semibold border-bottom-2 border-gray-200">
                                <th>No</th>
                                <th scope="col" class="col-1">Kode Insiden Lapor</th>
                                <th scope="col"class="d-flex justify-content-between">Tanggal lapor <div><a
                                            class="mx-1"
                                            href="{{ route('laporan-insiden.k3dep', ['sort' => 'waktu_kejadian', 'order' => 'asc']) }}"><i
                                                class="bi bi-arrow-up text-black"></i></a>
                                        <a class="px-1"
                                            href="{{ route('laporan-insiden.k3dep', ['sort' => 'waktu_kejadian', 'order' => 'desc']) }}"><i
                                                class="bi bi-arrow-down text-black"></i></a>
                                    </div>
                                </th>
                                <th>Lokasi</th>
                                <th scope="col">Departemen</th>
                                <th>Nama Pelapor</th>
                                {{-- <th>Nama Korban</th> --}}
                                <th>P2K3</th>
                                <th class="col-1">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporaninsidens as $lap)
                                <tr>
                                    <td scope="row" class="text-center">
                                        {{ ($laporaninsidens->currentpage() - 1) * $laporaninsidens->perpage() + $loop->index + 1 }}
                                    </td>
                                    <td>{{ $lap->kode_laporinsiden }}</td>
                                    <td>{{ $lap->waktu_kejadian ? $lap->waktu_kejadian->translatedFormat('d F Y') : '' }}
                                    </td>
                                    <td>{{ $lap->lokasi_rinci }}</td>
                                    <td>{{ $lap->departemen->name }}</td>
                                    <td>{{ $lap->nama_pelapor }}</td>
                                    {{-- <td>{{ $lap->nama_korban }}</td> --}}
                                    <td>{{ $lap->p2k3 ? $lap->p2k3->nama : '' }}</td>
                                    <td {align="center" class="pt-5">
                                        @if ($lap->status == '1')
                                            <a href=""
                                                class="text-center fw-bold  text-danger border border-2 rounded-2 border-danger px-5 py-1"
                                                style=" cursor: default !important;">
                                                Pending</a>
                                        @elseif ($lap->status == '2')
                                            <a class="text-center fw-bold  text-warning border border-2 rounded-2 border-warning py-2 px-4"
                                                style=" cursor: default !important;">
                                                Ditindaklanjuti</a>
                                            {{-- @if (auth()->user()->hak_akses == 'Admin' || auth()->user()->hak_akses == 'P2K3' || auth()->user()->hak_akses == 'K3 Departemen' || auth()->user()->hak_akses == 'Pimpinan')
                                                <a href="{{ route('daftarinvestigasi.tambah', $lap->id) }}"
                                                    class="text-center fw-bold  text-warning border border-2 rounded-2 border-warning py-1 px-4"
                                                    style=" cursor: default !important;">Ditindaklanjuti</a>
                                            @else
                                                <a class="text-center fw-bold  text-warning border border-2 rounded-2 border-warning py-2 px-4"
                                                    style=" cursor: default !important;">
                                                    Ditindaklanjuti</a>
                                            @endif --}}
                                        @elseif ($lap->status == '3')
                                            <a class="text-center fw-bold  text-success border border-2 rounded-2 border-success px-5 py-1"
                                                style=" cursor: default !important;">
                                                Tuntas </a>
                                        @endif
                                    </td>
                                    <td align="center">
                                        <a href="{{ route('laporan-insiden.melihat', $lap->id) }}" type="button"
                                            class="btn btn-sm btn-warning px-4"><i class="bi bi-eye text-dark pe-0"></i></a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            {{-- ------------ Modal ubah status ----------- --}}
            <div class="modal fade" id="editmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="staticBackdropLabel">Ubah Data
                                Investigasi
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                id="update"></button>
                        </div>
                        <div class="modal-body">
                            <div id="additionalForm">
                                <div class="ps-3 pe-5 pb-5">
                                    <label class="col-form-label ps-2">P2K3</label>
                                    <div class=" w-100">
                                        <select id="p2k3_id" name="p2k3_id" class="form-select fs-6 w-100"
                                            data-control="select2" data-hide-search="true" data-placeholder="p2k3_id">
                                            {{-- @foreach ($p2k3s as $p2k3)
                                            <option value="{{ $p2k3->id }}">
                                                {{ $p2k3->nama }}
                                            </option>
                                        @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="additionalForm">
                                <div class="ps-3 pe-5">
                                    <label class="col-form-label ps-2">Status
                                        Investigasi
                                    </label>
                                    <div class=" w-100">
                                        <select name="status" id="status" class="form-select fs-6 w-100"
                                            data-control="select2" data-hide-search="true" data-placeholder="status">
                                            <option value="2">Investigasi
                                            </option>
                                            <option value="3">Tuntas
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-center border-0 mt-5">
                            <button type="submit"
                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                style="background: #29CC6A;height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan
                                Data</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ------------ End Modal ubah status ----------- --}}
            <div class="card-footer">
                {{ $laporaninsidens->links('pagination::customb5') }}
            </div>
        </div>
    </div>
@stop

@section('customscript')
    <script>
        $(document).ready(function() {
            // Get the select filter element
            var selectFilter = $("#filter");

            // Get the current URL
            var currentUrl = window.location.href;

            // Bind an event handler to the change event of the select filter
            selectFilter.on("change", function() {

                const selectedValue = selectFilter.val();
                const currentURL = window.location.href;
                const url = new URL(currentURL);
                const params = new URLSearchParams(url.search);

                // Check if the "filter" parameter already exists
                if (params.has('filter')) {
                    // Update the existing "filter" parameter with the selected value
                    params.set('filter', selectedValue);
                } else {
                    // If "filter" parameter doesn't exist, add it
                    params.append('filter', selectedValue);
                }

                // Set the updated query parameters back to the URL object
                url.search = params.toString();

                // Redirect to the updated URL, which will reload the page
                window.location.href = url.toString();
            });
        });
    </script>
@stop
