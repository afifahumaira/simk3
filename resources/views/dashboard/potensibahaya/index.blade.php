@extends ('layouts.layout')
@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">
        <div class="card m-5">
            <div class="card-header py-5 shadow-sm d-flex justify-content-between align-items-center">
                <!--begin::Page title-->
                <h2>Data Laporan Potensi Bahaya</h2>
                <!--begin::Main wrapper-->
                <div id="kt_docs_search_handler_basic" class="my-auto" data-kt-search-keypress="true"
                    data-kt-search-min-length="2" data-kt-search-enter="true" data-kt-search-layout="inline">
                    <!--begin::Input Form-->
                    <form data-kt-search-element="form" class="w-100 position-relative  shadow rounded" autocomplete="off">
                        <!--begin::Hidden input(Added to disable form autocomplete)-->
                        <input type="hidden" />
                        <!--end::Hidden input-->
                        <!--begin::Icon-->
                        <i
                            class="ki-duotone ki-magnifier fs-2 fs-lg-1 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span
                                class="path1"></span><span class="path2"></span></i>
                        <!--begin::Svg Icon | path: magnifier-->
                        <!--end::Icon-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-lg form-control-solid px-15" name="search"
                            value="" placeholder="Search " data-kt-search-element="input" />
                        <!--end::Input-->
                        <!--begin::Spinner-->
                        <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5"
                            data-kt-search-element="spinner">
                            <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
                        </span>
                        <!--end::Spinner-->
                        <!--begin::Reset-->
                        <span
                            class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none"
                            data-kt-search-element="clear">
                            <!--begin::Svg Icon | path: cross-->
                        </span>
                        <!--end::Reset-->
                    </form>
                    <!--end::Form-->
                    <!--begin::Wrapper-->
                    <!--end::Wrapper-->
                </div>
                <!--end::Main wrapper-->
                <div class="card-toolbar d-flex">
                    <div class="ps-3 pe-5  ">
                        {{-- <label class="col-form-label pe-4">Status :</label> --}}
                        <div class="w-0 ">
                            <select name="filter" id="filter" class="form-select fs-4 w-100 shadow"
                                data-control="select2" data-hide-search="true">
                                <option value="">Semua status</option>
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
                    <a href="{{ route('potensibahaya.tambah') }}" type="button" class="btn btn-primary btn-sm mb-0"
                        style="background: #233EAE">Tambah Data +</a>
                </div>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-rounded table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="">Kode Potensi Bahaya</th>
                                <th scope="col"class="d-flex justify-content-between">Tanggal lapor <div><a
                                            class="mx-1"
                                            href="{{ route('potensibahaya.index', ['sort' => 'waktu_kejadian', 'order' => 'asc']) }}"><i
                                                class="bi bi-arrow-up text-black"></i></a>
                                        <a class="px-1"
                                            href="{{ route('potensibahaya.index', ['sort' => 'waktu_kejadian', 'order' => 'desc']) }}"><i
                                                class="bi bi-arrow-down text-black"></i></a>
                                    </div>
                                </th>

                                <th scope="col" class="">Departemen</th>
                                <th scope="col">Lokasi Kejadian</th>
                                <th scope="col">Nama Pelapor</th>
                                <th scope="col" class="col-1">Status</th>
                                @if (auth()->user()->hak_akses == 'Pimpinan')
                                    <th scope="col" class="">Ubah Status</th>
                                @endif
                                @if (auth()->user()->hak_akses == 'Admin' ||
                                        auth()->user()->hak_akses == 'P2K3' ||
                                        auth()->user()->hak_akses == 'K3 Departemen' ||
                                        auth()->user()->hak_akses == 'Pimpinan')
                                    <th scope="col" class="">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td scope="row" class="text-center">
                                        {{ ($datas->currentpage() - 1) * $datas->perpage() + $loop->index + 1 }}</td>
                                    <td>{{ $data->kode_potensibahaya }}</td>
                                    <td>{{ $data->waktu_kejadian }}</td>
                                    <td>{{ $data->departemen->name }}</td>
                                    <td>{{ $data->lokasi }}</td>
                                    <td>{{ $data->nama_pelapor }}</td>
                                    <td align="center" class="pt-5">
                                        @if ($data->status == '1')
                                            <a href=""
                                                class="text-center fw-bold  text-danger border border-2 rounded-2 border-danger py-1 px-4 "
                                                style=" cursor: default !important;">
                                                Pending</a>
                                        @elseif ($data->status == '2')
                                            <a href="#"
                                                class="text-center fw-bold  text-warning border border-2 rounded-2 border-warning  px-4 py-1"
                                                style=" cursor: default !important;">Ditindaklanjuti</a>
                                        @elseif ($data->status == '3')
                                            <a href=""
                                                class="text-center fw-bold  text-success border border-2 rounded-2 border-success mx-10 px-4 py-1"
                                                style=" cursor: default !important;">
                                                Tuntas</a>
                                        @endif
                                    </td>
                                    @if (auth()->user()->hak_akses == 'Pimpinan')
                                        <td class="d-flex justify-content-center">
                                            <button id="update" class="btn btn-primary btn-sm px-3 py-2"
                                                data-bs-toggle="modal" data-bs-target="#editmodal"
                                                data-bs-p2k3="{{ $data->p2k3_id }}" data-bs-status="{{ $data->status }}"
                                                data-bs-id="{{ $data->id }}"
                                                data-bs-kode_potensibahaya="{{ $data->kode_potensibahaya }}"
                                                data-bs-departemen_id="{{ $data->departemen_id }}"
                                                data-bs-lokasi="{{ $data->lokasi }}"
                                                data-bs-potensi_bahaya="{{ $data->potensi_bahaya }}"
                                                data-bs-resiko_bahaya="{{ $data->resiko_bahaya }}"
                                                data-bs-usulan_perbaikan="{{ $data->usulan_perbaikan }}"
                                                style="font-size: 16px">
                                                Ubah Status

                                                {{-- {{ $investigasi->p2k3 }} --}}
                                                {{-- {{ $investigasi->status }} --}}
                                            </button>

                                        </td>
                                        {{-- ------------ Modal ubah status ----------- --}}
                                        <div class="modal fade" id="editmodal" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <form id="editmodal" action="{{ route('potensibahaya.update') }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="staticBackdropLabel">Ubah Data
                                                                Laporan Potensi Bahaya
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"
                                                                id="editmodal"></button>
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
                                                            <input type="hidden" name="id" id="id">
                                                            <input type="hidden" name="kode_potensibahaya"
                                                                id="kode_potensibahaya">
                                                            <input type="hidden" name="departemen_id"
                                                                id="departemen_id">
                                                            <input type="hidden" name="lokasi" id="lokasi">
                                                            <input type="hidden" name="potensi_bahaya"
                                                                id="potensi_bahaya">
                                                            <input type="hidden" name="resiko_bahaya"
                                                                id="resiko_bahaya">
                                                            <input type="hidden" name="usulan_perbaikan"
                                                                id="usulan_perbaikan">
                                                            <div id="additionalForm">
                                                                <div class="ps-3 pe-5">
                                                                    <label class="col-form-label ps-2">Status
                                                                        Investigasi
                                                                    </label>
                                                                    <div class=" w-100">
                                                                        <select name="status" id="status"
                                                                            class="form-select fs-6 w-100"
                                                                            data-control="select2" data-hide-search="true"
                                                                            data-placeholder="status">
                                                                            <option value="">Status Investigasi
                                                                            </option>
                                                                            <option value="1">Pending
                                                                            </option>
                                                                            <option value="2">Investigasi
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
                                                </form>
                                            </div>
                                        </div>
                                        {{-- ------------ End Modal ubah status ----------- --}}
                                    @endif
                                    @if (auth()->user()->hak_akses == 'Admin' ||
                                            auth()->user()->hak_akses == 'P2K3' ||
                                            auth()->user()->hak_akses == 'K3 Departemen')
                                        <td>
                                            <a href="{{ route('potensibahaya.lihat', $data['id']) }}" type="button"
                                                class="btn  btn-sm bg-warning " style="width:20px;"><i
                                                    class="bi bi-eye text-dark d-flex justify-content-center align-items-center"></i></a>
                                            <a href="{{ route('potensibahaya.edit', $data['id']) }}" type="button"
                                                class="btn  btn-sm bg-primary" style="width:20px;"><i
                                                    class="bi bi-pencil-square text-dark d-flex justify-content-center align-items-center"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm"
                                                style="width: 20px; background: #DC3545" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $data->id }}">
                                                <i
                                                    class="bi bi-trash text-dark d-flex justify-content-center align-items-center"></i>
                                            </button>
                                        </td>
                                    @endif
                                    @if (auth()->user()->hak_akses == 'Pimpinan')
                                        <td>
                                            <a href="{{ route('potensibahaya.lihat', $data['id']) }}" type="button"
                                                class="btn  btn-sm bg-warning " style="width:20px;"><i
                                                    class="bi bi-eye text-dark d-flex justify-content-center align-items-center"></i></a>
                                            <button type="button" class="btn btn-sm"
                                                style="width: 20px; background: #DC3545" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $data->id }}">
                                                <i
                                                    class="bi bi-trash text-dark d-flex justify-content-center align-items-center"></i>
                                            </button>
                                        </td>
                                    @endif
                                </tr>
                                <!-- Delete modal -->
                                <div class="modal fade" id="deleteModal{{ $data->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="deleteModalLabel{{ $data->id }}"
                                    data-bs-backdrop="static" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                                <h2 class="mt-5 text-center"
                                                    style="color: #16243D; font-size: 20px font-weight:700">
                                                    Yakin data
                                                    ingin dihapus?
                                                </h2>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center border-0">
                                                <form action="{{ route('potensibahaya.delete', $data['id']) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                        style="width:76px; height:31px; background: #29CC6A;">Ya</button>
                                                </form>
                                                <button type="button"
                                                    class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                    data-bs-dismiss="modal"
                                                    style="width:76px; height:31px; ">Tidak</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

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
                {{ $datas->links('pagination::customb5') }}
            </div>
            <!--end::Content container-->
        </div>
    </div>
@stop
@section('customscript')
    <script>
        $(document).on('click', '#update', function() {
            var p2k3_id = $(this).attr('data-bs-p2k3_id');
            var status = $(this).attr('data-bs-status');
            var id = $(this).attr('data-bs-id');
            var kode_potensibahaya = $(this).attr('data-bs-kode_potensibahaya');
            var departemen_id = $(this).attr('data-bs-departemen_id');
            var lokasi = $(this).attr('data-bs-lokasi');
            var potensi_bahaya = $(this).attr('data-bs-potensi_bahaya');
            var resiko_bahaya = $(this).attr('data-bs-resiko_bahaya');
            var usulan_perbaikan = $(this).attr('data-bs-usulan_perbaikan');
            //$("#p2k3_id").val(p2k3_id).setAttribute('selected', 'selected');
            //$("#status").val(status).setAttribute('selected', 'selected');
            $("#id").val(id);
            $("#kode_potensibahaya").val(kode_potensibahaya);
            $("#departemen_id").val(departemen_id);
            $("#lokasi").val(lokasi);
            $("#potensi_bahaya").val(potensi_bahaya);
            $("#resiko_bahaya").val(resiko_bahaya);
            $("#usulan_perbaikan").val(usulan_perbaikan);
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
@endsection
