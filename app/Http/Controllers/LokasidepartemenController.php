<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Location;
use Illuminate\Http\Request;
use Alert;

class LokasidepartemenController extends Controller
{
    public function index(Request $request) {
        $locations = Departemen::with(['location'])
            ->where('name', 'LIKE', '%'.$request->search.'%')
            ->paginate(10);
        return view('dashboard.masterHirarc.lokasi-departemen.index', compact('locations'));
    }

    public function tambah() {
        $departments = Departemen::all();
        return view('dashboard.masterHirarc.lokasi-departemen.tambah-lokasi', compact('departments'));
    }

    public function edit($id) {
        $loc = Location::find($id);
        $departments = Departemen::all();
        return view('dashboard.masterHirarc.lokasi-departemen.edit-lokasi', compact('loc', 'departments'));
    }

    public function detail($id, Request $request) {
        $locations = Location::where('departemen_id', $id)
        ->where('name', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
        return view('dashboard.masterHirarc.lokasi-departemen.detail-lokasi', compact('locations'));
    }

    public function simpan(Request $request) {
        $request->validate([
            'departemen_id' => 'required',
            'lokasi' => 'required'
        ]);

        Location::create([
            'departemen_id' => $request->departemen_id,
            'name' => $request->lokasi,
        ]);

        Alert::success('Berhasil', 'Data Lokasi berhasil disimpan!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('lokasi-departemen.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            'lokasi' => 'required'
        ]);

        Location::find($id)->update([
            'departemen_id' => $request->departemen_id,
            'name' => $request->lokasi,
        ]);

        Alert::success('Berhasil', 'Data Lokasi berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('lokasi-departemen.detail', $request->departemen_id);
    }

    public function delete($id) {
        $departemen_id = Location::find($id)->departemen_id;
        Location::find($id)->delete();

        Alert::success('Berhasil', 'Data Lokasi berhasil dihapus!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('lokasi-departemen.detail', $departemen_id);
    }

}


