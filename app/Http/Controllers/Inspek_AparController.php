<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Inspek_AparController extends Controller
{
    public function index() {
        return view('dashboard.inspeksi.apar.aparinspeksi');
        }
}
