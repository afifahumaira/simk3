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
                                    <span class="card-title" style="font-size:24px">20</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 ">

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
                        <div class="card card-bordered">

                            <div class="card-body">
                                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100 ">
                                    <!--begin::Page title-->
                                    <div class="pull-left">
                                        <h1
                                            class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-2 lh-0"style="color: #16243D; font-family: Roboto Flex;">
                                            Total Laporan Insiden</h1>
                                        <!--end::Title-->
                                    </div>
                                    <div class="card-toolbar">
                                        <!--begin::Daterangepicker(defined in src/js/layout/app.js)-->
                                        <div id="kalender" data-kt-daterangepicker="true"
                                            data-kt-daterangepicker-opens="left"
                                            class="cursor-pointer d-flex align-items-center px-4">
                                            <!--begin::Display range-->

                                            <!--end::Display range-->
                                            <i class="ki-duotone ki-calendar-8 fs-1 ms-2 me-0">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                                <span class="path5"></span>
                                                <span class="path6"></span>
                                            </i>
                                        </div>
                                        <!--end::Daterangepicker-->
                                    </div>
                                </div>
                                <div id="kt_apexcharts_3" style="height: 350px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Content container-->
        </div>
    </div>
@stop

@section('custom-css')
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
@stop

@section('customscript')
    <script>
        var start = moment().subtract(29, "days");
        var end = moment();
        $(document).ready(function() {
            $("#kalender").daterangepicker({
                startDate: start,
                endDate: end,
                ranges: {
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1,
                        "month").endOf("month")]
                }
            });
        });
        var element = document.getElementById("kt_apexcharts_3");

        var height = parseInt(KTUtil.css(element, "height"));
        var labelColor = KTUtil.getCssVariableValue("--bs-gray-500");
        var borderColor = KTUtil.getCssVariableValue("--bs-gray-200");
        var baseColor = KTUtil.getCssVariableValue("--bs-info");
        var lightColor = KTUtil.getCssVariableValue("--bs-info-light");

        //   if (!element) {
        //     return;
        //   }

        var options = {
            series: [{
                name: "Laporan",
                data: [3, 2, 2, 1, 3, 2, 1],
            }, ],
            chart: {
                fontFamily: "inherit",
                type: "area",
                height: height,
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {},
            legend: {
                show: false,
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                type: "solid",
                opacity: 1,
            },
            stroke: {
                curve: "smooth",
                show: true,
                width: 3,
                colors: [baseColor],
            },
            xaxis: {
                categories: ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug"],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: "12px",
                    },
                },
                crosshairs: {
                    position: "front",
                    stroke: {
                        color: baseColor,
                        width: 1,
                        dashArray: 3,
                    },
                },
                tooltip: {
                    enabled: true,
                    formatter: undefined,
                    offsetY: 0,
                    style: {
                        fontSize: "12px",
                    },
                },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: labelColor,
                        fontSize: "12px",
                    },
                },
            },
            states: {
                normal: {
                    filter: {
                        type: "none",
                        value: 0,
                    },
                },
                hover: {
                    filter: {
                        type: "none",
                        value: 0,
                    },
                },
                active: {
                    allowMultipleDataPointsSelection: false,
                    filter: {
                        type: "none",
                        value: 0,
                    },
                },
            },
            tooltip: {
                style: {
                    fontSize: "12px",
                },
                y: {
                    formatter: function(val) {
                        return val + " Insiden";
                    },
                },
            },
            colors: [lightColor],
            grid: {
                borderColor: borderColor,
                strokeDashArray: 4,
                yaxis: {
                    lines: {
                        show: true,
                    },
                },
            },
            markers: {
                strokeColor: baseColor,
                strokeWidth: 3,
            },
        };

        var chart = new ApexCharts(element, options);
        chart.render();
    </script>
@stop
