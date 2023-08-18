<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
use App\Models\Activitie_master;
use App\Models\Control;
use App\Models\Hirarc_postrating;
use App\Models\Hirarc_prerating;
use App\Models\Location_masters;

class HirarcController extends Controller
{
    public function index(){
        $hirarcs = Hirarc::with(['departemen', 'user', 'location'])->paginate(10);
                
        return view('dashboard.hirarc.index')
            ->with('hirarcs',$hirarcs);
    }

    public function tambah($id = null) {
        $departments = Departemen::all();
        $locations = Location_masters::all();
        $activities = Activitie_master::all();
        $hazards = Hazard::all();
        $risks = Risk::all();

        $hirarc = collect();
        if($id != null) {
            $hirarc = Hirarc::with(['id'])->find($id);
        }

        $controls = Control::all();

        return view('dashboard.hirarc.tambah-hirarc')
                ->with('hirarc', $hirarc)
                ->with('location', $locations)
                ->with('departments', $departments)
                ->with('activitie', $activities)
                ->with('hazard', $hazards)
                ->with('risk', $risks)
                ->with('control', $controls);
                
    }

    public function edit($id) {
        $hirarc = Hirarc::with(['departemen', 'user', 'location'])->find($id);
        $controls = Control::all();
        $activities = Activitie_master::find($id);
        return view('dashboard.hirarc.edit-hirarc', compact('hirarc', 'controls', 'activities'));
    }

    public function lihat($id) {
        $hirarc = Hirarc::with(['departemen', 'user', 'location'])->find($id);
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
            'activitie' => 'required',
            'hazard' => 'required',
            'risk' => 'required',
        ]);

        $hirarc = Hirarc::create([
            'departemen_id' => $request->departemen_id,
            'location_id' => $request->location_id,
            'user_id' => auth()->user()->id,
            'activity' => $request->activitie,
            'hazard' => $request->hazard,
            'risk' => $request->risk
        ]);

      //  for($i = 0; $i < count($request->hazard); $i++) {
          //  Hirarc::create([             
           //     'hazard' => $request->hazard[$i],
             //   'risk' => $request->risk[$i],
          //  ]);
     //   }

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

        Hirarc::updateOrCreate([
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
            'activitie_id' => 'required',
            'hazard_id' => 'required',
            'risiko_id' => 'required',
        ]);

        $hirarc = Hirarc::find($id);

        for($i = 0; $i < count($request->hazard_id); $i++) {
            Hirarc::create([
                'hirarc_id' => $hirarc->id,
                'activitie_id' => $request->activitie_id,
                'hazard_id' => $request->hazard_id[$i],
                'risk_id' => $request->risiko_id[$i],
            ]);
        }

        Alert::success('Berhasil', 'Data Hirarc berhasil ditambahkan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->back();
    }

    public function updateDetail($id, Request $request) {

        Hirarc::find($id)->update([
            'hirarc_id' => $request->hirarc_id,
            'activitie_id' => $request->activitie_id,
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
