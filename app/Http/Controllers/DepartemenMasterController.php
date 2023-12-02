<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Location;
use App\Models\Hazard;
use Illuminate\Http\Request;
use Alert;

class DepartemenmasterController extends Controller
{
    public function index(Request $request) {
        $departemen = Departemen::where('name', 'LIKE', '%'.$request->search.'%')
            ->paginate(10);
        return view('dashboard.masterHirarc.departemen-master.index', compact('departemen'));
    }

    public function tambah() {
        $departemen = Departemen::paginate(10);
        return view('dashboard.masterHirarc.departemen-master.tambah-departemen', compact('departemen'));
    }

    public function edit($id) {
        $dep = Departemen::find($id);
        
        return view('dashboard.masterHirarc.departemen-master.edit-departemen', compact('dep'))
        ->with('id', $dep);
    }

    public function simpan(Request $request) {
        $request->validate([
            'name' => 'required',
            
        ]);

        Departemen::create([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Departemen berhasil disimpan!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('departemenmaster.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
            
        ]);

        Departemen::find($id)->update([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Departemen berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('departemenmaster.index');
    }

    public function delete($id) {
        $departemen = Departemen::find($id);
        $departemen->delete();

        Alert::success('Berhasil', 'Data Departemen berhasil dihapus!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('departemenmaster.index', $id);
    }

}