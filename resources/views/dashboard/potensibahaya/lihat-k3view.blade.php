@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">
        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Detail Data Potensi Bahaya</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <a href="{{ route('potensibahaya.k3dep') }}" type="button" class="btn text-white btn-secondary btn-sm mb-2"
                    style="background: #505050"><i class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">
                <tbody>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if ($data->status == '1')
                                <button type="button" class="btn btn-danger btn-sm py-2"
                                    style="background:#DC3545">Pending</button>
                            @elseif ($data->status == '2')
                                <button type="button" class="btn btn-primary btn-sm py-2">Investigasi</button>
                            @elseif ($data->status == '3')
                                <button type="button" class="btn btn-success btn-sm py-2">Sukses</button>
                            @endif
                        </td>

                    </tr>
                    <tr>
                        <th>P2K3</th>
                        <td>{{ $data->p2k3?->nama }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pelapor</th>
                        <td>{{ $data->nama_pelapor }}</td>
                    </tr>
                    <tr>
                        <th>Kode Potensi Bahaya</th>
                        <td>{{ $data->kode_potensibahaya }}</td>
                    </tr>
                    <tr>
                        <th>Email Pelapor</th>
                        <td>{{ $data->email_pelapor }}</td>
                    </tr>
                    <tr>
                        <th>NIP/NIM</th>
                        <td>{{ $data->nip_nim }}</td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon Pelapor</th>
                        <td>{{ $data->nomer_telepon_pelapor }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Kejadian</th>
                        <td>{{ $data->waktu_kejadian }}</td>
                    </tr>
                    <tr>
                        <th>Kategori Pelapor</th>
                        <td>{{ $data->kategori_pelapor }}</td>
                    </tr>
                    <tr>
                        <th>Foto Tanda Pengenal</th>
                        <td>
                            <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                href="{{ asset('storage/potensi_bahaya/tanda_pengenal/' . $data->tanda_pengenal) }}">
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                    style="background-image:url('{{ asset('storage/potensi_bahaya/tanda_pengenal/' . $data->tanda_pengenal) }}')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                    <i class="bi bi-eye-fill text-white fs-3x"></i>
                                </div>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <th>Institut yang Dikunjungi</th>
                        <td>{{ $data->institusi }}</td>
                    </tr>
                    <tr>
                        <th>Tujuan</th>
                        <td>{{ $data->tujuan }}</td>
                    </tr>
                    <tr>
                        <th>Departemen</th>
                        <td>{{ $data->departemen->name }}</td>
                    </tr>
                    <tr>
                        <th>Unit Civitas akademika</th>
                        <td>{{ $data->unit_civitas_akademika_box }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi</th>
                        <td>{{ $data->lokasi }}</td>
                    </tr>
                    <tr>
                        <th>Potensi Bahaya</th>
                        <td>{{ $data->potensi_bahaya }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi Potensi Bahaya</th>
                        <td>{{ $data->deskripsi_potensi_bahaya }}</td>
                    </tr>
                    <tr>
                        <th>Resiko Potensi Bahaya</th>
                        <td>{{ $data->resiko_bahaya }}</td>
                    </tr>
                    <tr>
                        <th>Usulan Perbaikan</th>
                        <td>{{ $data->usulan_perbaikan }}</td>
                    </tr>
                    <tr>
                        <th>Foto Kejadian</th>
                        <td>
                            <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                href="{{ asset('storage/potensi_bahaya/gambarkejadian/' . $data->gambar) }}">
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                    style="background-image:url('{{ asset('storage/potensi_bahaya/gambarkejadian/' . $data->gambar) }}')">
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
