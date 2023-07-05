@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Data Aktifitas</h2>
                <!--begin::Main wrapper-->
                <div id="kt_docs_search_handler_basic" data-kt-search-keypress="true" data-kt-search-min-length="2"
                    data-kt-search-enter="true" data-kt-search-layout="inline">

                    <!--begin::Input Form-->
                    <form data-kt-search-element="form" class="w-100 position-relative mb-5 shadow rounded"
                        autocomplete="off">
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
                <a href="{{ route('aktifitas.tambah') }}" type="button" class="btn btn-primary btn-sm"
                    style="background: #233EAE">Tambah Data +</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary px-3 py-3 mb-10 shadow">
                <thead>
                    <tr>
                        <th scope="col" class="text-center col-1">No</th>
                        <th scope="col" class="col-4">ID_Aktifitas</th>
                        <th scope="col" class="">Aktifitas</th>
                        <th scope="col" class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    {{-- <tr>
                        <th scope="row" class="text-center">1</th>
                        <td>Laboratorium Komputasi</td>
                        <td>3 Aktifitas terdata</td>
                        <td class="d-flex justify-content-center"><a href="{{ route('aktifitas.detail') }}"
                                type="button" class="btn  btn-sm bg-warning " style="width:20px;"><i
                                    class="bi bi-eye text-dark d-flex justify-content-center align-items-center"></i></a>
                            <a href="{{ route('edit-aktifitas.edit_aktifitas') }}" type="button"
                                class="btn  btn-sm bg-primary" style="width:20px;"><i
                                    class="bi bi-pencil-square text-dark d-flex justify-content-center align-items-center"></i></a>
                            <button type="button" class="btn  btn-sm" style="width:20px; background:#DC3545"><i
                                    class="bi bi-trash text-dark d-flex justify-content-center align-items-center"></i></button>
                        </td>
                    </tr> --}}
                </tbody>
            </table>

            
            <!--end::Content container-->
        </div>
    </div>
@stop
