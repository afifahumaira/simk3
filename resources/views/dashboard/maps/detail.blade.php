@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Detail Maps Teknik</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <a href="{{ route('maps.lihat') }} " type="button"
                    class="btn text-white btn-secondary btn-sm mb-2" style="background: #505050"><i
                        class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">
                <tbody>
                    <tr>
                        <th class="w-25">Gedung</th>
                        <td>{{ $map->gedung }}</td>
                    </tr>
                    <tr>
                        <th class="w-25">Lantai</th>
                        <td>{{ $map->lantai }}</td>
                    </tr>
                    <tr>
                        <th class="w-25">Foto Maps</th>
                        <td>
                            <a class="d-block overlay" data-fslightbox="lightbox-basic" href="{{ asset('foto_maps/'. $map->gambar) }}">
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-500px"
                                    style="background-image:url('{{ asset('foto_maps/'. $map->gambar) }}')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                    <i class="bi bi-eye-fill text-white fs-3x"></i>
                                </div>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!--end::Content container-->
        </div>
    </div>
@stop

@section('customscript')
<script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
@stop
