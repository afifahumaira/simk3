@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Inspeksi APAR</h2>
                <!--begin::Main wrapper-->
                <!--end::Main wrapper-->
                <a href="{{ route('aparinspeksi.daftar') }}" class="btn btn-primary  btn-sm mb-2 text-white" style="background: #233EAE">Daftar Inspeksi</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <div class="d-flex flex-column fw-bold">
                <!--begin::Label-->
                <label class="col-form-label fs-5 ps-4" for="inlineFormCustomSelectPref1">Lokasi Departemen</label>
                <!--end::Label-->
                <!--begin::Select-->
                <div class="ps-3 pe-5">
                    {{-- <select class="form-select custom-select ps-5 my-1 mr-sm-2 form-control bg-light decorated"  id="lokasiinspeksi" > --}}
                    <select class="form-select fs-6 w-100" data-control="select2" data-hide-search="true"
                        data-placeholder="Select an option" style="--bs-link-hover-color-rgb: 25, 135, 84;"
                        id="lokasiinspeksi" style="font-family: 'Inter';" onchange="update()">
                        <option selected disabled>Lokasi</option>
                        @foreach ($departemen as $item)
                        <option value="{{$item->id}}" {{request()->id == $item->id ? 'selected' : ''}}> {{$item->name}}</option>
                        @endforeach

                    </select>
                </div>
                <!--end::Select-->
            </div>

            <div class="page-title  gap-1 mx-5 my-5 "  style="{{isset($inventory) ? '' : 'display:none'}}" id="tabelp3k">
                <div id="kt_app_content"
                    class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                    <div
                        class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                        <!--begin::Page title-->
                        <h2>Data APAR</h2>
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
                                </span>
                                <!--end::Reset-->
                            </form>

                        </div>

                    </div>
                    <!--begin::Content container-->

                    <table class="table table-bordered border-secondary px-3 py-3 mb-5 shadow">
                        <thead px-3>
                            <tr>
                                <th scope="col">Kode ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Kondisi</th>

                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($inventory)
                                @foreach ($inventory as $item)
                                    <tr>
                                        <td>APAR-1</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->tipe}}</td>
                                        <td>{{$item->kondisi}}</td>
                                        <td class="d-flex justify-content-center align-items-center"><a
                                                href="{{ route('aparinspeksi.inspek', $item->id) }}" type="button"
                                                class="btn  btn-sm text-white rounded" style="background:#29CC6A">Inspeksi</a></td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>

                    @isset($inventory)
                        {{ $inventory->links('pagination::customb5') }}
                    @endisset
                    <!--end::Content container-->
                </div>
            </div>
            <!--end::Content container-->

        </div>
    </div>
@stop
@section('customscript')
    <script>
        // $(document).ready(function() {
        //     $('#lokasiinspeksi').on('change', function() {
        //         // $('#tabelp3k').slideDown (500);

        //         if ($('#tabelp3k').is(":hidden")) {
        //             $('#tabelp3k').slideDown('slow');
        //         } else {
        //             $('#tabelp3k').slideUp('slow');
        //             $('#tabelp3k').slideDown('slow');
        //         }
        //     });
        // });

        function update(){
                var value = $('#lokasiinspeksi :selected').val();
                console.log(value);
                if (value != null) {
                    var url = "{{ route ('aparinspeksi.selected_index',':value')}}";
                    url = url.replace(':value', value);
                    window.location.href=url;
                    // window.location.reload();
                }
        }
    </script>
@stop


