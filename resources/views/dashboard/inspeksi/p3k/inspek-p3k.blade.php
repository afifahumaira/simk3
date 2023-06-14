@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Edit Inspeksi P3K</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <a href="{{ route('p3kinspeksi.index') }} " type="button" class="btn btn-secondary text-white btn-sm mb-2"
                    style="background: #505050"><i class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
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
                        <input type="hidden" name="p3k_inventory_id" value="{{$data->id}}">
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
                        <th>Lokasi Departemen P3K</th>
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

                        <th>Kotak P3K terbuat dari bahan yang kuat</th>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="form-check px-3">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q1"
                                        id="q1" value="yes">
                                    <label class="form-check-label text-dark btn-secondary" for="">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q1"
                                        id="q1" value="no">
                                    <label class="form-check-label text-dark" for="">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </td>

                    </tr>
                    <tr>

                        <th>Kotak P3K mudah dibawa</th>
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

                        <th>Kotak P3K berbahan dasar putih dengan lambang berwarna hijau</th>
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

                        <th>Penempatan kotak P3K diletakkan pada tempat yang mudah terlihat dan dijangkau</th>
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

                        <th>Terdapat kasa steril terbungkus</th>
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

                        <th>Terdapat kasa gulung dengan lebar 5cm</th>
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
                        <th>Terdapat kasa gulung dengan lebar 10cm</th>
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
                        <th>Terdapat plester dengan lebar 1,25cm</th>
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
                        <th>Terdapat kapas 25 gram</th>
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
                        <th>Terdapat kain segitiga/Elastic Bandage</th>
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
                        <th>Terdapat gunting </th>
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
                        <th>Terdapat sarung tangan sekali pakai</th>
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
                        <th>Terdapat masker sekali pakai</th>
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

                    <tr>
                        <th>Terdapat lampu senter</th>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="form-check px-3">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q15"
                                        id="q15" value="yes">
                                    <label class="form-check-label text-dark btn-secondary" for="">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q15"
                                        id="q15" value="no">
                                    <label class="form-check-label text-dark" for="">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Terdapat kantong plastik bersih</th>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="form-check px-3">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q16"
                                        id="q16" value="yes">
                                    <label class="form-check-label text-dark btn-secondary" for="">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q16"
                                        id="q16" value="no">
                                    <label class="form-check-label text-dark" for="">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Terdapat gelas untuk cuci mata</th>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="form-check px-3">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q17"
                                        id="q17" value="yes">
                                    <label class="form-check-label text-dark btn-secondary" for="">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q17"
                                        id="q17" value="no">
                                    <label class="form-check-label text-dark" for="">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Terdapat aquades</th>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="form-check px-3">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q18"
                                        id="q18" value="yes">
                                    <label class="form-check-label text-dark btn-secondary" for="">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q18"
                                        id="q18" value="no">
                                    <label class="form-check-label text-dark" for="">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Terdapat betadine/povidon iodine</th>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="form-check px-3">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q19"
                                        id="q19" value="yes">
                                    <label class="form-check-label text-dark btn-secondary" for="">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q19"
                                        id="q19" value="no">
                                    <label class="form-check-label text-dark" for="">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Terdapat alkohol 70%</th>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="form-check px-3">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q20"
                                        id="q20" value="yes">
                                    <label class="form-check-label text-dark btn-secondary" for="">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q20"
                                        id="q20" value="no">
                                    <label class="form-check-label text-dark" for="">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Terdapat buku panduan P3K</th>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="form-check px-3">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q21"
                                        id="q21" value="yes">
                                    <label class="form-check-label text-dark btn-secondary" for="">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q21"
                                        id="q21" value="no">
                                    <label class="form-check-label text-dark" for="">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <th>Terdapat daftar isi kotak P3K</th>
                        <td>
                            <div class="d-flex justify-content-around align-items-center">
                                <div class="form-check px-3">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q22"
                                        id="q22" value="yes">
                                    <label class="form-check-label text-dark btn-secondary" for="">
                                        Ya
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input bg-dark-subtle" type="radio" name="q22"
                                        id="q22" value="no">
                                    <label class="form-check-label text-dark" for="">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>



                </tbody>
            </table>
            <div class="container d-flex justify-content-center">
                <div>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a style="margin: 30px" href="{{ route('edit-investigasi.index') }}" class="btn btn-secondary"
                        type="reset"> Reset
                    </a>
                </div>
            </div>
        </div>
        <!--end::Content container-->
    </div>
    </div>
@stop
