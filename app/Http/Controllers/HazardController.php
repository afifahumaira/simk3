<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use App\Models\Hazard;
use Illuminate\Http\Request;
use Alert;

class HazardController extends Controller
{
    public function index() {
        $activities = Activitie::paginate(10);
        return view('dashboard.masterHirarc.hazard.index', compact('activities'));
    }

    public function tambah() {
        $activities = Activitie::paginate(10);
        return view('dashboard.masterHirarc.hazard.tambah-hazard', compact('activities'));
    }

    public function edit($id, $id_haz) {
        $haz = Hazard::find($id_haz);
        $activities = Activitie::paginate(10);
        return view('dashboard.masterHirarc.hazard.edit-hazard', compact('activities', 'haz', 'id'));
    }

    public function detail($id) {
        $act = Activitie::find($id);
        $hazards = Hazard::whereRaw("FIND_IN_SET($id, aktifitas)")->paginate(10);
        return view('dashboard.masterHirarc.hazard.detail-hazard', compact('hazards', 'act', 'id'));
    }

    public function simpan(Request $request) {
        $request->validate([
            'name' => 'required',
            'aktifitas' => 'required'
        ]);

        $acts = implode(',', $request->aktifitas);

        Hazard::create([
            'aktifitas' => $acts,
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Hazard berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('hazard.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required',
            'aktifitas' => 'required'
        ]);

        $acts = implode(',', $request->aktifitas);

        Hazard::find($id)->update([
            'aktifitas' => $acts,
            'name' => $request->name,
        ]);

        Alert::success('Berhasil', 'Data Hazard berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('hazard.index');
    }

    public function delete($id, $id_haz) {
        Hazard::find($id_haz)->delete();

        Alert::success('Berhasil', 'Data Hazard berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('hazard.detail', $id);
    }

}
