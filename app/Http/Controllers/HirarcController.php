<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Activitie;
use App\Models\Departemen;
use App\Models\Hazard;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Hirarc;
use App\Models\LaporanInsiden;
use App\Models\Location;
use App\Models\PotensiBahaya;
use App\Models\Risk;
use App\Models\VwInventory;
use Hash;
use Validator;
use Alert;
use App\Models\Control;
use App\Models\Hirarc_detail;
use App\Models\Hirarc_postrating;
use App\Models\Hirarc_prerating;
use App\Models\Control_children;
use App\Models\Hirarc_detail_control;

class HirarcController extends Controller
{
    public function index(){
        $hirarcs = Hirarc::with(['departemen', 'user', 'location'])->paginate(10);

        return view('dashboard.hirarc.index')
            ->with('hirarcs',$hirarcs);
    }

    public function tambah($id = null) {
        $departments = Departemen::all();

        $hirarc = collect();
        if($id != null) {
            $hirarc = Hirarc::with(['hirarc_detail'])->find($id);
        }

        $controls = Control::all();

        return view('dashboard.hirarc.tambah-hirarc')
                ->with('hirarc', $hirarc)
                ->with('controls', $controls)
                ->with('departments', $departments);
    }

    public function getLocation($id) {
        $locations = Location::where('departemen_id', $id)->get();

        return response()->json($locations);
    }

    public function getAktifitas($id) {
        $activities = Activitie::whereRaw("FIND_IN_SET($id, lokasi)")->get();

        return response()->json($activities);
    }

    public function getHazard($id) {
        $hazards = Hazard::whereRaw("FIND_IN_SET($id, aktifitas)")->get();

        return response()->json($hazards);
    }

    public function getRisk($id) {
        $risks = Risk::whereRaw("FIND_IN_SET($id, hazards)")->get();

        return response()->json($risks);
    }

    public function getControlChildren($id) {
        $controlchilds = Control_children::where('parent_id', $id)->get();

        return response()->json($controlchilds);
    }

    public function edit($id) {
        $hirarc = Hirarc::with(['departemen', 'user', 'location', 'hirarc_detail'])->find($id);
        $controls = Control::all();
        $activities = Activitie::whereRaw("FIND_IN_SET($hirarc->location_id, lokasi)")->get();
        return view('dashboard.hirarc.edit-hirarc', compact('hirarc', 'controls', 'activities'));
    }

    public function lihat($id) {
        $hirarc = Hirarc::with(['departemen', 'user', 'location', 'hirarc_detail'])->find($id);
        return view('dashboard.hirarc.lihat-hirarc', compact('hirarc'));
    }

    public function detail($id_hirarc){
        $hirarc = Hirarc::where('id_hirarc', $id_hirarc)->first();

        return response()->json([
            'message' => 'success',
            'data' => $hirarc,
        ], 200);
    }

    public function simpan(Request $request) {
        $request->validate([
            'departemen_id' => 'required',
            'location_id' => 'required',
            'aktifitas_id' => 'required',
            'hazard_id' => 'required',
            'risiko_id' => 'required',
        ]);

        $hirarc = Hirarc::create([
            'departemen_id' => $request->departemen_id,
            'location_id' => $request->location_id,
            'user_id' => auth()->user()->id
        ]);

        for($i = 0; $i < count($request->hazard_id); $i++) {
            Hirarc_detail::create([
                'hirarc_id' => $hirarc->id,
                'activity_id' => $request->aktifitas_id,
                'hazard_id' => $request->hazard_id[$i],
                'risk_id' => $request->risiko_id[$i],
            ]);
        }

        Alert::success('Berhasil', 'Data Hirarc berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('hirarc.tambah', $hirarc->id);
    }

    public function simpanPreControl($id, $detail_id, Request $request) {
        $request->validate([
            'pre_severity' => 'required',
            'pre_exposure' => 'required',
            'pre_probability' => 'required',
            'hasilprecontrol' => 'required',
        ]);

        Hirarc_prerating::updateOrCreate([
            'hirarc_id' => $id,
            'hirarc_detail_id' => $detail_id,
        ], [
            'pre_severity' => $request->pre_severity,
            'pre_exposure' => $request->pre_exposure,
            'pre_probability' => $request->pre_probability,
            'hasilprecontrol' => $request->hasilprecontrol,
        ]);

        Alert::success('Berhasil', 'Data Pre Control berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->back();

    }

    public function simpanSolusi($id, $detail_id, Request $request) {
        $request->validate([
            'control_id' => 'required',
            'control_child_id' => 'required',
        ]);

        Hirarc_detail_control::updateOrCreate([
            'hirarc_id' => $id,
            'hirarc_detail_id' => $detail_id,
        ], [
            'control_child_id' => $request->control_child_id,
        ]);

        Alert::success('Berhasil', 'Data Solusi berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->back();
    }

    public function simpanPostControl($id, $detail_id, Request $request) {
        $request->validate([
            'post_severity' => 'required',
            'post_exposure' => 'required',
            'post_probability' => 'required',
            'hasilpostcontrol' => 'required',
        ]);

        Hirarc_postrating::updateOrCreate([
            'hirarc_id' => $id,
            'hirarc_detail_id' => $detail_id,
        ], [
            'post_severity' => $request->post_severity,
            'post_exposure' => $request->post_exposure,
            'post_probability' => $request->post_probability,
            'hasilpostcontrol' => $request->hasilpostcontrol,
        ]);

        Alert::success('Berhasil', 'Data Post Control berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->back();
    }

    public function update($id, Request $request) {
        $request->validate([
            'aktifitas_id' => 'required',
            'hazard_id' => 'required',
            'risiko_id' => 'required',
        ]);

        $hirarc = Hirarc::find($id);

        for($i = 0; $i < count($request->hazard_id); $i++) {
            Hirarc_detail::create([
                'hirarc_id' => $hirarc->id,
                'activity_id' => $request->aktifitas_id,
                'hazard_id' => $request->hazard_id[$i],
                'risk_id' => $request->risiko_id[$i],
            ]);
        }

        Alert::success('Berhasil', 'Data Hirarc berhasil ditambahkan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->back();
    }

    public function updateDetail($id, Request $request) {

        Hirarc_detail::find($id)->update([
            'hirarc_id' => $request->hirarc_id,
            'activity_id' => $request->aktifitas_id,
            'hazard_id' => $request->hazard_id,
            'risk_id' => $request->risiko_id,
        ]);

        Alert::success('Berhasil', 'Data HIRARC berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->back();

    }

    public function delete($id) {
        $hirarc = Hirarc::find($id);
        $hirarc->delete();

        Alert::success('Berhasil', 'Data Hirarc berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->back();
    }

}
