<?php

namespace App\Http\Controllers;

use App\Charts\ProgresChart;
use Illuminate\Http\Request;
use App\Models\Hirarc;
use App\Models\Investigasi;
use App\Models\PotensiBahaya;
use App\Models\Dokumen;
use App\Models\Laporinsiden;
use App\Models\VwDashboard;
use App\Models\Map;

class Simk3Controller extends Controller
{
    public function index( Request $request) {
        $maps = Map::all();
        return view('simk3' , compact('maps'));
  
        }
    
    public function dashboard() {

        $data_dashboard = VwDashboard::get();
        foreach ($data_dashboard as $key => $value) {
            $bulan[] = $value->bulan;
        }

        foreach ($data_dashboard as $key => $value) {
            $jumlah[] = $value->jumlah;
        }

        $chart =  ['bulan' => $bulan, 'jumlah' => $jumlah];
        $data = [
            'jumlah_hirarc' => Hirarc::groupBy('departemen_id')->get()->count(),
            'jumlah_investigasi' => Investigasi::get()->count(),
            'jumlah_potensi_bahaya' => PotensiBahaya::get()->count(),
            'jumlah_insiden' => Laporinsiden::get()->count(),
            'jumlah_potensi_bahaya_pending' => PotensiBahaya::where('status','1')->get()->count(), 
            'jumlah_potensi_bahaya_tindaklanjut' => PotensiBahaya::where('status','2')->get()->count(), 
            'jumlah_potensi_bahaya_sukses' => PotensiBahaya::where('status','3')->get()->count(), 
            'jumlah_insiden_pending' => Laporinsiden::where('status','1')->get()->count(), 
            'jumlah_insiden_tindaklanjut' => Laporinsiden::where('status','2')->get()->count(), 
            'jumlah_insiden_sukses' => Laporinsiden::where('status','3')->get()->count(), 
            'chart' => $chart,
        ];

        return view('dashboard')->with('data', $data);
            
    }
}
