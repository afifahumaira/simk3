@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div class="page-title d-flex flex-column  gap-1 mx-5 my-5  ">
            <div id="kt_app_content"
                class="app-content  rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                    <!--begin::Page title-->
                    <h2>Data Inventory P3K</h2>
                    <a href="{{ route('p3k.index') }}" type="button"
                        class="btn  btn-sm btn-secondary text-white d-flex justify-content-center align-items-center mb-2"
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
                                    <a href="{{ route('p3k.index') }}" type="button"
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
                                    <strong>Edit Data P3K</strong>
                                </div>
                            </div>
                            <div class="card-body">
                                <form class="lh-lg" action="{{route ('p3k.update', $data->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label ">Kode ID</label>
                                        <div class="col-sm-10 w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input class="form-control bg-secondary" name="kode_laporinsiden"
                                                    id="kode_apar" value="P3K-1" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Nama Benda</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{$data->name}}">

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label ">Tipe</label>
                                        <div class="col-sm-10 w-100">
                                            <div class="form-group label-floating is-empty is-focused">
                                                <input class="form-control bg-secondary" name="tipe"
                                                    id="kode_laporinsiden" value="P3K" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Departemen</label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="Lokasi"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" id=""
                                                style="font-family: 'Inter';" name="departemen_id">
                                                <option value="">- Pilih -</option>
                                                @foreach ($departments as $dep)
                                                    <option value="{{ $dep->id }}" {{ $data->departemen_id == $dep->id ? 'selected' : '' }}>{{ $dep->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label for="inputNomertelepon3" class="col-sm-2 col-form-label">Lokasi</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" class="form-control " name="lokasi" value="{{$data->lokasi}}">
                                        </div>
                                    </div>

                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Tanggal Pergantian Alat P3K</label>
                                        <div class="col-sm-10 w-100">
                                            <input type="text" id="date" name="tanggal_kadaluwarsa" class="form-control bg-secondary"
                                                readonly value="{{$data->tanggal_kadaluwarsa}}">

                                        </div>
                                    </div>


                                    <div class="ps-3 pe-5">
                                        <label class="col-sm-2 col-form-label">Kondisi</label>
                                        <div class="col-sm-10 w-100">
                                            <select class="form-select fs-6 w-100" data-control="select2"
                                                data-hide-search="true" data-placeholder="- Pilih -"
                                                style="--bs-link-hover-color-rgb: 25, 135, 84;" id=""
                                                style="font-family: 'Inter';" name="kondisi">
                                                <option value="">- Pilih -</option>
                                                <option value="Baik" {{$data->kondisi == "Baik" ? 'selected' : ''}}>Baik</option>
                                                <option value="Kurang Baik" {{$data->kondisi == "Kurang Baik" ? 'selected' : ''}}>Kurang Baik</option>
                                                <option value="Barang Kosong" {{$data->kondisi == "Barang Kosong" ? 'selected' : ''}}>Barang Kosong</option>
                                                <option value="Kadaluwarsa" {{$data->kondisi == "Kadaluwarsa" ? 'selected' : ''}}>Kadaluwarsa</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="ps-3 pe-5">
                                        <label for="inputfotokejadian" class="col-form-label">Foto Barang</label>
                                        <div class=" w-100">
                                            <a class="d-block overlay" data-fslightbox="lightbox-basic" href="{{ asset('berkas/'. $data->gambar) }}">
                                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                                    style="background-image:url('{{ asset('berkas/'. $data->gambar) }}')">
                                                </div>
                                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                                    <i class="bi bi-eye-fill text-white fs-3x"></i>
                                                </div>
                                            </a>
                                            <input type="hidden" class="form-control" value="{{ $data->gambar }}">
                                            <input type="file" class="form-control mt-3" name="gambar" accept="image/png, image/jpeg">
                                        </div>
                                    </div>
                                    <div class=" d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success text-white d-flex justify-content-center align-items-center "
                                            style="background: #29CC6A;
                        height: 38px; margin : 10px 20px 30px 20px; font-size:14px; border-radius: 5px;">Simpan Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content container-->

        </div>
    </div>
@stop
