<?php

namespace App\Http\Controllers;

use App\Models\Apar;
use App\Models\Departemen;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Alert;

class AparInspeksiController extends Controller
{
    public function inspek($id) {
        $data = Inventory::where('id', $id)->first();
        return view('dashboard.inspeksi.apar.inspek-apar', compact('data'));
    }

    public function index() {
        $departemen = Departemen::get();
        $inventory = null;
        return view('dashboard.inspeksi.apar.index', compact('departemen'));
    }

    public function selected_index($id) {
        $departemen = Departemen::get();
        $inventory = Inventory::where('tipe', "APAR")->where('departemen_id', $id)->doesnthave('inspeksi_apar')->paginate(10);
        return view('dashboard.inspeksi.apar.index', compact('departemen', 'inventory'));
    }

    public function lihat() {
        return view('dashboard.inspeksi.apar.lihat-aparinspeksi');
    }

    public function daftar() {
        $datas = Apar::paginate(10);
        return view('dashboard.inspeksi.apar.daftar-inspek-apar', compact('datas'));
    }

    public function data_inspeksi() {
        $datas = Apar::get();
        return view('dashboard.inspeksi.apar.daftar-inspek-apar', compact('datas'));
    }

    public function store(Request $request) {
        // dd($request);
        $data = $request->validate([
            'inventory_id'=> 'required',
            'departemen_id' => 'required',
            'user_id' => 'required',
            'q2' => 'required',
            'q3' => 'required',
            'q4' => 'required',
            'q5' => 'required',
            'q6' => 'required',
            'q7' => 'required',
            'q8' => 'required',
            'q9' => 'required',
            'q10' => 'required',
            'q11' => 'required',
            'q12' => 'required',
            'q13' => 'required',
            'q14' => 'required',
        ]);
        $data['q1'] = null;
        $success = Apar::create($data);
        if ($success) {
            Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('aparinspeksi.index');
        }
    }

    public function ubah() {

    }

}
