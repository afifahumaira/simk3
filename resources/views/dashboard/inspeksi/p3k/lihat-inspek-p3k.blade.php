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
                <a href="{{ route('daftar-inspek-p3k.index') }} " type="button"
                    class="btn btn-secondary text-white btn-sm mb-2" style="background: #505050"><i
                        class="bi bi-chevron-left text-white"></i>Kembali</a>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <table class="table table-bordered border-secondary rounded-5 px-3 py-3 mb-5 shadow">

                <tbody>
                    <tr>

                        <th>Nama Pengisi</th>
                        <td>The hash slash slinging slasher</td>

                    </tr>
                    <tr>
                        <th>Lokasi Departemen P3K</th>
                        <td>Teknik Komputer</td>

                    </tr>
                    <tr>
                        <th>Nama Benda</th>
                        <td>P3K</td>

                    </tr>
                    <tr>

                        <th>Kotak P3K terbuat dari bahan yang kuat</th>
                        <td>Ya</td>

                    </tr>
                    <tr>

                        <th>Kotak P3K mudah dibawa</th>
                        <td>Ya</td>

                    </tr>
                    <tr>

                        <th>Kotak P3K berbahan dasar putih dengan lambang berwarna hijau</th>
                        <td>Ya</td>
                    </tr>
                    <tr>

                        <th>Penempatan kotak P3K diletakkan pada tempat yang mudah terlihat dan dijangkau</th>
                        <td>Ya</td>

                    </tr>
                    <tr>

                        <th>Terdapat kasa steril terbungkus</th>
                        <td>Ya</td>

                    </tr>
                    <tr>

                        <th>Terdapat kasa gulung dengan lebar 5cm</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Terdapat kasa gulung dengan lebar 10cm</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Terdapat plester dengan lebar 1,25cm</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Terdapat kapas 25 gram</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Terdapat kain segitiga/Elastic Bandage</th>
                        <td>Ya</td>
                    </tr>

                    <tr>
                        <th>Terdapat gunting </th>
                        <td>Ya</td>
                    </tr>

                    <tr>
                        <th>Terdapat sarung tangan sekali pakai</th>
                        <td>Ya</td>
                    </tr>

                    <tr>
                        <th>Terdapat masker sekali pakai</th>
                        <td>Ya</td>
                    </tr>

                    <tr>
                        <th>Terdapat Pinset</th>
                        <td>Ya</td>
                    </tr>

                    <tr>
                        <th>Terdapat label catatan pemeriksaan</th>
                        <td>Ya</td>
                    </tr>

                    <tr>
                        <th>Terdapat lampu senter</th>
                        <td>Ya</td>
                    </tr>

                    <tr>
                        <th>Terdapat kantong plastik bersih</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Terdapat gelas untuk cuci mata</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Terdapat aquades</th>
                        <td>Ya</td>
                    </tr>

                    <tr>
                        <th>Terdapat betadine/povidon iodine</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Terdapat alkohol 70%</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Terdapat buku panduan P3K</th>
                        <td>Ya</td>
                    </tr>
                    <tr>
                        <th>Terdapat daftar isi kotak P3K</th>
                        <td>Ya</td>
                    </tr>
                </tbody>
            </table>

            <!--end::Content container-->
        </div>
    </div>
@stop
