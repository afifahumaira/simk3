<?php

namespace App\Http\Controllers;

use App\Models\Location_master;
use Illuminate\Http\Request;
use Alert;

class LokasiMasterController extends Controller
{
    public function index(Request $request) {
        $locations = Location_master::all()
            ->where('name', 'LIKE', '%'.$request->search.'%');
        return view('dashboard.masterHirarc.lokasi-departemen.index', compact('locations'));
    }

    public function tambah() {
        $locations = Location_master::all();
        return view('dashboard.masterHirarc.lokasi-departemen.tambah-lokasi', compact('locations'));
    }

    public function edit($id) {
        $loc = Location_master::find($id);
        return view('dashboard.masterHirarc.lokasi-departemen.edit-lokasi', compact('loc'));
    }

    public function detail($id, Request $request) {
        $locations = Location_master::where('id_lokasi', $id)
        ->where('name', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
        return view('dashboard.masterHirarc.lokasi-departemen.detail-lokasi', compact('locations'));
    }

    public function simpan(Request $request) {
        $request->validate([
            'id_lokasi' => 'required',
            'lokasi' => 'required'
        ]);

        Location_master::create([
            'id_lokasi' => $request->id_lokasi,
            'name' => $request->lokasi,
        ]);

        Alert::success('Berhasil', 'Data Lokasi berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('lokasi-departemen.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            'lokasi' => 'required'
        ]);

        Location_master::find($id)->update([
            'id_lokasi' => $request->id_lokasi,
            'name' => $request->lokasi,
        ]);

        Alert::success('Berhasil', 'Data Lokasi berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('lokasi-departemen.detail', $request->id_lokasi);
    }

    public function delete($id) {
        $id_lokasi = Location_master::find($id)->id_lokasi;
        Location_master::find($id)->delete();

        Alert::success('Berhasil', 'Data Lokasi berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('lokasi-departemen.detail', $id_lokasi);
    }

}


