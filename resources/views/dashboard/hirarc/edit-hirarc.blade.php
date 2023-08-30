@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
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
                                    <strong>Ubah Data HIRARC</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                @include('layouts.alerts')
                                <!--begin::Content container-->
                                <table class="table table-bordered border-secondary rounded-5 shadow">

                                    <tbody style="">
                                        <tr>
                                            <th>Departemen</th>
                                            <td>{{ $hirarc->departemen->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Lokasi</th>
                                            <td>{{ $hirarc->location->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Pelapor</th>
                                            <td>{{ $hirarc->user->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lapor</th>
                                            <td>{{ $hirarc->created_at->translatedFormat('d F Y') }}</td>
                                        </tr>
                                    </tbody>
                                </table>

                                {{-- <div
                                    class="border  border-gray-300 d-flex justify-content-between align-items-center form-control py-2">
                                    <label class="form-label">Tambah Data</label>
                                    <a type="submit"
                                        href="https://www.youtube.com/watch?v=iEu7XXvNUgw&ab_channel=SecretMusic"
                                        class="btn text-white btn-sm btn-primary d-flex justify-content-center align-items-center  rounded-1"
                                        data-bs-toggle="modal" data-bs-target="#modalTambah" style="background: #233EAE">
                                        <i class="bi bi-plus-lg fs-3 text-center text-white"></i>
                                    </a>
                                </div> --}}

                                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false"
                                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable ">
                                        <div class="modal-content border rounded-4 ">
                                            <div class="modal-header">
                                                <h1 class="modal-title" id="staticBackdropLabel">Edit Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('hirarc.update', $hirarc->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body mt-5 ">
                                                    <div id="additionalForm">
                                                        <div class="mb-3">
                                                            <label for="activitie" class="form-label">Pilih
                                                                Aktifitas:</label>
                                                            <select id="activitie" name="activitie" class="form-select"
                                                                data-control="select2" data-hide-search="true">
                                                                <option value="">Pilih Lokasi terlebih dahulu</option>

                                                                <option value="{{ $activitie->name }}">
                                                                    {{ $activitie->name }}</option>

                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class=" mt-5 d-flex justify-content-between" id="tambahResiko"
                                                        style="font-family: Roboto">
                                                        <p class=" mb-0" style="color:rgba(22, 36, 61, 0.4);">
                                                            Masukkan data dengan lengkap</p>
                                                        <a type="button" id="addData"
                                                            class="text-end text-decoration-underline" style="color:#233EAE"
                                                            data-id="1"> + Tambah
                                                            Data </a>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="hazard_id_1" class="form-label">Hazard 1</label>
                                                        <select id="hazard_id_1" name="hazard[]"
                                                            class="form-select selectHazard" data-id="1"
                                                            data-control="select2" data-kt-placement="bottom"
                                                            data-dropdown-parent="#modalTambah">
                                                            <option value="">Pilih Aktifitas terlebih dahulu
                                                            </option>

                                                            <option value="{{ $hazard->name }}">{{ $hazard->name }}
                                                            </option>

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

                                                            <option value="{{ $risk->name }}">{{ $risk->name }}
                                                            </option>

                                                        </select>
                                                    </div>
                                                    <div id="komponenBaru">
                                                        <!-- Komponen akan ditambahkan di sini -->
                                                    </div>
                                                </div>

                                                <div class="modal-footer d-flex justify-content-center border-0">
                                                    <div class=" d-flex justify-content-center">
                                                        <button type="submit" id="simpanAktifitas"
                                                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                                            style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;"
                                                            data-bs-target="#simpandata">Simpan
                                                            Data</button>

                                                        {{-- <a href="{{ route('hirarc.editDetail') }}" type="submit"
                                                            class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                                            data-bs-toggle="modal" data-bs-target="#resetform"
                                                            style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a> --}}

                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="tabelTambahData" class="table table-bordered border-secondary px-3 py-3 mb-5 shadow"
                        style="margin-top: 40px; margin-bottom:10px;">
                        <thead px-3>
                            <tr>
                                <th scope="col">Aktifitas</th>
                                <th scope="col">Hazard</th>
                                <th scope="col">Resiko</th>
                                <th scope="col"style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hirarc as $hir)
                                <tr>
                                    <td>{{ $hirarc->activity }}</td>
                                    <td>{{ $hirarc->hazard }}</td>
                                    <td>{{ $hirarc->risk }}</td>
                                    <td>
                                        <a href="{{ route('hirarc.editDetail', $hirarc->id) }}" type="button"
                                            class="btn  btn-sm bg-primary" style="width:20px;"><i
                                                class="bi bi-pencil-square text-dark d-flex justify-content-center align-items-center"></i></a>
                                    </td>
                                </tr>

                                {{-- <div class="modal fade" id="Editdata{{ $hirarc->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable ">
                                        <div class="modal-content border rounded-4 ">
                                            <div class="modal-header">
                                                <h1 class="modal-title" id="staticBackdropLabel">Ubah Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('hirarc.update', $hirarc->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="hirarc_id" value="{{ $activitie->id }}">
                                                <div class="modal-body mt-5">
                                                    <div class="ps-3 pe-5">
                                                        <label class="col-form-label">Aktifitas</label>
                                                        <div class=" w-100">
                                                            <input type="text" class="form-control" name="activitie"
                                                                id="activitie_id" value="{{ $actitivite->name }}">{{ $activitie->name }}>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="hazard_id{{ $hazard->id }}" class="form-label">Hazard</label>
                                                        <select id="hazard_id{{ $hazard->id }}" name="hazard_id" class="form-select selectHazard" data-id="{{ $hazard->id }}" data-control="select2" data-kt-placement="bottom" data-dropdown-parent="#Editdata{{ $hirarc->id }}">
                                                            <option value="{{ $hazard->hazard_id }}">{{ $hazard->hazard->name }}</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="risk_id{{ $risk->id }}" class="col-sm-2 col-form-label pt-0">Risiko</label>
                                                        <select class="form-select fs-6 w-100 selectRisiko" id="risk_id{{ $risk->id }}"
                                                            name="risk_id" data-control="select2" data-kt-placement="bottom"
                                                            data-dropdown-parent="#Editdata{{ $hirarc->id }}">
                                                            <option value="{{ $risk->risk_id }}">{{ $risk->risk->name }}</option>
                                                        </select>
                                                    </div>
                                                    <div id="risiko-sekarang"
                                                        class="  mt-5 pt-3 d-flex justify-content-center align-items-center">
                                                        <a href="" type="button" class="btn" data-bs-toggle="modal"
                                                            data-bs-target="#EditPreControl{{ $hazard->id }}">Pre Control</a>
                                                        <a href="#" class="btn d-flex justify-content-center" type="button"
                                                            data-bs-toggle="modal" data-bs-target="#EditSolusi{{ $hazard->id }}">
                                                            Solusi
                                                        </a>
                                                        <a href="#" type="button" class="btn" data-bs-toggle="modal"
                                                            data-bs-target="#EditPostControl{{ $hazard->id }}">Post Control</a>
                                                    </div>
                                                </div> --}}

                                {{-- <div class="modal-footer d-flex justify-content-center border-0">
                                                    <div class=" d-flex justify-content-center">
                                                        <button type="submit" id="simpanAktifitas"
                                                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                                            style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan
                                                            Data</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}

                                {{-- MOODAL POST, SOLUSI, PRE CONTROL --}}
                                {{-- Pre Control --}}
                                {{-- <div class="modal fade" id="EditPreControl{{ $detail->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                                        <select class="form-control" id="select_pre_severity_{{ $detail->id }}" name="pre_severity" data-control="select2" data-hide-search="true" required data-placeholder="Pilih Keparahan (severity)" data-dropdown-parent="#EditPreControl{{ $detail->id }}">
                                                            <option value="">Pilih Keparahan (severity)</option>
                                                            <option value="1" @if ($detail->prerating) @if ($detail->prerating->pre_severity == '1') selected @endif @endif>
                                                                Tergores, sayatan kecil, kerugian dalam rupiah sebesar Rp 1.000.000,-
                                                            </option>
                                                            <option value="3" @if ($detail->prerating) @if ($detail->prerating->pre_severity == '3') selected @endif @endif>Cidera menyebabkan absen maksimal 3 hari, kerugian
                                                                dalam rupiah sebesar Rp 10.000.000,-</option>
                                                            <option value="7" @if ($detail->prerating) @if ($detail->prerating->pre_severity == '7') selected @endif @endif>Cidera menyebabkan absen lebih dari 3 hari, kerugian
                                                                dalam rupiah sebesar Rp 50.000.000,-</option>
                                                            <option value="15" @if ($detail->prerating) @if ($detail->prerating->pre_severity == '15') selected @endif @endif>
                                                                Cacat sementara, butuh rawat inap, kerugian dalam rupiah sebesar Rp
                                                                100.000.000,-</option>
                                                            <option value="40" @if ($detail->prerating) @if ($detail->prerating->pre_severity == '40') selected @endif @endif>
                                                                Cidera serius atau sampai kematian, kerugian dalam rupiah sebesar Rp
                                                                1.000.000.000,-</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="ps-3" for="select2">Paparan
                                                            (Exposure)</label>
                                                        <select class="form-control" id="select_pre_exposure_{{ $detail->id }}" name="pre_exposure" data-control="select2" data-hide-search="true" required data-placeholder="Pilih Paparan (Exposure)" data-dropdown-parent="#EditPreControl{{ $detail->id }}">
                                                            <option value="">Pilih Paparan
                                                                (Exposure)</option>
                                                            <option value="0.5" @if ($detail->prerating) @if ($detail->prerating->pre_exposure == '0.5') selected @endif @endif> 1 kali dalam setahun</option>
                                                            <option value="1" @if ($detail->prerating) @if ($detail->prerating->pre_exposure == '1') selected @endif @endif>Beberapa kali dalam setahun</option>
                                                            <option value="2" @if ($detail->prerating) @if ($detail->prerating->pre_exposure == '2') selected @endif @endif>1 kali sebulan</option>
                                                            <option value="3" @if ($detail->prerating) @if ($detail->prerating->pre_exposure == '3') selected @endif @endif>1 kali dalam seminggu</option>
                                                            <option value="6" @if ($detail->prerating) @if ($detail->prerating->pre_exposure == '6') selected @endif @endif>1 kali dalam sehari</option>
                                                            <option value="10" @if ($detail->prerating) @if ($detail->prerating->pre_exposure == '10') selected @endif @endif>Berkelanjutan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group my-5">
                                                        <label class="ps-3" for="select_pre_probability_{{ $detail->id }}">Kemungkinan
                                                            Terjadi (Probability)</label>
                                                        <select class="form-control" id="select_pre_probability_{{ $detail->id }}" name="pre_probability" data-control="select2" data-hide-search="true" required data-placeholder="Pilih Kemungkinan Terjadi (Probability)" data-dropdown-parent="#EditPreControl{{ $detail->id }}">
                                                            <option value="">Pilih Kemungkinan
                                                                Terjadi (Probability)</option>
                                                            <option value="1" @if ($detail->prerating) @if ($detail->prerating->pre_exposure == '1') selected @endif @endif>
                                                                Kejadian yang secara teori hanya mungkin terjadi
                                                            </option>
                                                            <option value="3" @if ($detail->prerating) @if ($detail->prerating->pre_exposure == '3') selected @endif @endif>mungkin terjadi sekali dalam 10 tahun</option>
                                                            <option value="6" @if ($detail->prerating) @if ($detail->prerating->pre_exposure == '6') selected @endif @endif>Kejadian yang jarang tetapi dapat sesekali terjadi
                                                            </option>
                                                            <option value="10" @if ($detail->prerating) @if ($detail->prerating->pre_exposure == '10') selected @endif @endif>
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
                                                                    {{ $detail->prerating->hasilprecontrol ?? '' }}<br /></h4>
                                                                <input id="inputhasilpre{{ $detail->id }}" type="hidden" name="hasilprecontrol" value="{{ $detail->prerating->hasilprecontrol ?? '' }}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-end">
                                                    <button type="submit" class="btn text-center d-flex justify-content-center px-3 py-2" style=" background:#29CC6A; color:#ffffff;">Simpan</button>
                                                    <button type="button"
                                                        class="btn text-center d-flex justify-content-center border-0 px-2 py-2" style=" background:#868E96; color:#ffffff;" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Editdata{{ $detail->id }}">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- Solusi --}}
                                {{-- <div class="modal fade" id="EditSolusi{{ $detail->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                                        <select class="form-control selectControl" id="selectControl{{ $detail->id }}" name="control_id" data-id="{{ $detail->id }}" data-control="select2" data-hide-search="true" data-placeholder="Pilih Kontrol" required data-placeholder="Pilih Kontrol" data-dropdown-parent="#EditSolusi{{ $detail->id }}">
                                                            <option value="" selected>Pilih Kontrol</option>
                                                            @foreach ($controls as $control)
                                                                <option value="{{ $control->id }}"
                                                                    @if ($detail->hirarc_detail_control)
                                                                        @if ($detail->hirarc_detail_control->control_child->control->id == $control->id)
                                                                            selected
                                                                        @endif
                                                                    @endif
                                                                    >{{ $control->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="ps-3" for="select2">Solusi
                                                            Penanganan</label>
                                                        <select class="form-control" id="selectSolusi{{ $detail->id }}" data-control="select2" data-hide-search="true" data-placeholder="Solusi" name="control_child_id" required data-dropdown-parent="#EditSolusi{{ $detail->id }}">
                                                            @if ($detail->hirarc_detail_control)
                                                            <option value="{{ $detail->hirarc_detail_control->control_child_id }}">{{ $detail->hirarc_detail_control->control_child->name }}</option>
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-end">
                                                    <button type="submit" class="btn text-center d-flex justify-content-center px-3 py-2" style=" background:#29CC6A; color:#ffffff;">Simpan</button>
                                                    <button type="button" class="btn text-center d-flex justify-content-center border-0 px-2 py-2" style=" background:#868E96; color:#ffffff;" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Editdata{{ $detail->id }}">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> --}}
                                {{-- Post Control --}}
                                {{-- <div class="modal fade" id="EditPostControl{{ $detail->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
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
                                                        <label class="ps-3" for="select1">Keparahan
                                                            (severity)</label>
                                                        <select class="form-control" id="select_post_severity_{{ $detail->id }}" name="post_severity" data-control="select2" data-hide-search="true" required data-placeholder="Pilih Keparahan (severity)" data-dropdown-parent="#EditPostControl{{ $detail->id }}">
                                                            <option value="">Pilih Keparahan (severity)</option>
                                                            <option value="1" @if ($detail->postrating) @if ($detail->postrating->post_severity == '1') selected @endif @endif>
                                                                Tergores, sayatan kecil, kerugian dalam rupiah sebesar Rp 1.000.000,-
                                                            </option>
                                                            <option value="3" @if ($detail->postrating) @if ($detail->postrating->post_severity == '3') selected @endif @endif>Cidera menyebabkan absen maksimal 3 hari, kerugian
                                                                dalam rupiah sebesar Rp 10.000.000,-</option>
                                                            <option value="7" @if ($detail->postrating) @if ($detail->postrating->post_severity == '7') selected @endif @endif>Cidera menyebabkan absen lebih dari 3 hari, kerugian
                                                                dalam rupiah sebesar Rp 50.000.000,-</option>
                                                            <option value="15" @if ($detail->postrating) @if ($detail->postrating->post_severity == '15') selected @endif @endif>
                                                                Cacat sementara, butuh rawat inap, kerugian dalam rupiah sebesar Rp
                                                                100.000.000,-</option>
                                                            <option value="40" @if ($detail->postrating) @if ($detail->postrating->post_severity == '40') selected @endif @endif>
                                                                Cidera serius atau sampai kematian, kerugian dalam rupiah sebesar Rp
                                                                1.000.000.000,-</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="ps-3" for="select2">Paparan
                                                            (Exposure)</label>
                                                        <select class="form-control" id="select_post_exposure_{{ $detail->id }}" name="post_exposure" data-control="select2" data-hide-search="true" required data-placeholder="Pilih Paparan (Exposure)" data-dropdown-parent="#EditPostControl{{ $detail->id }}">
                                                            <option value="">Pilih Paparan
                                                                (Exposure)</option>
                                                            <option value="0.5" @if ($detail->postrating) @if ($detail->postrating->post_exposure == '0.5') selected @endif @endif> 1 kali dalam setahun</option>
                                                            <option value="1" @if ($detail->postrating) @if ($detail->postrating->post_exposure == '1') selected @endif @endif>Beberapa kali dalam setahun</option>
                                                            <option value="2" @if ($detail->postrating) @if ($detail->postrating->post_exposure == '2') selected @endif @endif>1 kali sebulan</option>
                                                            <option value="3" @if ($detail->postrating) @if ($detail->postrating->post_exposure == '3') selected @endif @endif>1 kali dalam seminggu</option>
                                                            <option value="6" @if ($detail->postrating) @if ($detail->postrating->post_exposure == '6') selected @endif @endif>1 kali dalam sehari</option>
                                                            <option value="10" @if ($detail->postrating) @if ($detail->postrating->post_exposure == '10') selected @endif @endif>Berkelanjutan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group my-5">
                                                        <label class="ps-3" for="select_post_probability_{{ $detail->id }}">Kemungkinan
                                                            Terjadi (Probability)</label>
                                                        <select class="form-control" id="select_post_probability_{{ $detail->id }}" name="post_probability" data-control="select2" data-hide-search="true" required data-placeholder="Pilih Kemungkinan Terjadi (Probability)" data-dropdown-parent="#EditPostControl{{ $detail->id }}">
                                                            <option value="">Pilih Kemungkinan
                                                                Terjadi (Probability)</option>
                                                            <option value="1" @if ($detail->postrating) @if ($detail->postrating->post_exposure == '1') selected @endif @endif>
                                                                Kejadian yang secara teori hanya mungkin terjadi
                                                            </option>
                                                            <option value="3" @if ($detail->postrating) @if ($detail->postrating->post_exposure == '3') selected @endif @endif>mungkin terjadi sekali dalam 10 tahun</option>
                                                            <option value="6" @if ($detail->postrating) @if ($detail->postrating->post_exposure == '6') selected @endif @endif>Kejadian yang jarang tetapi dapat sesekali terjadi
                                                            </option>
                                                            <option value="10" @if ($detail->postrating) @if ($detail->postrating->post_exposure == '10') selected @endif @endif>
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
                                                                    {{ $detail->postrating->hasilpostcontrol ?? '' }}<br /></h4>
                                                                <input id="inputhasilpost{{ $detail->id }}" type="hidden" name="hasilpostcontrol" value="{{ $detail->postrating->hasilpostcontrol ?? '' }}">
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-end">
                                                    <button type="submit" class="btn text-center d-flex justify-content-center px-3 py-2" style=" background:#29CC6A; color:#ffffff;">Simpan</button>
                                                    <button type="button" class="btn text-center d-flex justify-content-center border-0 px-2 py-2"
                                                        style=" background:#868E96; color:#ffffff;" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#Editdata{{ $detail->id }}">Tutup</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- END MOODAL POST, SOLUSI, PRE CONTROL --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--end::Content container-->
            </div>
        </div>
    </div>
@stop --}} --}}

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
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: 400;
            color: #009B3E;
            text-align: center;
            margin: 10px 20px 30px 20px;
        }


        #RisikoSaatini .btn,
        .Edit .btn {
            box-sizing: border-box !important;
            border: 1px solid #009B3E !important;
            border-radius: 5px !important;
            /* height: 40px; */
            width: 100%;
            font-family: 'Roboto';
            font-size: 14px;
            font-weight: 400;
            color: #009B3E;
            /* text-align: center; */
        }

        #risiko-sekarang #preControl .hitung .btn,
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
        $(document).ready(function() {
            $('.selectActivity').on('change', function() {
                var data_id = $(this).attr('data-id');
                var select = $('#hazard_id' + data_id);
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
                        $('#risiko_id' + data_id).empty();
                        $('#risiko_id' + data_id).append(
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

            $('.selectHazard').on('change', function() {
                let data_id = $(this).attr("data-id");
                var select = $('#risiko_id' + data_id);
                select.closest("div").find(".select2-selection.select2-selection--single").addClass(
                    'loading');
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
                        select.append(
                            '<option value="" selected disabled >Pilih Risiko</option>');
                        $.each(data, function(key, value) {
                            select.append('<option value="' + value.id + '">' + value
                                .name +
                                '</option>');
                        });
                        select.select2();
                    },
                    error: function(data) {

                    }
                }).done(function(data) {
                    select.prop('disabled', false);
                    select.closest("div").find(".select2-selection.select2-selection--single")
                        .removeClass(
                            'loading');
                });
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
    <script>
        $(document).ready(function() {
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
    </script>
@stop
