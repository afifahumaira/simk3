@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Edit Data HIRARC</h2>
                    <a href="{{ route('hirarc.index') }}" type="button"
                        class="btn text-white btn-secondary btn-sm d-flex justify-content-center align-items-center mb-2"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background: #505050; width:90px"><i
                            class="bi bi-chevron-left text-white"></i>Kembali</a>
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered ">
                            <div class="modal-content">
                                {{-- <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div> --}}
                                <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                    <h2 class="mt-5 text-center" style="color: #16243D; font-size: 20px font-weight:700">
                                        keluar dari edit data?
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
                        class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">

                        <div class="card bg-light">
                            <div class="card-header d-flex align-items-center fs-3 fw-normal">
                                <div class="pull-left">
                                    <strong style="color: #16243D; font-family: Roboto Flex; font-size:16px;">Data
                                        HIRARC</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('hirarc.update', $hirarc->id) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Departemen</label>
                                        <div class=" w-100">
                                            <select name="departemen_id" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Departemen">
                                                @foreach ($departments as $dep)
                                                    <option value="{{ $dep->id }}"
                                                        {{ $hirarc->departemen_id == $dep->id ? 'selected' : '' }}>
                                                        {{ $dep->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Lokasi</label>
                                        <div class=" w-100">
                                            <select name="location_id" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Lokasi">
                                                @foreach ($locations as $loc)
                                                    <option value="{{ $loc->id }}"
                                                        {{ $hirarc->location_id == $loc->id ? 'selected' : '' }}>
                                                        {{ $loc->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Aktifitas</label>
                                        <div class=" w-100">
                                            <select name="activity" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Aktifitas">
                                                @foreach ($activitie as $act)
                                                    <option value="{{ $act->name }}"
                                                        {{ $hirarc->activitie == $act->id ? 'selected' : '' }}>
                                                        {{ $act->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Hazard</label>
                                        <div class=" w-100">
                                            <select name="hazard" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Hazard">
                                                @foreach ($hazard as $hazard)
                                                    <option value="{{ $hazard->name }}"
                                                        {{ $hirarc->hazard == $hazard->id ? 'selected' : '' }}>
                                                        {{ $hazard->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Resiko</label>
                                        <div class=" w-100">
                                            <select name="risk" class="form-select fs-6 w-100"
                                                data-control="select2" data-hide-search="true" data-placeholder="Resiko">
                                                @foreach ($risk as $risk)
                                                    <option value="{{ $risk->name }}"
                                                        {{ $hirarc->risk == $risk->id ? 'selected' : '' }}>
                                                        {{ $risk->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kesesuaian dengan Aturan</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="kesesuaian"
                                                id="kesesuaian" value="{{ $hirarc->kesesuaian }}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kondisi</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="kondisi"
                                                id="kondisi" value="{{ $hirarc->kondisi }}">{{ $hirarc->kondisi }}>
                                        </div>
                                    </div>
                                    
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Pengendalian</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="kendali"
                                                id="kendali" value="{{ $hirarc->kendali }}">{{ $hirarc->kendali }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Keparahan Saat Ini</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="current_severity"
                                                id="current_severity ini" value="{{ $hirarc->current_severity }}">{{ $hirarc->current_severity }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Paparan Saat Ini</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="current_exposure"
                                                id="current_exposure" value="{{ $hirarc->current_exposure }}">{{ $hirarc->current_exposure }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Probabilitas Saat Ini</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="current_probability"
                                                id="current_probability" value="{{ $hirarc->current_probability }}">{{ $hirarc->current_probability }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Tingkat Resiko Saat Ini</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="current_risk_rating"
                                                id="current_risk_rating" value="{{ $hirarc->current_risk_rating }}">{{ $hirarc->current_risk_rating }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kategori Saat Ini</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="current_risk_category"
                                                id="current_risk_category" value="{{ $hirarc->current_risk_category }}">{{ $hirarc->current_risk_category }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Penyebab Utama</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="penyebab"
                                                id="penyebab" value="{{ $hirarc->penyebab }}">{{ $hirarc->penyebab }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Usulan</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="usulan"
                                                id="usulan" value="{{ $hirarc->usulan }}">{{ $hirarc->usulan }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Formulir yang Dibutuhkan</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="form_diperlukan"
                                                id="form_diperlukan" value="{{ $hirarc->form_dibutuhkan }}">{{ $hirarc->form_dibutuhkan }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">SOP</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="sop"
                                                id="sop" value="{{ $hirarc->sop }}">{{ $hirarc->sop }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Keparahan Residual</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="residual_severity"
                                                id="residual_severity" value="{{ $hirarc->residual_severity }}">{{ $hirarc->residual_severity }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Paparan Residual</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="residual_exposure"
                                                id="residual_exposure" value="{{ $hirarc->residual_exposure }}">{{ $hirarc->residual_exposure }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Probabilitas Residual</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="residual_probability"
                                                id="residual_probability" value="{{ $hirarc->residual_probability }}">{{ $hirarc->residual_probability }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Tingkat Resiko Residual</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="residual_risk_rating"
                                                id="residual_risk_rating" value="{{ $hirarc->residual_risk_rating }}">{{ $hirarc->residual_risk_rating }}>
                                        </div>
                                    </div>
                                    
                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Kategori Residual</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="residual_risk_category"
                                                id="residual_risk_category" value="{{ $hirarc->residual_risk_category }}">{{ $hirarc->residual_risk_category }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Penanggung Jawab </label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="penanggung_jawab"
                                                id="penanggung_jawab" value="{{ $hirarc->penanggung_jawab }}">{{ $hirarc->penanggung_jawab }}>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-form-label">Status</label>
                                        <div class=" w-100">
                                            <input type="text" class="form-control" name="status"
                                                id="status" value="{{ $hirarc->status }}">{{ $hirarc->status }}>
                                        </div>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center border-0">
                                        <div class=" d-flex justify-content-center">
                                            <button type="submit" id="simpanHirarc"
                                                class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                                style="background: #29CC6A; height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;"
                                                data-bs-toggle="modal" data-bs-target="#simpandata">Simpan
                                                Data</button>

                                            <a href="{{ route('hirarc.index') }}" type="submit"
                                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                                data-bs-toggle="modal" data-bs-target="#resetform"
                                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px; height: 38px; font-size:14px; border-radius: 5px;">Reset</a>

                                        </div>
                                    </div>

                </form>
            </div>
        </div>
    </div>
                            {{-- <a href="{{ route('laporan-insiden.tambah') }}" type="submit"
                                class="btn btn-secondary text-white d-flex align-items-center justify-content-center"
                                data-bs-toggle="modal" data-bs-target="#resetform"
                                style="background: #868E96; margin : 10px 20px 30px 20px; width: 124.33px;height: 38px; font-size:14px; border-radius: 5px;">Reset</a>
                            <div class="modal fade" id="resetform" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <div class="modal-content">

                                        <div class="modal-body mt-5 d-flex justify-content-center align-items-center">
                                            <h2 class="mt-5 text-center"
                                                style="color: #16243D; font-size: 20px font-weight:700">keluar dari tambah
                                                data?
                                                <p class="mb-0 mt-2 text-center "
                                                    style="color: #DC3545; font-weight:400; font-size:14px"> data yang
                                                    dimasukkan belum tersimpan </p>
                                            </h2>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center border-0">
                                            <a href="{{ route('laporan-insiden.tambah') }}" type="button"
                                                class="btn btn-success text-white d-flex justify-content-center align-items-center text-center rounded-1"
                                                style="width:76px; height:31px; background: #29CC6A;">Ya</a>
                                            <button type="button"
                                                class="btn btn-secondary text-center d-flex align-items-center rounded-1"
                                                data-bs-dismiss="modal" style="width:76px; height:31px; ">Tidak</button>

                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!--end::Content container-->

        </div>
    </div>
@stop

@section('customscript')
    <script src="{{ asset('plugins/custom/fslightbox/fslightbox.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".tanggalPicker").flatpickr({
                altInput: true,
                altFormat: "d F Y",
                dateFormat: "Y-m-d",
                locale: "id"
            });
        });
    </script>
@stop
