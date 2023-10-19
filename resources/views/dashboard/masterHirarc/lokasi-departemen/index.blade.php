@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Data Lokasi</h2>
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
                <div class="card-toolbar d-flex">
                    <div class="ps-3 pe-5  ">
                        {{-- <label class="col-form-label pe-4">Status :</label> --}}
                        <div class="w-0 ">
                            <select name="filter" id="filter" class="form-select fs-4 w-100 shadow"
                                data-control="select2" data-hide-search="true" style="">
                                <option value="">Semua status</option>
                                <option value="1" class=" fs-4 "
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
                                <option value="4"
                                    {{ request()->has('filter') ? (request()->filter == 3 ? 'selected' : false) : '' }}>
                                    Perencanaan Wilayah dan Kota
                                </option>
                            </select>
                        </div>
                    </div>
                    <a href="{{ route('lokasimaster.tambah') }}" type="button"
                        class="btn btn-primary btn-sm d-flex align-items-center" style="background: #233EAE">Tambah Data
                        +</a>
                </div>

                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary px-3 py-3 mb-10 shadow">
                <thead px-3>
                    <tr>

                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="">Departemen</th>
                        <th scope="col" class="">Lokasi</th>
                        <th scope="col" class="col-1">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($locations as $loc)
                        <tr>
                            <td scope="row" class="text-center">
                                {{ ($locations->currentpage() - 1) * $locations->perpage() + $loop->index + 1 }}</td>
                            
                            <td>{{ $loc->departemen->name }}</td>    
                            <td>{{ $loc->name }}</td>
                            <td>
                                <a href="{{ route('lokasimaster.edit', $loc->id) }}" type="button"
                                    class="btn btn-sm btn-primary px-4"><i class="bi bi-pencil-square pe-0"></i></a>
                                <button type="button" class="btn btn-danger btn-sm px-4" data-bs-toggle="modal"
                                    data-bs-target="#deleteForm{{ $loc->id }}"><i
                                        class="bi bi-trash pe-0"></i></button>

                                <div class="modal fade" id="deleteForm{{ $loc->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content">

                                            <form method="POST" action="{{ route('lokasimaster.delete', $loc->id) }}">
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

            {{ $locations->links('pagination::customb5') }}
            <!--end::Content container-->
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
