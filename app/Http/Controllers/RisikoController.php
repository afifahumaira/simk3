<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Models\Hazard;
use App\Models\Risk;

class RisikoController extends Controller
{

    public function index() {
        $risks = Risk::paginate(10);
        return view('dashboard.masterHirarc.risiko.index', compact('risks'));
    }

    public function tambah() {
        $hazards = Hazard::paginate(10);
        return view('dashboard.masterHirarc.risiko.tambah-risiko', compact('hazards'));
    }

    public function edit($id) {
        $risk = Risk::find($id);
        
        return view('dashboard.masterHirarc.risiko.edit-risiko', compact( 'risk'))
        ->with('id', $risk);
    }

    // public function detail($id) {
    //     $haz = Hazard::find($id);
    //     $risikos = Risk::whereRaw("FIND_IN_SET($id, hazards)")->paginate(10);
    //     return view('dashboard.masterHirarc.risiko.detail-risiko', compact('risikos', 'haz', 'id'));
    // }

    public function simpan(Request $request) {
        $request->validate([
            'name' => 'required',
            
        ]);

        Risk::create([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Risiko berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('risiko.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
            
        ]);

        Risk::find($id)->update([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Risiko berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('risiko.index');
    }

    public function delete($id) {
        $risk = Risk::find($id);
        $risk->delete();

        Alert::success('Berhasil', 'Data Risiko berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('risiko.index', $id);
    }

}
