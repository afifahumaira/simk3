@extends ('layouts.layout')

@section('content')
    <div class="card m-5">
        <div class="card-header shadow-sm">
            <h3 class="card-title fw-bold fs-2">Daftar Investigasi Laporan Potensi Bahaya</h3>
            <div class="card-toolbar">
                <div id="kt_docs_search_handler_basic" class="mt-3" data-kt-search-keypress="true"
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
            </div>

        </div>
        <div class="card-body">
            <div class="">

                <table class="table table-rounded table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            {{-- <th scope="col">Departemen</th> --}}
                            <th scope="col">Lokasi Potensi Bahaya</th>
                            <th scope="col">Potensi Bahaya</th>
                            <th scope="col">Penanggung Jawab</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($investigasis as $investigasi)
                            <tr>
                                <td scope="row" class="text-center">{{ $loop->iteration }}</td>
                                {{-- <td>{{ $investigasi->departemen->name }}</td> --}}
                                <td>{{ $investigasi->lokasi }}</td>
                                <td>{{ $investigasi->potensi_bahaya }}</td>
                                <td>
                                    {{-- {{ $investigasi->p2k3_data->nama }} --}}
                                </td>

                                <td>
                                    <a href="{{ route('investigasipotensi.melihat', $investigasi->id) }}" type="button"
                                        class="btn btn-sm btn-warning px-4"><i class="bi bi-eye text-dark pe-0"></i></a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
        <div class="card-footer">
            {{ $investigasis->links('pagination::customb5') }}
        </div>
    </div>
@stop

@section('customscript')
    <script>
        $(document).on("click", "#update", function() {
            var p2k3 = $(this).attr('data-bs-p2k3');
            var status = $(this).attr('data-bs-status');
            $("#p2k3").val(p2k3).setAttribute('selected', 'selected');
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
