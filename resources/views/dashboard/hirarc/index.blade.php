@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5 ">
                <!--begin::Page title-->
                <h2>HIRARC</h2>
                <!--begin::Main wrapper-->
                <div id="kt_docs_search_handler_basic" data-kt-search-keypress="true" data-kt-search-min-length="2"
                    data-kt-search-enter="true" data-kt-search-layout="inline">

                    <!--begin::Input Form-->
                    <form data-kt-search-element="form" class="w-100 position-relative mb-5 shadow rounded"
                        autocomplete="off">
                        <!--begin::Hidden input(Added to disable form autocomplete)-->
                        <input type="hidden" />
                        <!--end::Hidden input-->
                        <td></td>
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
                <a href="{{ route('hirarc.tambah') }}" type="button" class="btn btn-primary btn-sm"
                    style="background: #233EAE">Tambah Data +</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary px-3 py-3 mb-5 shadow ">
                <thead px-3>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">Departemen</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Tanggal Lapor</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hirarcs as $hirarc)
                        <tr>
                            <td scope="row" class="text-center">
                                {{ ($hirarcs->currentpage() - 1) * $hirarcs->perpage() + $loop->index + 1 }}</td>
                            @if (!isset($printedDept[$hirarc->departemen_id]))
                                <td rowspan="{{ $deptCount[$hirarc->departemen_id] }}">
                                    {{ $hirarc->departemen->name }}
                                </td>
                                @php
                                    $printedDept[$hirarc->departemen_id] = true;
                                @endphp
                            @endif
                            {{-- <td>{{ $hirarc->location?->name }}</td> --}}
                            @if (!isset($printedLoc[$hirarc->location_id]))
                                <td rowspan="{{ $locCount[$hirarc->location_id] }}">
                                    {{ $hirarc->location->name }}
                                </td>
                                @php
                                    $printedLoc[$hirarc->location_id] = true;
                                @endphp
                            @endif
                            <td>{{ $hirarc->created_at ? $hirarc->created_at->translatedFormat('d F Y') : '' }}</td>

                            <td>
                                <a href="{{ route('hirarc.lihat', $hirarc->departemen_id) }}" type="button"
                                    class="btn  btn-sm bg-warning " style="width:20px;"><i
                                        class="bi bi-eye text-dark d-flex justify-content-center align-items-center"></i></a>
                                <a href="{{ route('hirarc.edit', $hirarc->id) }}" type="button"
                                    class="btn  btn-sm bg-primary" style="width:20px;"><i
                                        class="bi bi-pencil-square text-dark d-flex justify-content-center align-items-center"></i></a>
                                <button type="button" class="btn  btn-sm" style="width:20px; background:#DC3545"
                                    data-bs-toggle="modal" data-bs-target="#deleteForm{{ $hirarc->id }}"><i
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
                                                        style="color: #16243D; font-size: 20px font-weight:700">Yakin data
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
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $hirarcs->links('pagination::customb5') }}
            <!--end::Content container-->
        </div>
    </div>
@stop
