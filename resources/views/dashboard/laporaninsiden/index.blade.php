@extends ('layouts.layout')

@section('content')
    <div class="card m-5">
        <div class="card-header shadow-sm">
            <h3 class="card-title fw-bold fs-2">Daftar Laporan Insiden</h3>

            <div id="kt_docs_search_handler_basic" class="mt-3" data-kt-search-keypress="true" data-kt-search-min-length="2"
                data-kt-search-enter="true" data-kt-search-layout="inline">
                <form data-kt-search-element="form" class="w-100 position-relative shadow-sm rounded" autocomplete="off">
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
                <a href="{{ route('laporan-insiden.tambah') }}" class="btn btn-sm btn-primary" style="background: #233EAE">
                    Tambah Data +
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-rounded table-bordered">
                    <thead>
                        <tr class="fw-semibold border-bottom-2 border-gray-200">
                            @if (auth()->user()->hak_akses == 'admin' ||
                                    auth()->user()->hak_akses == 'p2k3' ||
                                    auth()->user()->hak_akses == 'k3_departemen' ||
                                    auth()->user()->hak_akses == 'pimpinan')
                                <th>No</th>
                                <th>Kode Insiden Lapor</th>
                                <th>Waktu Kejadian</th>
                                <th>Lokasi</th>
                                <th>Nama Pelapor</th>
                                <th>Nama Korban</th>
                                <th>P2K3</th>
                                <th>Status</th>
                                <th>Action</th>
                            @endif
                            @if (auth()->user()->hak_akses == 'pengguna')
                                <th>No</th>
                                <th>Kode Insiden Lapor</th>
                                <th>Waktu Kejadian</th>
                                <th>Lokasi</th>
                                <th>Nama Pelapor</th>
                                <th>Nama Korban</th>
                                <th>P2K3</th>
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
                                <td>{{ $lap->waktu_kejadian ? $lap->waktu_kejadian->translatedFormat('d F Y') : '' }}</td>
                                <td>{{ $lap->lokasi_rinci }}</td>
                                <td>{{ $lap->nama_pelapor }}</td>
                                <td>{{ $lap->nama_korban }}</td>
                                <td>{{ $lap->p2k3 ? $lap->p2k3->nama : '' }}</td>
                                <td align="center">
                                    @if ($lap->status == '1')
                                        <button type="button" class="btn btn-danger btn-sm py-2"
                                            style="background:#DC3545">Pending</button>
                                    @elseif ($lap->status == '2')
                                        @if (auth()->user()->hak_akses == 'admin' || auth()->user()->hak_akses == 'p2k3')
                                            <a href="{{ route('daftarinvestigasi.tambah', $lap->id) }}"
                                                class="btn btn-primary btn-sm py-2">Investigasi</a>
                                        @else
                                            <button type="button" class="btn btn-primary btn-sm py-2">Investigasi</button>
                                        @endif
                                    @elseif ($lap->status == '3')
                                        <button type="button" class="btn btn-success btn-sm py-2">Sukses</button>
                                    @endif
                                </td>
                                @if (auth()->user()->hak_akses == 'admin' ||
                                        auth()->user()->hak_akses == 'p2k3' ||
                                        auth()->user()->hak_akses == 'k3_departemen' ||
                                        auth()->user()->hak_akses == 'pimpinan')
                                    <td align="center">
                                        <a href="{{ route('laporan-insiden.lihat', $lap->id) }}" type="button"
                                            class="btn btn-sm btn-warning px-4"><i class="bi bi-eye text-dark pe-0"></i></a>
                                        <a href="{{ route('laporan-insiden.ubah', $lap->id) }}" type="button"
                                            class="btn btn-sm btn-primary px-4"><i class="bi bi-pencil-square pe-0"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm px-4" data-bs-toggle="modal"
                                            data-bs-target="#deleteForm{{ $lap->id }}"><i
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
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            {{ $laporaninsidens->links('pagination::customb5') }}
        </div>
    </div>
@stop
