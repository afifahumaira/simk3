@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-10 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>HIRARC</h2>
                    <a href="{{ route('hirarc.index') }}" type="button"
                        class="btn text-white btn-sm btn-secondary d-flex justify-content-center align-items-center mb-2"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background: #505050; width:90px"><i
                            class="bi bi-chevron-left text-white"></i>Kembali</a>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">

                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px font-weight:700">
                                        keluar dari tambah data?
                                        <p class="mb-0 mt-2 text-center "
                                            style="color: #DC3545; font-weight:400; font-size:14px"> data yang dimasukkan
                                            belum tersimpan </p>
                                    </h2>
                                </div>
                                <div class="modal-footer d-flex justify-content-center border-0">
                                    <a href="{{ route('hirarc.index') }}" type="button"
                                        class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                        style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                    <button type="button"
                                        class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                        data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-title  gap-1 mx-5 my-5  ">
                    <div id="kt_app_content"
                        class="app-content flex-column-fluid rounded   mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">

                        <div class="card ">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong>Tambah Data HIRARC</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                {{-- @include('layouts.alerts') --}}

                                <form action="{{ route('hirarc.simpan') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="col-form-label">Pilih Departemen</label>
                                        <div class=" w-100">
                                            <select name="departemen_id" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true"
                                                data-placeholder="Pilih Departemen">
                                                <option value="">Pilih Departemen</option>
                                                @foreach ($departments as $dep)
                                                    <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="location_id" class="form-label">Pilih Lokasi:</label>
                                        <select id="location_id" name="location_id" class="form-select"
                                            data-control="select2">
                                            <option value="">Pilih Lokasi</option>
                                            @foreach ($location as $loc)
                                                <option value="{{ $loc->id }}">{{ $loc->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div
                                        class="border  border-gray-300 d-flex justify-content-between align-items-center form-control py-2">
                                        <label class="form-label">Tambah Data</label>
                                        <a type="submit" href=""
                                            class="btn text-white btn-sm btn-primary d-flex justify-content-center align-items-center  rounded-1"
                                            data-bs-toggle="modal" data-bs-target="#modalTambah"
                                            style="background: #233EAE">
                                            <i class="bi bi-plus-lg fs-3 text-center text-white"></i>
                                        </a>
                                    </div>

                                    <div class="modal fade" id="modalTambah" data-bs-backdrop="static"
                                        data-bs-keyboard="false" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable ">
                                            <div class="modal-content border rounded-4 ">
                                                <div class="modal-header">
                                                    <h1 class="modal-title" id="staticBackdropLabel">Tambah Data</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body mt-5 ">
                                                    <div id="additionalForm">
                                                        <div class="mb-3">
                                                            <label for="activitie_id" class="form-label">Pilih
                                                                Aktifitas:</label>
                                                            <select id="activitie_id" name="activitie" class="form-select"
                                                                data-control="select2" data-dropdown-parent="#modalTambah">
                                                                <option value="">Pilih Aktifitas
                                                                </option>
                                                                @foreach ($activitie as $act)
                                                                    <option value="{{ $act->name }}">{{ $act->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div id="additionalForm">
                                                        <div class="mb-3">
                                                            <label for="activitie_id" class="form-label">Pilih
                                                                Hazard:</label>
                                                            <select id="hazard_id" name="hazard" class="form-select"
                                                                data-control="select2"
                                                                data-dropdown-parent="#modalTambah">
                                                                <option value="">Pilih Hazard
                                                                </option>
                                                                @foreach ($hazard as $haz)
                                                                    <option value="{{ $haz->name }}">
                                                                        {{ $haz->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div id="additionalForm">
                                                        <div class="mb-3">
                                                            <label for="activitie_id" class="form-label">Pilih
                                                                Risiko:</label>
                                                            <select id="risk_id" name="risk" class="form-select"
                                                                data-control="select2"
                                                                data-dropdown-parent="#modalTambah">
                                                                <option value="">Pilih Risiko
                                                                </option>
                                                                @foreach ($risk as $ris)
                                                                    <option value="{{ $ris->name }}">
                                                                        {{ $ris->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    {{-- <div class=" mt-5 d-flex justify-content-between" id="tambahResiko"
                                                        style="font-family: Helvetica, sans-serif">
                                                        <p class=" mb-0" style="color:rgba(22, 36, 61, 0.4);">
                                                            Masukkan data dengan lengkap</p>
                                                        <a type="button" id="addData"
                                                            class="text-end text-decoration-underline"
                                                            style="color:#233EAE" data-id="1"> + Tambah
                                                            Data </a>
                                                    </div> --}}

                                                    {{-- <div class="mb-3">
                                                        <label for="hazard_id_1" class="form-label">Hazard 1</label>
                                                        <select id="hazard_id_1" name="hazard[]"
                                                            class="form-select selectHazard" data-id="1"
                                                            data-control="select2" data-kt-placement="bottom"
                                                            data-dropdown-parent="#modalTambah">
                                                            <option value="">Pilih Aktifitas terlebih dahulu
                                                            </option>
                                                            @foreach ($hazard as $hazard)
                                                                <option value="{{ $hazard->name }}">{{ $hazard->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="risk_id_1" class="form-label">Resiko 1</label>
                                                        <select id="risk_id_1" name="risk[]"
                                                            class="form-select selectRisk" data-id="1"
                                                            data-control="select2" data-kt-placement="bottom"
                                                            data-dropdown-parent="#modalTambah">
                                                            <option value="">Pilih Hazard terlebih dahulu
                                                            </option>
                                                            @foreach ($risk as $risk)
                                                                <option value="{{ $risk->name }}">{{ $risk->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div> --}}
                                                    <div id="komponenBaru">
                                                        <!-- Komponen akan ditambahkan di sini -->
                                                    </div>
                                                </div>

                                                <div class="modal-footer d-flex justify-content-center border-0">
                                                    <div class=" d-flex justify-content-center">
                                                        <button type="submit" id="simpanAktifitas"
                                                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                                            style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;"
                                                            data-bs-toggle="modal" data-bs-target="#simpandata">Simpan
                                                            Data</button>

                                                        <a href="{{ route('hirarc.tambah') }}" type="submit"
                                                            class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                                            data-bs-toggle="modal" data-bs-target="#resetform"
                                                            style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="resetform" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content">

                                                <div
                                                    class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                                    <h2 class="mt-5 text-center"
                                                        style="color: #16243D; font-size: 20px font-weight:700">
                                                        keluar dari tambah
                                                        data?
                                                        <p class="mb-0 mt-2 text-center "
                                                            style="color: #DC3545; font-weight:400; font-size:14px">
                                                            data yang
                                                            dimasukkan belum tersimpan </p>
                                                    </h2>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center border-0">
                                                    <a href="{{ route('hirarc.tambah') }}" type="button"
                                                        class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                        style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                                    <button type="button"
                                                        class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                        data-bs-dismiss="modal"
                                                        style="width:76px; height:31px; ">Tidak</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="container ">
                        <div class="table-container" style="height: 500px; overflow-y: auto;">
                            <table
                                class="table table-bordered border-secondary  px-3 py-3 mb-5 shadow mt-10"style="height:20px !important;">
                                <thead>
                                    <tr>
                                        <th scope="col">Aktifitas</th>
                                        <th scope="col">Hazard</th>
                                        <th scope="col">Resiko</th>
                                        <th scope="col" class="col-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($hirarc as $hira)
                                        <tr>
                                            <td>{{ $hira->activity }}</td>
                                            <td>{{ $hira->hazard }}</td>
                                            <td>{{ $hira->risk }}</td>
                                            <td>
                                                <a href="{{ route('hirarc.tambahDetail', $hira->id) }}" type="button"
                                                    class="btn  btn-sm bg-primary"
                                                    style="font-weight: 400; font-size: 16px">
                                                    Lengkapi data
                                                    {{-- <i class="bi bi-pencil-square text-dark d-flex justify-content-center align-items-center"></i> --}}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                    {{-- @if (!$detail->prerating)
                                                <button href="" type="button" class="btn bg-hover-light-success text-hover-success px-0 my-3" data-bs-toggle="modal" data-bs-target="#PreControl{{ $detail->id }}">Tambah<br>Pre Control</button>
                                            @endif
                                            @if (!$detail->hirarc_detail_control)
                                                <button href="#" class="btn bg-hover-light-success text-hover-success d-flex justify-content-center px-0 my-3 " type="button" data-bs-toggle="modal" data-bs-target="#Solusi{{ $detail->id }}">Tambah Solusi</button>
                                            @endif
                                            @if (!$detail->postrating)
                                                <button href="#" type="button" class="btn bg-hover-light-success text-hover-success px-1 py-1 my-3" data-bs-toggle="modal" data-bs-target="#PostControl{{ $detail->id }}">Tambah <br> Post Control</button>
                                            @endif --}}
                    </td>
                    </tr>

                    {{-- MOODAL POST, SOLUSI, PRE CONTROL --}}
                    {{-- Pre Control --}}
                    {{-- <div class="modal fade" id="PreControl{{ $detail->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel{{ $detail->id }}">Pre
                                                        Control</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route('hirarc.simpanPreControl', ['id' => $detail->hirarc_id, 'detail_id' => $detail->id]) }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group my-5">
                                                            <label class="ps-3" for="select1">Keparahan
                                                                (severity)</label>
                                                            <select class="form-control" id="select_pre_severity_{{ $detail->id }}" name="pre_severity" data-control="select2" data-hide-search="true" required data-placeholder="Pilih Keparahan
                                                                (severity)">
                                                                <option value="" selected disabled>Pilih Keparahan
                                                                    (severity)</option>
                                                                <option value="1">
                                                                    Tergores, sayatan kecil, kerugian dalam rupiah sebesar Rp 1.000.000,-
                                                                </option>
                                                                <option value="3">Cidera menyebabkan absen maksimal 3 hari, kerugian
                                                                    dalam rupiah sebesar Rp 10.000.000,-</option>
                                                                <option value="7">Cidera menyebabkan absen lebih dari 3 hari, kerugian
                                                                    dalam rupiah sebesar Rp 50.000.000,-</option>
                                                                <option value="15">
                                                                    Cacat sementara, butuh rawat inap, kerugian dalam rupiah sebesar Rp
                                                                    100.000.000,-</option>
                                                                <option value="40">
                                                                    Cidera serius atau sampai kematian, kerugian dalam rupiah sebesar Rp
                                                                    1.000.000.000,-</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="ps-3" for="select2">Paparan
                                                                (Exposure)</label>
                                                            <select class="form-control" id="select_pre_exposure_{{ $detail->id }}" name="pre_exposure" data-control="select2" data-hide-search="true" required data-placeholder="Pilih Paparan
                                                                (Exposure)">
                                                                <option value="" selected disabled>Pilih Paparan
                                                                    (Exposure)</option>
                                                                <option value="0.5"> 1 kali dalam setahun</option>
                                                                <option value="1">Beberapa kali dalam setahun</option>
                                                                <option value="2">1 kali sebulan</option>
                                                                <option value="3">1 kali dalam seminggu</option>
                                                                <option value="6">1 kali dalam sehari</option>
                                                                <option value="10">Berkelanjutan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group my-5">
                                                            <label class="ps-3" for="select3">Kemungkinan
                                                                Terjadi (Probability)</label>
                                                            <select class="form-control" id="select_pre_probability_{{ $detail->id }}" name="pre_probability" data-control="select2"
                                                                data-hide-search="true" required data-placeholder="Pilih Kemungkinan Terjadi (Probability)">
                                                                <option value="" selected disabled>Pilih Kemungkinan
                                                                    Terjadi (Probability)</option>
                                                                <option value="1">
                                                                    Kejadian yang secara teori hanya mungkin terjadi
                                                                </option>
                                                                <option value="3">mungkin terjadi sekali dalam 10 tahun</option>
                                                                <option value="6">Kejadian yang jarang tetapi dapat sesekali terjadi
                                                                </option>
                                                                <option value="10">
                                                                    Peristiwa berulang setidaknya sekali dalam setahun</option>
                                                            </select>
                                                        </div>

                                                        <div class="container my-5">
                                                            <div class="hitung d-flex justify-content-center">
                                                                <button type="button" id="hitung{{ $detail->id }}"
                                                                    class="btn text-center d-flex align-items-center justify-content-center btn-primary btn-sm"
                                                                    style="background: #000957" onclick="hitungpreControl({{ $detail->id }})">Hitung</button>
                                                            </div>
                                                        </div>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-6 col-lg-6 d-flex justify-content-center align-items-center mb-5 mb-lg-0"
                                                                data-aos="fade-up" data-aos-delay="100">
                                                                <div class="icon-box d-flex align-items-center justify-content-center "
                                                                    style="width:113px; height:88px; box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1); ">
                                                                    <h4 id="hasilpre{{ $detail->id }}" class="title fw-bold" style="font-size: 24px">
                                                                        -<br /></h4>
                                                                    <input id="inputhasilpre{{ $detail->id }}" type="hidden" name="hasilprecontrol">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-end">
                                                        <button type="submit" class="btn text-center d-flex justify-content-center px-3 py-2" style=" background:#29CC6A; color:#ffffff;">Simpan</button>
                                                        <button type="button"
                                                            class="btn text-center d-flex justify-content-center border-0 px-2 py-2" style=" background:#868E96; color:#ffffff;" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Solusi --}}
                    {{-- <div class="modal fade" id="Solusi{{ $detail->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel{{ $detail->id }}">Pre
                                                        Control</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <form method="POST" action="{{ route('hirarc.simpanSolusi', ['id' => $detail->hirarc_id, 'detail_id' => $detail->id]) }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group mb-5">
                                                            <label class="ps-3" for="selectControl">Kontrol</label>
                                                            <select class="form-control selectControl" id="selectControl{{ $detail->id }}" name="control_id" data-id="{{ $detail->id }}" data-control="select2" data-hide-search="true" data-placeholder="Pilih Kontrol" required data-placeholder="Pilih Kontrol">
                                                                <option value="" selected>Pilih Kontrol</option>
                                                                @foreach ($controls as $control)
                                                                    <option value="{{ $control->id }}">{{ $control->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="ps-3" for="select2">Solusi
                                                                Penanganan</label>
                                                            <select class="form-control" id="selectSolusi{{ $detail->id }}" data-control="select2" data-hide-search="true" data-placeholder="Solusi" name="control_child_id" required>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-end">
                                                        <button type="submit" class="btn text-center d-flex justify-content-center px-3 py-2" style=" background:#29CC6A; color:#ffffff;">Simpan</button>
                                                        <button type="button" class="btn text-center d-flex justify-content-center border-0 px-2 py-2" style=" background:#868E96; color:#ffffff;" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Post Control --}}
                    {{-- <div class="modal fade" id="PostControl{{ $detail->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel{{ $detail->id }}">Post
                                                        Control</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form method="POST" action="{{ route('hirarc.simpanPostControl', ['id' => $detail->hirarc_id, 'detail_id' => $detail->id]) }}">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group my-5">
                                                            <label class="ps-3" for="select_post_severity_">Keparahan
                                                                (severity)</label>
                                                            <select class="form-control" id="select_post_severity_{{ $detail->id }}" name="post_severity" data-control="select2" data-hide-search="true" required data-placeholder="Keparahan
                                                                (severity)">
                                                                <option value="" selected disable>Keparahan
                                                                    (severity)</option>
                                                                <option value="1">
                                                                    Tergores, sayatan kecil, kerugian dalam rupiah sebesar Rp 1.000.000,-
                                                                </option>
                                                                <option value="3">Cidera menyebabkan absen maksimal 3 hari, kerugian
                                                                    dalam rupiah sebesar Rp 10.000.000,-</option>
                                                                <option value="7">Cidera menyebabkan absen lebih dari 3 hari, kerugian
                                                                    dalam rupiah sebesar Rp 50.000.000,-</option>
                                                                <option value="15">
                                                                    Cacat sementara, butuh rawat inap, kerugian dalam rupiah sebesar Rp
                                                                    100.000.000,-</option>
                                                                <option value="40">
                                                                    Cidera serius atau sampai kematian, kerugian dalam rupiah sebesar Rp
                                                                    1.000.000.000,-</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group ">
                                                            <label class="ps-3" for="select_post_exposure_">Paparan
                                                                (Exposure)</label>
                                                            <select class="form-control" id="select_post_exposure_{{ $detail->id }}" name="post_exposure" data-control="select2" data-hide-search="true" required data-placeholder="Paparan
                                                                (Exposure)">
                                                                <option value="" selected disable>Paparan
                                                                    (Exposure)</option>
                                                                <option value="0.5"> 1 kali dalam setahun</option>
                                                                <option value="1">Beberapa kali dalam setahun</option>
                                                                <option value="2">1 kali sebulan</option>
                                                                <option value="3">1 kali dalam seminggu</option>
                                                                <option value="6">1 kali dalam sehari</option>
                                                                <option value="10">Berkelanjutan</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group my-5">
                                                            <label class="ps-3" for="select3">Kemungkinan
                                                                Terjadi (Probability)</label>
                                                            <select class="form-control" id="select_post_probability_{{ $detail->id }}" name="post_probability" data-control="select2"
                                                                data-hide-search="true" required data-placeholder="Kemungkinan
                                                                Terjadi (Probability)">
                                                                <option value="" selected disable>Kemungkinan
                                                                    Terjadi (Probability)</option>
                                                                <option value="1">
                                                                    Kejadian yang secara teori hanya mungkin terjadi
                                                                </option>
                                                                <option value="3">mungkin terjadi sekali dalam 10 tahun</option>
                                                                <option value="6">Kejadian yang jarang tetapi dapat sesekali terjadi
                                                                </option>
                                                                <option value="10">
                                                                    Peristiwa berulang setidaknya sekali dalam setahun</option>
                                                            </select>
                                                        </div>
                                                        <div class="container my-5">
                                                            <div class="hitung d-flex justify-content-center">
                                                                <button type="button" id="hitung{{ $detail->id }}"
                                                                    class="btn text-center d-flex align-items-center justify-content-center btn-primary btn-sm"
                                                                    style="background: #000957" onclick="hitungpostControl({{ $detail->id }})">Hitung</button>
                                                            </div>
                                                        </div>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-md-6 col-lg-6 d-flex justify-content-center align-items-center mb-5 mb-lg-0"
                                                                data-aos="fade-up" data-aos-delay="100">
                                                                <div class="icon-box d-flex align-items-center justify-content-center "
                                                                    style="width:113px; height:88px; box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1); ">
                                                                    <h4 id="hasilpost{{ $detail->id }}" class="title fw-bold" style="font-size: 24px">
                                                                        -<br /></h4>
                                                                    <input id="inputhasilpost{{ $detail->id }}" type="hidden" name="hasilpostcontrol">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer d-flex justify-content-end">
                                                        <button type="submit" class="btn text-center d-flex justify-content-center px-3 py-2" style=" background:#29CC6A; color:#ffffff;">Simpan</button>
                                                        <button type="button" class="btn text-center d-flex justify-content-center border-0 px-2 py-2"
                                                            style=" background:#868E96; color:#ffffff;" data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- END MOODAL POST, SOLUSI, PRE CONTROL --}}
                    {{-- @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="container ">
                    <div class=" d-flex justify-content-center">
                        <button type="submit"
                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                            style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan Data</button>
                        <a href="{{ route('hirarc.tambah') }}" type="submit"
                            class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                            data-bs-toggle="modal" data-bs-target="#resetform"
                            style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
                        <div class="modal fade" id="resetform" data-bs-backdrop="static" data-bs-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered ">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                    <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                        <h2 class="mt-5 text-center"
                                            style="color: #16243D; font-size: 20px font-weight:700">
                                            keluar dari tambah
                                            data?
                                            <p class="mb-0 mt-2 text-center "
                                                style="color: #DC3545; font-weight:400; font-size:14px"> data yang
                                                dimasukkan belum tersimpan </p>
                                        </h2>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center border-0">
                                        <a href="{{ route('hirarc.tambah') }}" type="button"
                                            class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                            style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                        <button type="button"
                                            class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                            data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   --}}

                    <!--end::Content container-->

                </div>
            </div>
        @stop

        @section('custom-css')
            <style>
                #risiko-sekarang .btn {
                    box-sizing: border-box;
                    border: 1px solid #009B3E;
                    border-radius: 5px;
                    width: 122px;
                    height: 40px;
                    display: flex;
                    align-items: center;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 14px;
                    font-weight: 400;
                    color: #009B3E;
                    text-align: center;
                    margin: 10px 20px 30px 20px;
                }

                #RisikoSaatini .btn {
                    box-sizing: border-box;
                    border: 1px solid #009B3E;
                    border-radius: 5px;
                    /* height: 40px; */
                    width: 100%;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 14px;
                    font-weight: 400;
                    color: #009B3E;
                    /* text-align: center; */
                }

                #risiko-sekarang #postControl .hitung .btn,
                #risiko-sekarang #solusi .hitung .btn,
                #risiko-sekarang #postControl .hitung .btn {
                    border: none !important;
                    color: #ffffff;
                }

                #risiko-sekarang #preControl .icon-box {
                    display: flex;
                    justify-content: center;
                    margin-bottom: 20px;
                    padding: 15px;
                    border-radius: 6px;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.15);
                    width: 144px;
                    height: 99px;
                }
            </style>
        @stop

        @section('customscript')
            <script>
                let hazards = [];

                $(document).ready(function() {

                    $('#simpanAktifitas').on('click', function() {
                        // $('#tabelp3k').slideDown (500);
                        if ($('#tabelTambahData').is(":hidden")) {
                            $('#tabelTambahData').slideDown('slow');
                        } else {
                            $('#tabelTambahData').slideUp('slow');
                            $('#tabelTambahData').slideDown('slow');
                        }
                    });

                    $('#departemen_id').on('change', function() {
                        var select = $('#location_id');
                        select.closest("div").find(".select2-selection.select2-selection--single").addClass(
                            'loading');
                        select.prop('disabled', 'disabled');

                        let location_id = $(this).val();
                        var url = "{{ route('hirarc.getLocation', ':id') }}";
                        url = url.replace(':id', location_id);
                        $.ajax({
                            url: url,
                            type: "GET",
                            dataType: "json",
                            data: {
                                location_id: location_id
                            },
                            console.log(data);
                            success: function(data) {
                                select.empty();
                                select.append(
                                    '<option value="" selected disabled >Pilih Lokasi</option>');
                                $('#aktifitas_id').empty();
                                $('#aktifitas_id').append(
                                    '<option value="" selected disabled >Pilih Aktifitas</option>');
                                $('#hazard_id').empty();
                                $('#hazard_id').append(
                                    '<option value="" selected disabled >Pilih Hazard</option>');
                                $('#risiko_id').empty();
                                $('#risiko_id').append(
                                    '<option value="" selected disabled >Pilih Risiko</option>');
                                $.each(data, function(key, value) {
                                    select.append('<option value="' + value.id + '">' + value
                                        .name + '</option>');
                                });
                            },
                            error: function(data) {

                            }
                        }).done(function(data) {
                            select.prop('disabled', false);
                            select.closest("div").find(".select2-selection.select2-selection--single")
                                .removeClass('loading');
                        });
                    });

                    $('#location_id').on('change', function() {
                        var select = $('#aktifitas_id');
                        select.closest("div").find(".select2-selection.select2-selection--single").addClass(
                            'loading');
                        select.prop('disabled', 'disabled');

                        let aktifitas_id = $(this).val();
                        var url = "{{ route('hirarc.getAktifitas', ':id') }}";
                        url = url.replace(':id', aktifitas_id);
                        $.ajax({
                            url: url,
                            type: "GET",
                            dataType: "json",
                            data: {
                                aktifitas_id: aktifitas_id
                            },
                            success: function(data) {
                                select.empty();
                                select.append(
                                    '<option value="" selected disabled >Pilih Aktifitas</option>');
                                $('#hazard_id').empty();
                                $('#hazard_id').append(
                                    '<option value="" selected disabled >Pilih Hazard</option>');
                                $('#risiko_id').empty();
                                $('#risiko_id').append(
                                    '<option value="" selected disabled >Pilih Risiko</option>');
                                $.each(data, function(key, value) {
                                    select.append('<option value="' + value.id + '">' + value
                                        .name + '</option>');
                                });
                            },
                            error: function(data) {

                            }
                        }).done(function(data) {
                            select.prop('disabled', false);
                            select.closest("div").find(".select2-selection.select2-selection--single")
                                .removeClass('loading');
                        });
                    });

                    $('#aktifitas_id').on('change', function() {
                        $('div#komponenBaru').empty();
                        $('#addData').attr('data-id', 1);
                        var select = $('#hazard_id_1');
                        select.closest("div").find(".select2-selection.select2-selection--single").addClass(
                            'loading');
                        select.prop('disabled', 'disabled');

                        let hazard_id = $(this).val();
                        var url = "{{ route('hirarc.getHazard', ':id') }}";
                        url = url.replace(':id', hazard_id);
                        $.ajax({
                            url: url,
                            type: "GET",
                            dataType: "json",
                            data: {
                                hazard_id: hazard_id
                            },
                            success: function(data) {
                                hazards = data;
                                select.empty();
                                select.append(
                                    '<option value="" selected disabled >Pilih Hazard</option>');
                                $('#risiko_id_1').empty();
                                $('#risiko_id_1').append(
                                    '<option value="" selected disabled >Pilih Risiko</option>');
                                $.each(data, function(key, value) {
                                    select.append('<option value="' + value.id + '">' + value
                                        .name + '</option>');
                                });
                            },
                            error: function(data) {

                            }
                        }).done(function(data) {
                            select.prop('disabled', false);
                            select.closest("div").find(".select2-selection.select2-selection--single")
                                .removeClass('loading');
                        });
                    });

                    bindEvent(1);

                    $('#addData').on('click', function() {
                        let btnAdd = $(this);
                        let data_id = btnAdd.attr("data-id");
                        let data_new_id = parseInt(data_id) + 1;
                        let komponendiv = $('div#komponenBaru');
                        let item = `
                    <div class="mb-3">
                        <label for="hazard_id_${data_new_id}" class="form-label">Hazard ${data_new_id}</label>
                        <select id="hazard_id_${data_new_id}" data-id="${data_new_id}" name="hazard_id[]" class="form-select"
                            data-control="select2" data-kt-placement="bottom"
                            data-dropdown-parent="#modalTambah">
                            <option value="">Pilih Aktifitas terlebih dahulu
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="risiko_id_${data_new_id}"
                            class="col-sm-2 col-form-label pt-0">Risiko ${data_new_id}
                        </label>
                        <select class="form-select fs-6 w-100"
                            id="risiko_id_${data_new_id}" name="risiko_id[]" data-control="select2"
                            data-kt-placement="bottom"
                            data-dropdown-parent="#modalTambah">
                            <option value="">Pilih Hazard terlebih dahulu
                            </option>
                        </select>
                    </div>
                `;

                        komponendiv.append(item);
                        btnAdd.attr("data-id", data_new_id);
                        var selectHazard = komponendiv.find("#hazard_id_" + data_new_id);
                        console.log(selectHazard);
                        hazards.forEach(data => {
                            console.log(data);
                            selectHazard.append('<option value="' + data.id + '">' + data.name +
                                '</option>');
                        });
                        selectHazard.select2({

                        });
                        bindEvent(data_new_id);
                    });

                    $('.selectControl').on('change', function() {
                        var data_id = $(this).attr('data-id');
                        var select = $('#selectSolusi' + data_id);
                        select.closest("div").find(".select2-selection.select2-selection--single").addClass(
                            'loading');
                        select.prop('disabled', 'disabled');

                        let control_id = $(this).val();
                        var url = "{{ route('hirarc.getControlChildren', ':id') }}";
                        url = url.replace(':id', control_id);
                        $.ajax({
                            url: url,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                hazards = data;
                                select.empty();
                                select.append(
                                    '<option value="" selected disabled >Pilih Hazard</option>');
                                $('#risiko_id_1').empty();
                                $('#risiko_id_1').append(
                                    '<option value="" selected disabled >Pilih Risiko</option>');
                                $.each(data, function(key, value) {
                                    select.append('<option value="' + value.id + '">' + value
                                        .name + '</option>');
                                });
                            },
                            error: function(data) {

                            }
                        }).done(function(data) {
                            select.prop('disabled', false);
                            select.closest("div").find(".select2-selection.select2-selection--single")
                                .removeClass('loading');
                        });
                    });
                });

                function bindEvent(id) {
                    $('#hazard_id_' + id).on('change', function() {
                        let data_id = $(this).attr("data-id");
                        var select = $('#risiko_id_' + data_id);
                        select.closest("div").find(".select2-selection.select2-selection--single").addClass('loading');
                        select.prop('disabled', 'disabled');

                        let risiko_id = $(this).val();
                        var url = '{{ route('hirarc.getRisk', ':id') }}';
                        url = url.replace(':id', risiko_id);
                        $.ajax({
                            url: url,
                            type: "GET",
                            dataType: "json",
                            data: {
                                risiko_id: risiko_id
                            },
                            success: function(data) {
                                select.empty();
                                select.append('<option value="" selected disabled >Pilih Risiko</option>');
                                $.each(data, function(key, value) {
                                    select.append('<option value="' + value.id + '">' + value.name +
                                        '</option>');
                                });
                                select.select2();
                            },
                            error: function(data) {

                            }
                        }).done(function(data) {
                            select.prop('disabled', false);
                            select.closest("div").find(".select2-selection.select2-selection--single").removeClass(
                                'loading');
                        });
                    });
                }

                function hitungpreControl(id) {
                    var hasilpre = $('#hasilpre' + id);
                    var inputhasilpre = $('#inputhasilpre' + id);
                    var sel1 = $('#select_pre_severity_' + id).val();
                    var sel2 = $('#select_pre_exposure_' + id).val();
                    var sel3 = $('#select_pre_probability_' + id).val();

                    var hasil = sel1 * sel2 * sel3;
                    hasilpre.html(hasil);
                    inputhasilpre.val(hasil);
                }

                function hitungpostControl(id) {
                    var hasilpost = $('#hasilpost' + id);
                    var inputhasilpost = $('#inputhasilpost' + id);
                    var sel1 = $('#select_post_severity_' + id).val();
                    var sel2 = $('#select_post_exposure_' + id).val();
                    var sel3 = $('#select_post_probability_' + id).val();

                    var hasil = sel1 * sel2 * sel3;
                    hasilpost.html(hasil);
                    inputhasilpost.val(hasil);
                }
            </script>
        @stop
