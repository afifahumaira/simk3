<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use App\Models\Hazard;
use Illuminate\Http\Request;
use Alert;

class HazardController extends Controller
{
    public function index(Request $request) {
        $hazards = Hazard::where('name', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
        return view('dashboard.masterHirarc.hazard.index', compact('hazards'));
    }

    public function tambah() {
        $hazards = Hazard::paginate(10);
        return view('dashboard.masterHirarc.hazard.tambah-hazard', compact('hazards'));
    }

    public function edit($id) {
        $hzd = Hazard::find($id);
        
        return view('dashboard.masterHirarc.hazard.edit-hazard', compact('hzd'))
        ->with('id', $hzd);
    }

    // public function detail($id) {
    //     $hzd = Hazard::find($id);
        
    //     return view('dashboard.masterHirarc.hazard.detail-hazard', compact('hzd'));
    // }

    public function simpan(Request $request) {
        $request->validate([
            'name' => 'required',
            
        ]);

        //$acts = implode(',', $request->hazard);

        Hazard::create([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Hazard berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('hazard.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
            
        ]);

        Hazard::find($id)->update([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Hazard berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('hazard.index');
    }

    public function delete($id) {
        $hazards = Hazard::find($id);
        $hazards->delete();

        Alert::success('Berhasil', 'Data Hazard berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('hazard.index', $id);
    }

}
