<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen;
use App\Models\Inventory;
use App\Models\P3k;

class P3kInspeksiController extends Controller
{
    public function index() {
        $departemen = Departemen::get();
        $inventory = null;
        return view('dashboard.inspeksi.p3k.index', compact('departemen'));
    }

    public function inspek($id) {
        $data = Inventory::where('id', $id)->first();
        return view('dashboard.inspeksi.p3k.inspek-p3k', compact('data'));
    }

    public function selected_index($id) {
        $departemen = Departemen::get();
        $inventory = Inventory::where('tipe', "P3K")->where('departemen_id', $id)->doesnthave('inspeksi_p3k')->get();
        return view('dashboard.inspeksi.p3k.index', compact('departemen', 'inventory'));
    }

    public function lihat() {
        return view('dashboard.inspeksi.p3k.lihat-inspek-p3k');
    }

    public function daftar() {
        return view('dashboard.inspeksi.p3k.daftar-inspek-p3k');
    }

    public function store(Request $request) {
        // dd($request);
        $data = $request->validate([
            'p3k_inventory_id'=> 'required',
            'departemen_id' => 'required',
            'user_id' => 'required',
            'q1' => 'required',
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
            'q15' => 'required',
            'q16' => 'required',
            'q17' => 'required',
            'q18' => 'required',
            'q19' => 'required',
            'q20' => 'required',
            'q21' => 'required',
            'q22' => 'required',
        ]);
        $data['q23'] = null;
        $data['q1_desc'] = null;
        $data['q2_desc'] = null;
        $data['q3_desc'] = null;
        $data['q4_desc'] = null;
        $data['q5_desc'] = null;
        $data['q6_desc'] = null;
        $data['q7_desc'] = null;
        $data['q8_desc'] = null;
        $data['q9_desc'] = null;
        $data['q10_desc'] = null;
        $data['q11_desc'] = null;
        $data['q12_desc'] = null;
        $data['q13_desc'] = null;
        $data['q14_desc'] = null;
        $data['q15_desc'] = null;
        $data['q16_desc'] = null;
        $data['q17_desc'] = null;
        $data['q18_desc'] = null;
        $data['q19_desc'] = null;
        $data['q20_desc'] = null;
        $data['q21_desc'] = null;
        $data['q22_desc'] = null;
        $data['q23_desc'] = null;

        $success = P3k::create($data);
        if ($success) {
            Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('p3kinspeksi.index');
        }
    }

}
