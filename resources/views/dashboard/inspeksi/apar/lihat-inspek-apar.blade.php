@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Detail Data Inspeksi APAR</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <a href="{{ route('daftar.index') }} " type="button"
                    class="btn btn-secondary text-white btn-sm mb-2" style="background: #505050"><i
                        class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">

                <tbody>
                    <tr>

                        <th>Nama Pengisi</th>
                        <td>Remons Putra Predator</td>

                    </tr>
                    <tr>
                        <th>Lokasi Departemen APAR</th>
                        <td>Teknik Komputer</td>

                    </tr>
                    <tr>
                        <th>Nama Benda</th>
                        <td>APAR AIR</td>

                    </tr>
                    <tr>

                        <th>Tabung tidak berlubang atau cacat karena karat</th>
                        <td>Ya</td>

                    </tr>
                    <tr>

                        <th>APAR masih berisi</th>
                        <td>Ya</td>

                    </tr>
                    <tr>

                        <th>Tabung masih memiliki tekanan</th>
                        <td>Ya</td>

                    </tr>
                    <tr>

                        <th>Handle dalam keadaan baik</th>
                        <td>Ya</td>

                    </tr>
                    <tr>

                        <th>Label dalam keadaan baik</th>
                        <td>Ya</td>

                    </tr>
                    <tr>

                        <th>Mulut pancar tidak tersumbat</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Terdapat tanda pemasangan APAR</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Jarak tanda pemasangan APAR 125cm dari dasar lantai</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Jarak antar APAR 15 meter</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Tabung APAR berwarna merah</th>
                        <td>Ya</td>
                    </tr>

                    <tr>
                        <th>APAR dipasang menggantung di dinding dengan penguatan sengkang atau di dalam lemari yang tidak
                            dikunci </th>
                        <td>Ya</td>
                    </tr>

                    <tr>
                        <th>Terdapat keterangan petunjuk penggunaan APAR</th>
                        <td>Ya</td>
                    </tr>

                    <tr>
                        <th>Terdapat label catatan pemeriksaan</th>
                        <td>Ya</td>
                    </tr>

                    {{-- <tr>
                <th>Tindakan</th>
                <td>This is Dummy This is Dummy This is Dummy This is Dummy</td>
                </tr> --}}

                    </tr>
                </tbody>
            </table>

            <!--end::Content container-->
        </div>
    </div>
@stop
