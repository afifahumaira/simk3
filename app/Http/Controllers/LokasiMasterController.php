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
        $departemens = Departemen::all();
        $locations = Location::where('name', 'LIKE', '%'.$request->search.'%')
        // ->when($request->has('filter'), function($query) use($request){
        //     if($request->filter !=''){
        //      $query->where('departemen_id', $request->filter);
        //     }
        //  })
        ->paginate(10);      
            
        return view('dashboard.masterHirarc.lokasi-departemen.index', compact('locations'));
    }

    public function tambah() {
        $departemen = Departemen::all();
        $locations = Location::all();
        // $departemens=Departemen::all();

        return view('dashboard.masterHirarc.lokasi-departemen.tambah-lokasi', compact('locations', 'departemen'));
        // ->with('departemens',$departemens);
    }

    public function edit($id) {
        $departemen = Departemen::all();
        $loc = Location::findOrFail($id);
        
        return view('dashboard.masterHirarc.lokasi-departemen.edit-lokasi', compact('loc', 'departemen'))
        ->with('id', $loc);
    }

    // public function detail($id, Request $request) {
    //     $locations = Location::where('id_lokasi', $id)
    //     ->where('name', 'LIKE', '%'.$request->search.'%')
    //     ->paginate(10);
    //     return view('dashboard.masterHirarc.lokasi-departemen.detail-lokasi', compact('locations'));
    // }

    public function simpan(Request $request) {
        $request->validate([
            'departemen_id' => 'required',
            'name' => 'required'
        ]);

        Location::create([
            'departemen_id' => $request->departemen_id,
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Lokasi berhasil disimpan!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('lokasimaster.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            'departemen_id' => 'required',
            'name' => 'required'
        ]);

        Location::find($id)->update([
            'departemen_id' => $request->departemen_id,
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Lokasi berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('lokasimaster.index');
    }

    public function delete($id) {
        $locations = Location::find($id);
        $locations->delete();

        Alert::success('Berhasil', 'Data Lokasi berhasil dihapus!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('lokasimaster.index', $id);
    }

}


