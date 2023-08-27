<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Location;
use App\Models\Location_masters;
use Illuminate\Http\Request;
use Alert;

class LokasiMasterController extends Controller
{
    public function index(Request $request) {
        $locations = Location_masters::where('name', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
            
        return view('dashboard.masterHirarc.lokasi-departemen.index', compact('locations'));
    }

    public function tambah() {
        $locations = Location_masters::all();
        return view('dashboard.masterHirarc.lokasi-departemen.tambah-lokasi', compact('locations'));
    }

    public function edit($id) {
        $loc = Location_masters::findOrFail($id);
        
        return view('dashboard.masterHirarc.lokasi-departemen.edit-lokasi', compact('loc'))
        ->with('id', $loc);
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

        Location_masters::create([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Lokasi berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('lokasi-departemen.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required'
        ]);

        Location_masters::find($id)->update([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Lokasi berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('lokasimaster.index');
    }

    public function delete($id) {
        $locations = Location_masters::find($id);
        $locations->delete();

        Alert::success('Berhasil', 'Data Lokasi berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('lokasimaster.index', $id);
    }

}


