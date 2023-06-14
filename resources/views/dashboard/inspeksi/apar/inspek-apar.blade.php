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
                <a href="{{ route('aparinspeksi.index') }} " type="button" class="btn btn-secondary text-white btn-sm mb-2"
                    style="background: #505050"><i class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <form action="{{ route('aparinspeksi.store')}}" method="POST" >
                @csrf
                <div class="  mb-5">
                    <label class="col-sm-2 ps-2 col-form-label ">Lokasi Departemen</label>
                    <div class="col-sm-10 w-100">
                        <div class="form-group label-floating is-empty is-focused">
                            <input class="form-control bg-dark-subtle text-dark text-center"
                                value="{{$data->departemen->name}}" readonly>
                            <input class="form-control bg-dark-subtle text-dark text-center"
                                type="hidden" name="departemen_id" value="{{$data->departemen_id}}" readonly>
                        </div>
                    </div>
                </div>
                <table class="table  table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow"
                    style="background: #F5F4EF">

                    <tbody>
                        <tr>
                            <input type="hidden" name="inventory_id" value="{{$data->id}}">
                            <th>Nama Pengisi</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <input class="form-control bg-dark-subtle text-dark text-center"
                                value="{{Auth::user()->name}}" readonly>
                                <input class="form-control bg-dark-subtle text-dark text-center" type="hidden" name="user_id"
                                value="{{Auth::user()->id}}" readonly>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <th>Lokasi APAR</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <input class="form-control bg-dark-subtle text-dark text-center"
                                value="{{$data->lokasi}}" readonly>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <th>Nama Benda</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <input class="form-control bg-dark-subtle text-dark text-center"
                                value="{{$data->name}}" readonly>
                                </div>
                            </td>

                        </tr>
                        <tr>

                            <th>Tabung tidak berlubang atau cacat karena karat</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q2"
                                            id="q2" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q2"
                                            id="q2" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <tr>

                            <th>APAR masih berisi</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q3"
                                            id="q3" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q3"
                                            id="q3" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <tr>

                            <th>Tabung masih memiliki tekanan</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q4"
                                            id="q4" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q4"
                                            id="q4" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <tr>

                            <th>Handle dalam keadaan baik</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q5"
                                            id="q5" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q5"
                                            id="q5" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <tr>

                            <th>Label dalam keadaan baik</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q6"
                                            id="q6" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q6"
                                            id="q6" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        <tr>

                            <th>Mulut pancar tidak tersumbat</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q7"
                                            id="q7" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q7"
                                            id="q7" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Terdapat tanda pemasangan APAR</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q8"
                                            id="q8" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q8"
                                            id="q8" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Jarak tanda pemasangan APAR 125cm dari dasar lantai</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q9"
                                            id="q9" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q9"
                                            id="q9" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Jarak antar APAR 15 meter</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q10"
                                            id="q10" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q10"
                                            id="q10" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Tabung APAR berwarna merah</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q11"
                                            id="q11" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q11"
                                            id="q11" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th>APAR dipasang menggantung di dinding dengan penguatan sengkang atau di dalam lemari yang tidak
                                dikunci </th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q12"
                                            id="q12" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q12"
                                            id="q12" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th>Terdapat keterangan petunjuk penggunaan APAR</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q13"
                                            id="q13" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q13"
                                            id="q13" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <th>Terdapat label catatan pemeriksaan</th>
                            <td>
                                <div class="d-flex justify-content-around align-items-center">
                                    <div class="form-check px-3">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q14"
                                            id="q14" value="yes">
                                        <label class="form-check-label text-dark btn-secondary" for="">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input bg-dark-subtle" type="radio" name="q14"
                                            id="q14" value="no">
                                        <label class="form-check-label text-dark" for="">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        {{-- <tr>
                    <th>Tindakan</th>
                    <td>
                        <div class="d-flex justify-content-around align-items-center">
                        <div class="form-check px-3">
                            <input class="form-check-input bg-dark-subtle" type="radio" name="flexRadioDefault17" id="flexRadioDefault17">
                            <label class="form-check-label text-dark btn-secondary" for="">
                            Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input bg-dark-subtle" type="radio" name="flexRadioDefault17" id="flexRadioDefault17" >
                            <label class="form-check-label text-dark" for="">
                            Tidak
                            </label>
                        </div>
                        </div>
                    </td>
                    </tr> --}}

                        </tr>
                    </tbody>
                </table>
                <div class="container d-flex justify-content-center">
                    <div>
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                        <a style="margin: 30px" class="btn btn-secondary"
                            type="reset"> Reset
                        </a>
                    </div>
                </div>
            </form>
        <!--end::Content container-->
        </div>
    </div>
@stop
