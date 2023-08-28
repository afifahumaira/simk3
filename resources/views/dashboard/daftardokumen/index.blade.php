@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

            <div id="kt_app_content"
                class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Dokumen</h2>
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
                            <input type="text" class="form-control form-control-lg form-control-solid px-15"
                                name="search" value="" placeholder="Search " data-kt-search-element="input" />
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
                    <a href="{{ route('daftardokumen.tambah') }}" type="button" class="btn btn-primary btn-sm"
                        style="background: #233EAE">Tambah Doc +</a>
                    <!--end::Title-->
                </div>
                <!--begin::Content container-->
                <table class="table table-bordered border-secondary px-3 py-3 mb-5 shadow">
                    <thead px-3>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">File</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    @foreach ($datas as $data)
                        <tbody>
                            <tr>
                                <th scope="row" class="text-center">{{ ++$index }}</th>
                                <td>{{ $data->name_file }}</td>
                                <td><a href="{{ '/berkas/' . $data->file }}"
                                        target="_blank"class="text-decoration-underline">{{ '/berkas/' . $data->file }}</a>
                                </td>
                                <td>
                                    <a href="{{ route('daftardokumen.ubah', $data['id']) }}" type="button"
                                        class="btn  btn-sm bg-primary" style="width:20px;"><i
                                            class="bi bi-pencil-square text-dark d-flex justify-content-center align-items-center"></i></a>
                                    <button type="button" class="btn  btn-sm" style="width:20px; background:#DC3545"
                                        data-bs-toggle="modal" data-bs-target="#deletemas<?= $data['id'] ?>"><i
                                            class="bi bi-trash text-dark d-flex justify-content-center align-items-center"></i></button>
                                    <div class="modal fade" id="deletemas<?= $data['id'] ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Delete dokumen</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-6">
                                                        <form method="POST"
                                                            action="{{ route('daftardokumen.destroy', $data['id']) }}">
                                                            @csrf
                                                            <h6>Apakah Anda Yakin?</h6>
                                                            <input type="submit" class="btn btn-success" value="Okay"
                                                                name="delete"></input>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $datas->links('pagination::customb5') }}

                <!--end::Content container-->
            </div>
        </div>
    @stop
