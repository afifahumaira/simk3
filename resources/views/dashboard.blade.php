@extends ('layouts.layout')

@section('content')

    <div class="page-title d-flex flex-column gap-1 mx-5 my-5  ">

        <div id="kt_app_content" class="app-content flex-column-fluid rounded bg-light h-100 mb-20 "
            style="box-shadow: 2px 4px 20px 2px rgba(0, 0, 0, 0.1);">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 my-5 px-5 ">
                <!--begin::Page title-->
                <h1 class="page-heading mb-5 ms-7 d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0"
                    style="color: #16243D; font-family: Roboto Flex;">Dashboard</h1>
                <!--end::Title-->
            </div>
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">


                @if (auth()->user()->hak_akses == 'pengguna')
                    <div class="row my-5 d-flex justify-content-around">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats h-100">
                                <div class="card-body ">
                                    <div class="numbers  d-flex justify-content-between">
                                        <p class="card-category " style="color: #FF9600">Total Potensi Bahaya</p>
                                        <span class="card-title">10</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <button type="button" class="btn text-white btn-sm" style="background:#DC3545">5
                                            Pending</button>
                                        <button type="button" class="btn text-white btn-sm mx-2"
                                            style="background:#0099FF">4
                                            Ditindaklanjuti</button>
                                        <button type="button" class="btn  text-white btn-sm" style="background:#29CC6A">5
                                            Disetujui</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats h-100">
                                <div class="card-body d-flex justify-content-around flex-column">
                                    <p class="card-category  " style="color: #00876C ">Total Investigasi</p>
                                    <span class="card-title mb-0" style="font-size:24px">11</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats h-100">
                                <div class="card-body">
                                    <div class="numbers d-flex justify-content-between mb-2">
                                        <p class="card-category   " style="color: #0056B9 ">Total Lapor Insiden
                                        </p>
                                        <span class="card-title">14</span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <button type="button" class="btn text-white btn-sm" style="background:#DC3545">5
                                            Pending</button>
                                        <button type="button" class="btn text-white btn-sm mx-2"
                                            style="background:#0099FF">4
                                            Ditindaklanjuti</button>
                                        <button type="button" class="btn  text-white btn-sm" style="background:#29CC6A">5
                                            Disetujui</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- End View Pengguna --}}

                {{-- View Admin --}}
                @if (auth()->user()->hak_akses == 'admin')
                    <div class="row my-5">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats h-100 ">
                                <div class="card-body d-flex justify-content-around flex-column">
                                    <p class="card-category d-flex justify-content-between " style="color: #BA001F">Total
                                        HIRARC</p>
                                    <span class="card-title" style="font-size:24px">{{ $data['jumlah_hirarc'] }}</span>
                                </div>
                            </div>
                        </div>
                      
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats h-100">
                                <div class="card-body d-flex justify-content-around flex-column">
                                    <p class="card-category  " style="color: #00876C ">Total Investigasi</p>
                                    <span class="card-title mb-0" style="font-size:24px">{{ $data['jumlah_investigasi'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats h-100">
                                <div class="card-body d-flex justify-content-around flex-column">
                                    <p class="card-category  " style="color: #00876C ">Potensi Bahaya</p>
                                    <span class="card-title mb-0" style="font-size:24px">{{ $data['jumlah_potensi_bahaya'] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats h-100">
                                <div class="card-body d-flex justify-content-around flex-column">
                                    <p class="card-category  " style="color: #00876C ">Total Insiden</p>
                                    <span class="card-title mb-0" style="font-size:24px">{{ $data['jumlah_insiden'] }}</span>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 ">

                            <div class="card card-stats h-100">
                                <div class="card-body ">
                                    <div class="numbers  d-flex justify-content-between">
                                        <p class="card-category " style="color: #FF9600">Total Potensi Bahaya</p>
                                        <span class="card-title"></span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <button type="button" class="btn text-white btn-sm" style="background:#DC3545">{{ $data['jumlah_potensi_bahaya_pending'] }} 
                                            Pending</button>
                                        <button type="button" class="btn text-white btn-sm mx-2"
                                            style="background:#0099FF">{{ $data['jumlah_potensi_bahaya_tindaklanjut'] }} 
                                            Ditindaklanjuti</button>
                                        <button type="button" class="btn  text-white btn-sm" style="background:#29CC6A">{{ $data['jumlah_potensi_bahaya_sukses'] }}
                                            Disetujui</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="card card-stats h-100">
                                <div class="card-body">
                                    <div class="numbers d-flex justify-content-between mb-2">
                                        <p class="card-category   " style="color: #0056B9 ">Total Lapor Insiden
                                        </p>
                                        <span class="card-title"></span>
                                    </div>
                                    <div class="d-flex justify-content-between ">
                                        <button type="button" class="btn text-white btn-sm" style="background:#DC3545">{{ $data['jumlah_insiden_pending'] }} 
                                            Pending</button>
                                        <button type="button" class="btn text-white btn-sm mx-2"
                                            style="background:#0099FF">{{ $data['jumlah_insiden_tindaklanjut'] }} 
                                            Ditindaklanjuti</button>
                                        <button type="button" class="btn  text-white btn-sm" style="background:#29CC6A">{{ $data['jumlah_insiden_sukses'] }}
                                            Disetujui</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- End View Admin --}}

                {{-- View p2k3 --}}
                @if (auth()->user()->hak_akses == 'p2k3')
                    <div class="row my-5">
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats ">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 col-md-8">
                                            <div class="numbers">
                                                <p class="card-category  " style="color: #BA001F">Total HIRARC</p>
                                                <p class="card-title">20</p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 col-md-8">
                                            <div class="numbers">
                                                <p class="card-category " style="color: #FF9600">Total Potensi Bahaya</p>
                                                <p class="card-title">10</p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 col-md-8">
                                            <div class="numbers">
                                                <p class="card-category  " style="color: #00876C ">Total Investigasi</p>
                                                <p class="card-title">11</p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-7 col-md-8">
                                            <div class="numbers">
                                                <p class="card-category  " style="color: #0056B9 ">Total Lapor Insiden</p>
                                                <p class="card-title">14</p>
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif


                <!--begin::Row-->
                <div class="row">
                    <div class="col-md-12">
                        {{-- <div class="card card-bordered">

                            <div class="card-body">
                                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 ">

                                    <div class="pull-left">
                                        <h1
                                            class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2 lh-0"style="color: #16243D; font-family: Roboto Flex;">
                                            Total Laporan Insiden</h1>

                                    </div>
                                    <div class="card-toolbar">
                                     
                                        <div id="kalender" data-kt-daterangepicker="true"
                                            data-kt-daterangepicker-opens="left"
                                            class="cursor-pointer d-flex align-items-center px-4">
  
                                            <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                                <span class="path6"></span>
                                            </i>
                                        </div>
                                    </div>
                                </div>
                                <div id="kt_apexcharts_3" style="height: 350px"></div>
                            </div>
                        </div> --}}
                        <div>
                            <canvas id="myChart"></canvas>
                        </div>
                          
                    </div>
                </div>
            </div>
            <!--end::Content container-->
        </div>
    </div>
@stop


{{-- @section('custom-css')
    <style>
        .card-body .card-category {
            font-size: 16px;
            font-weight: 700;
            font-family: Roboto Flex;
        }

        .card-body .card-title {
            color: #16243D;
            font-size: 16px;
            font-family: Roboto Flex;
            font-weight: 700
        }
    </style>
@stop --}}

@section('customscript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
            labels: [
                @for ($i = 0; $i < count($data['chart']['bulan']); $i++)
                  '{{ $data['chart']['bulan'][$i]; }}',
                @endfor 
            ],
            datasets: [{
                label: '# Jumlah',
                data: [
                    @for ($i = 0; $i < count($data['chart']['jumlah']); $i++)
                        '{{ $data['chart']['jumlah'][$i]; }}',
                    @endfor 
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(255, 159, 64, 0.5)',
                    'rgba(255, 205, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                    'rgba(201, 203, 207, 0.5)'
                ],
                borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                ],
                borderWidth: 1
              
            }]
            },
            options: {
            scales: {
                y: {
                beginAtZero: true
                }
            }
            }
        });
    </script>
@stop
