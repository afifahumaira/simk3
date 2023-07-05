<?php

namespace App\Http\Controllers;

use App\Models\Activitie_master;
use App\Models\Location_master;
use Illuminate\Http\Request;
use Alert;

class AktifitasMasterController extends Controller
{
    public function index() {
        $locations = Location_master::all();
        return view('dashboard.masterHirarc.aktifitas.index', compact('locations'));
    }

    public function tambah() {
        $locations = Location_master::with(['departemen'])->orderBy('departemen_id')->get();

        return view('dashboard.masterHirarc.aktifitas.tambah-aktifitas', compact('locations'));
    }

    public function edit($id, $id_act) {
        $act = Activitie_master::find($id_act);
        $locations = Location_master::with(['departemen'])->orderBy('departemen_id')->get();
        return view('dashboard.masterHirarc.aktifitas.edit-aktifitas', compact('act', 'locations', 'id'));
    }

    public function detail($id) {
        $loc = Location_master::find($id);
        $activities = Activitie_master::whereRaw("FIND_IN_SET($id, lokasi)")->paginate(10);
        return view('dashboard.masterHirarc.aktifitas.detail-aktifitas', compact('activities', 'loc', 'id'));
    }

    public function simpan(Request $request) {
        $request->validate([
            'name' => 'required',
            'lokasi' => 'required'
        ]);

        $locs = implode(',', $request->lokasi);

        Activitie_master::create([
            'lokasi' => $locs,
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Aktifitas berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('aktifitas.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
            'lokasi' => 'required'
        ]);

        $locs = implode(',', $request->lokasi);

        Activitie_master::find($id)->update([
            'lokasi' => $locs,
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Aktifitas berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('aktifitas.index');
    }

    public function delete($id, $id_act) {
        Activitie_master::find($id_act)->delete();

        Alert::success('Berhasil', 'Data Aktifitas berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('aktifitas.detail', $id);
    }

}
