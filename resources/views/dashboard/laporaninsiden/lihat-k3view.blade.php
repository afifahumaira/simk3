@extends ('layouts.layout')

@section('content')
    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content"
            class="app-content flex-column-fluid rounded bg-light  mb-20 px-5 shadow"style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 mb-5 px-5 border-bottom border-5">
                <!--begin::Page title-->
                <h2>Detail Data Lapor Insiden</h2>
                <!--begin::Main wrapper-->

                <!--end::Main wrapper-->
                <a href="{{ route('laporan-insiden.k3dep') }} " type="button" class="btn btn-secondary text-white btn-sm mb-2"
                    style="background: #505050"><i class="bi bi-chevron-left text-white"></i>Kembali</a>

                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">
                <tbody>
                    <tr>
                        <th>Status</th>
                        <td class="d-flex align-items-center">
                            @if ($lap->status == '1')
                                <button type="button" class="btn btn-danger btn-sm py-2"
                                    style="background:#DC3545">Pending</button>
                            @elseif ($lap->status == '2')
                                <button type="button" class="btn btn-primary btn-sm py-2">Investigasi</button>
                            @elseif ($lap->status == '3')
                                <button type="button" class="btn btn-success btn-sm py-2">Tuntas</button>
                            @endif
                        </td>
                    </tr>

                    <tr>
                        <th>P2K3</th>
                        <td>{{ $lap->p2k3?->nama }}</td>
                    </tr>

                    <tr>
                        <th>Kode Lapor Insiden</th>
                        <td>{{ $lap->kode_laporinsiden }}</td>

                    </tr>
                    <tr>
                        <th>Waktu Kejadian</th>
                        <td>{{ $lap->waktu_kejadian->translatedFormat('d F Y') }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi </th>
                        <td>{{ $lap->departemen->name }}</td>
                    </tr>
                    <tr>
                        <th>Lokasi Rinci</th>
                        <td>{{ $lap->lokasi_rinci }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Insiden</th>
                        <td>{{ $lap->jenis_insiden }}</td>
                    </tr>
                    <tr>
                        <th>Kronologi</th>
                        <td>{{ $lap->kronologi }}</td>
                    </tr>
                    <tr>
                        <th>Penyebab Insiden</th>
                        <td>{{ $lap->penyebab_insiden }}</td>
                    </tr>
                    <tr>
                        <th>Foto Kejadian</th>
                        <td>
                            <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                href="{{ asset('storage/laporan_insiden/gambarkejadian/' . $lap->gambar) }}">
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                    style="background-image:url('{{ asset('storage/laporan_insiden/gambarkejadian/' . $lap->gambar) }}')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                    <i class="bi bi-eye-fill text-white fs-3x"></i>
                                </div>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th>Nama Pelapor</th>
                        <td>{{ $lap->nama_pelapor }}</td>
                    </tr>

                    <tr>
                        <th>Email Pelapor</th>
                        <td>{{ $lap->email_pelapor }}</td>
                    </tr>

                    <tr>
                        <th>Nomor Telepon Pelapor</th>
                        <td>{{ $lap->nomer_telepon_pelapor }}</td>
                    </tr>

                    <tr>
                        <th>Unit</th>
                        <td>{{ $lap->unit_pelapor }}</td>
                    </tr>

                    <tr>
                        <th>Foto Tanda Pengenal</th>
                        <td>
                            <a class="d-block overlay" data-fslightbox="lightbox-basic"
                                href="{{ asset('storage/laporan_insiden/tanda_pengenal/' . $lap->tanda_pengenal) }}">
                                <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                    style="background-image:url('{{ asset('storage/laporan_insiden/tanda_pengenal/' . $lap->tanda_pengenal) }}')">
                                </div>
                                <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                    <i class="bi bi-eye-fill text-white fs-3x"></i>
                                </div>
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <th>Nama Korban</th>
                        <td>{{ $lap->nama_korban }}</td>
                    </tr>

                    <tr>
                        <th>Email Korban</th>
                        <td>{{ $lap->email_korban }}</td>
                    </tr>

                    <tr>
                        <th>Nomor Telepon Korban</th>
                        <td>{{ $lap->nomer_telepon_korban }}</td>
                    </tr>

                    <tr>
                        <th>Unit</th>
                        <td>{{ $lap->unit_korban }}</td>
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
