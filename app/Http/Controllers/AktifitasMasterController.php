<?php

namespace App\Http\Controllers;

use App\Models\Activitie_master;
use App\Models\Location_masters;
use Illuminate\Http\Request;
use Alert;

class AktifitasMasterController extends Controller
{
    public function index() {
        $activities = Activitie_master::paginate(10);
        
        return view('dashboard.masterHirarc.aktifitas.index', compact('activities'));
    }

    public function tambah() {
        $activities = Activitie_master::paginate(10);

        return view('dashboard.masterHirarc.aktifitas.tambah-aktifitas', compact('activities'));
    }

    public function edit($id) {
        $act = Activitie_master::find($id);
        
        return view('dashboard.masterHirarc.aktifitas.edit-aktifitas', compact( 'act'))
        ->with('id', $act);
    }

    // public function detail($id) {
    //     $act = Activitie_master::find($id);
        
    //     return view('dashboard.masterHirarc.aktifitas.detail-aktifitas', compact( 'id'));
    // }

    public function simpan(Request $request) {
        $request->validate([
            'name' => 'required',
            
        ]);
       
        Activitie_master::create([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Aktifitas berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('aktifitasmaster.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
        ]);
     
        Activitie_master::find($id)->update([
            
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Aktifitas berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('aktifitasmaster.index');
        
    }

    public function delete($id) {
        $activities = Activitie_master::find($id);
        $activities->delete();

        Alert::success('Berhasil', 'Data Aktifitas berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('aktifitasmaster.index', $id);
    }

}
