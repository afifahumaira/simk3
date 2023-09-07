@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">
        <div class="card m-5">
            <div class="card-header shadow-sm d-flex align-items-center">
                <h3 class="card-title fw-bold fs-2">Daftar Laporan Insiden</h3>

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
                            <select name="filter" id="filter" class="form-select fs-6 w-100 shadow"
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
                    <a href="{{ route('laporan-insiden.tambah') }}" class="btn btn-sm btn-primary"
                        style="background: #233EAE">
                        Tambah Data +
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="table-responsive">
                    <table class="table table-rounded table-bordered">
                        <thead>
                            <tr class="fw-semibold border-bottom-2 border-gray-200">
                                @if (auth()->user()->hak_akses == 'Admin' ||
                                        auth()->user()->hak_akses == 'P2K3' ||
                                        auth()->user()->hak_akses == 'K3 Departemen')
                                    <th>No</th>
                                    <th scope="col" class="col-1">Kode Insiden Lapor</th>
                                    <th>Waktu Kejadian</th>
                                    <th>Lokasi</th>
                                    <th scope="col">Departemen</th>
                                    <th>Nama Pelapor</th>
                                    {{-- <th>Nama Korban</th> --}}
                                    <th>P2K3</th>
                                    <th class="col-1">Status</th>
                                    <th>Action</th>
                                @endif
                                @if (auth()->user()->hak_akses == 'Pimpinan')
                                    <th>No</th>
                                    <th>Kode Insiden Lapor</th>
                                    <th>Waktu Kejadian</th>
                                    <th>Lokasi</th>
                                    <th scope="col" class="col-1">Departemen</th>
                                    <th>Nama Pelapor</th>
                                    {{-- <th>Nama Korban</th> --}}
                                    <th>P2K3</th>
                                    <th class="col-1">Status</th>
                                    <th class="">Ubah Status</th>
                                    <th>Action</th>
                                @endif
                                @if (auth()->user()->hak_akses == 'pengguna')
                                    <th>No</th>
                                    <th>Kode Insiden Lapor</th>
                                    <th>Waktu Kejadian</th>
                                    <th>Lokasi</th>
                                    <th>Departemen</th>
                                    <th>Nama Pelapor</th>
                                    <th>Nama Korban</th>
                                    {{-- <th>P2K3</th> --}}
                                    <th>Status</th>
                                @endif
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
                                        @elseif ($lap->status == '3')
                                            <a class="text-center fw-bold  text-success border border-2 rounded-2 border-success px-5 py-1"
                                                style=" cursor: default !important;">
                                                Tuntas </a>
                                        @endif
                                    </td>
                                    @if (auth()->user()->hak_akses == 'Pimpinan')
                                        <td class="d-flex justify-content-center align-items-center">
                                            <a id="update" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editmodal" data-bs-p2k3_id="{{ $lap->p2k3_id }}"
                                                data-bs-status="{{ $lap->status }}">Ubah Status
                                                Laporan Insiden
                                            </a>
                                        </td>
                                        {{-- ------------ Modal ubah status ----------- --}}
                                        <div class="modal fade" id="editmodal" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <form action="{{ route('laporan-insiden.update', $lap->id) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="staticBackdropLabel">Ubah Data
                                                                Laporan Insiden
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close" id="update"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div id="additionalForm">
                                                                <div class="ps-3 pe-5 pb-5">
                                                                    <label class="col-form-label ps-2">P2K3</label>
                                                                    <div class=" w-100">
                                                                        <select id="p2k3_id" name="p2k3_id"
                                                                            class="form-select fs-6 w-100"
                                                                            data-control="select2" data-hide-search="true"
                                                                            data-placeholder="p2k3_id">
                                                                            @foreach ($p2k3s as $p2k3)
                                                                                <option value="{{ $p2k3->id }}">
                                                                                    {{ $p2k3->nama }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="additionalForm">
                                                                <div class="ps-3 pe-5">
                                                                    <label class="col-form-label ps-2">Status
                                                                        Laporan Insiden
                                                                    </label>
                                                                    <div class=" w-100">
                                                                        <select name="status" id="status"
                                                                            class="form-select fs-6 w-100"
                                                                            data-control="select2" data-hide-search="true"
                                                                            data-placeholder="status">
                                                                            <option value="2">Investigasi
                                                                            </option>
                                                                            <option value="3">Tuntas
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            class="modal-footer d-flex justify-content-center border-0 mt-5">
                                                            <button type="submit"
                                                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                                                data-bs-toggle="modal" data-bs-target="#warning"
                                                                style="background: #29CC6A;height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan
                                                                Data</button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (auth()->user()->hak_akses == 'Admin' ||
                                            auth()->user()->hak_akses == 'P2K3' ||
                                            auth()->user()->hak_akses == 'K3 Departemen')
                                        <td align="center">
                                            <a href="{{ route('laporan-insiden.lihat', $lap->id) }}" type="button"
                                                class="btn btn-sm btn-warning px-4"><i
                                                    class="bi bi-eye text-dark pe-0"></i></a>
                                            <a href="{{ route('laporan-insiden.ubah', $lap->id) }}" type="button"
                                                class="btn btn-sm btn-primary px-4"><i
                                                    class="bi bi-pencil-square pe-0"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm px-4"
                                                data-bs-toggle="modal" data-bs-target="#deleteForm{{ $lap->id }}"><i
                                                    class="bi bi-trash pe-0"></i></button>

                                            <div class="modal fade" id="deleteForm{{ $lap->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered ">
                                                    <div class="modal-content">

                                                        <form method="POST"
                                                            action="{{ route('laporan-insiden.delete', $lap->id) }}">
                                                            @csrf
                                                            <div
                                                                class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                                                <h2 class="mt-5 text-center"
                                                                    style="color: #16243D; font-size: 20px font-weight:700">
                                                                    Yakin data
                                                                    ingin dihapus?
                                                                </h2>
                                                            </div>
                                                            <div
                                                                class="modal-footer d-flex justify-content-center border-0">
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
                                    @endif

                                    @if (auth()->user()->hak_akses == 'Pimpinan')
                                        <td align="center">
                                            <a href="{{ route('laporan-insiden.lihat', $lap->id) }}" type="button"
                                                class="btn btn-sm btn-warning px-4"><i
                                                    class="bi bi-eye text-dark pe-0"></i></a>
                                            <button type="button" class="btn btn-danger btn-sm px-4"
                                                data-bs-toggle="modal" data-bs-target="#deleteForm{{ $lap->id }}"><i
                                                    class="bi bi-trash pe-0"></i></button>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            {{-- ------------ End Modal ubah status ----------- --}}
            {{-- Modal Warning --}}
            {{-- <div class="modal fade" id="warning" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content"> --}}
            {{-- <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
            {{-- <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                            <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px font-weight:700">Apakah
                                anda yakin telah menyelesaikan Investigasi? --}}
            {{-- <p class="mb-0 mt-2 text-center " style="color: #DC3545; font-weight:400; font-size:14px">
                                    data
                                    yang
                                    dimasukkan belum tersimpan </p> --}}
            {{-- </h2>
                        </div>
                        <div class="modal-footer d-flex justify-content-center border-0">
                            <button type="submit"
                                class="btn btn-success btn-sm text-white d-flex justify-content-center align-items-center text-center rounded-1 "
                                style="background: #29CC6A;  font-size:14px; ">Ya, simpan
                                Data</button> --}}
            {{-- <a href="{{ route('daftarinvestigasi.ubah', $investigasi->id) }}" type="button"
                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                style="width:76px; height:31px; background: #29CC6A;">Ya</a> --}}
            {{-- <button type="button"
                                class="btn btn-secondary btn-sm text-center d-flex align-items-center rounded-1"
                                data-bs-dismiss="modal" style=" font-size:14px; ">Tidak</button>

                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- ------------ End Modal warning ----------- --}}
            <div class="card-footer">
                {{ $laporaninsidens->links('pagination::customb5') }}
            </div>
        </div>
    </div>
@stop

@section('customscript')
    <script>
        $(document).on("click", "#update", function() {
            var p2k3_id = $(this).attr('data-bs-p2k3_id');
            var status = $(this).attr('data-bs-status');
            $("#p2k3_id").val(p2k3_id).setAttribute('selected', 'selected');
            $("#status").val(status).setAttribute('selected', 'selected');
        });


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
