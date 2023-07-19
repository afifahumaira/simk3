<?php

namespace App\Http\Controllers;

use App\Charts\ProgresChart;
use Illuminate\Http\Request;

class Simk3Controller extends Controller
{
    public function index( Request $request) {
        return view('.simk3');
        
        }
    
    public function dasboard(ProgresChart $progresChart) {
        $data['progresChart'] = $progresChart->build();
        return view('.dasboard');
            
    }
}
