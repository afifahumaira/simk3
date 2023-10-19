@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="card m-5">
            <div class="card-header py-5 shadow-sm d-flex justify-content-between align-items-center">
                <!--begin::Page title-->
                <h2>Data Maps Teknik</h2>
                <!--begin::Main wrapper-->
                <div id="kt_docs_search_handler_basic" data-kt-search-keypress="true" data-kt-search-min-length="2"
                    data-kt-search-enter="true" data-kt-search-layout="inline">

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
                <div>
                    <a href="{{ route('maps.tambah') }}" type="button" class="btn btn-primary btn-sm mb-2 me-1"
                        style="background: #233EAE">Tambah Data +</a>
                    <a href="{{ route('maps.index') }} " type="button" class="btn text-white btn-secondary btn-sm mb-2"
                        style="background: #505050"><i class="bi bi-chevron-left text-white"></i>Kembali</a>
                </div>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <div class="card-body">
                <table class="table table-bordered border-secondary px-3 py-3 mb-5 shadow">
                    <thead px-3>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col"class="w-50 ">Gedung</th>
                            <th scope="col" class="w-25 ">Lantai</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($maps as $map)
                            <tr>
                                <td scope="row" class="text-center">
                                    {{ ($maps->currentpage() - 1) * $maps->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $map->gedung }}</td>
                                <td>{{ $map->lantai }}</td>
                                <td>
                                    <a href="{{ route('maps.detail', $map->id) }}" type="button"
                                        class="btn  btn-sm bg-warning " style="width:20px;"><i
                                            class="bi bi-eye text-dark d-flex justify-content-center align-items-center"></i></a>
                                    <a href="{{ route('maps.edit', $map->id) }}" type="button"
                                        class="btn  btn-sm bg-primary" style="width:20px;"><i
                                            class="bi bi-pencil-square text-dark d-flex justify-content-center align-items-center"></i></a>
                                    <button type="button" class="btn  btn-sm" style="width:20px; background:#DC3545"
                                        data-bs-toggle="modal" data-bs-target="#deleteForm{{ $map->id }}"><i
                                            class="bi bi-trash text-dark d-flex justify-content-center align-items-center"></i></button>

                                    <div class="modal fade" id="deleteForm{{ $map->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content">

                                                <form method="POST" action="{{ route('maps.delete', $map->id) }}">
                                                    @csrf
                                                    <div
                                                        class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                                        <h2 class="mt-5 text-center"
                                                            style="color: #16243D; font-size: 20px font-weight:700">Yakin
                                                            data
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
            </div>

            <div class="card-footer">
                {{ $maps->links('pagination::customb5') }}
            </div>

            <!--end::Content container-->
        </div>
    </div>
@stop
