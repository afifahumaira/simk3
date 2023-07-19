<?php

namespace App\Charts;



use ArielMejiaDev\LarapexCharts\LarapexChart;

class ProgresChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $laporaninsiden = Laporinsiden::groupby('waktu_kejadian')->get();
        $data = [
            $laporaninsiden->where('waktu_kejadian', 2020)->count(),
            $laporaninsiden->where('waktu_kejadian', 2021)->count(),
            $laporaninsiden->where('waktu_kejadian', 2022)->count(), 
    ];
        $label = [
            'Laporan Insiden'
        ];

        return $this->chart->lineChart()
            ->setTitle('Data Laporan Insiden')
            ->setSubtitle(date('Y'))
            ->addData($data)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
