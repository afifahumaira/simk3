<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Location;
use App\Models\Location_masters;
use Illuminate\Http\Request;
use Alert;

class LokasiMasterController extends Controller
{
    public function index() {
        $locations = Location_masters::paginate();
            
        return view('dashboard.masterHirarc.lokasi-departemen.index', compact('locations'));
    }

    public function tambah() {
        $locations = Location_masters::all();
        return view('dashboard.masterHirarc.lokasi-departemen.tambah-lokasi', compact('locations'));
    }

    public function edit($id) {
        $loc = Location_masters::find($id);
        
        return view('dashboard.masterHirarc.lokasi-departemen.edit-lokasi', compact('loc'));
    }

    public function detail($id, Request $request) {
        $locations = Location_masters::where('id_lokasi', $id)
        ->where('name', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
        return view('dashboard.masterHirarc.lokasi-departemen.detail-lokasi', compact('locations'));
    }

    public function simpan(Request $request) {
        $request->validate([
            
            'name' => 'required'
        ]);

        Location::create([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Lokasi berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('lokasi-departemen.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        Location::find($id)->update([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Lokasi berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('lokasi-departemen.detail', $request->departemen_id);
    }

    public function delete($id) {
        $id_lokasi = Location_masters::find($id)->id_lokasi;
        Location::find($id)->delete();

        Alert::success('Berhasil', 'Data Lokasi berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('lokasi-departemen.detail', $id_lokasi);
    }

}


