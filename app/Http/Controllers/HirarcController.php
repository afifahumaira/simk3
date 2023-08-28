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

        $hrcs = Hirarc::latest()->first();

        $hirarc = collect();
        if($id != null) {
            $hirarc = Hirarc::find($id);
        }

        $controls = Control::all();

        return view('dashboard.hirarc.tambah-hirarc')
                ->with('hirarc', $hirarc)
                ->with('location', $locations)
                ->with('departments', $departments)
                ->with('activitie', $activities)
                ->with('hazard', $hazards)
                ->with('risk', $risks)
                ->with('hirarc', $hrcs)
                ->with('control', $controls);
                
    }

    public function tambahDetail($id = null) {
        $hirarc = Hirarc::where('id',$id)->first();
        $hazards = Hazard::where('id',$id)->get();
        $risks = Risk::where('id',$id)->get();

        return view('dashboard.hirarc.tambah-hirarc-detail')
                ->with('hirarc', $hirarc)
                ->with('id', $id)
                ->with('hazard', $hazards)
                ->with('risk', $risks);
                
    }

    public function edit($id) {
        $hirarc = Hirarc::with(['departemen', 'user', 'location'])->find($id);
        $controls = Control::all();
        $activities = Activitie_master::findorFail($id);
        $locations = Location::findorFail($id);
        $departments = Departemen::findorFail($id);
        $hazards = Hazard::findorFail($id);
        $risks = Risk::findorFail($id);

        $hrcs = Hirarc::findorFail($id);

        
        return view('dashboard.hirarc.edit-hirarc', compact('hirarc', 'controls', 'activities', 'hazards', 'risks'))
        ->with('hirarc', $hirarc)
                ->with('location', $locations)
                ->with('departments', $departments)
                ->with('activitie', $activities)
                ->with('hazard', $hazards)
                ->with('risk', $risks)
                ->with('hirarc', $hrcs)
                ->with('control', $controls);
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
            
            
        ]);

        // foreach  ($request->hazard as $key => $hazard){
        //     Hirarc::create([
        //     'hazard' => $hazard[$key],
        //     'risk' => $request->risk[$key],
        //     ]);
        // }

       for($i = 0; $i < count($request->hazard); $i++) {
           Hirarc::create([             
               'hazard' => $request->hazard[$i],
               'risk' => $request->risk[$i],
           ]);
       }

        Alert::success('Berhasil', 'Data Hirarc berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('hirarc.tambah', $hirarc->id);
        }

        public function save($id, Request $request) {
            // $validatedData = $request->validate([
            //     'kesesuaian' => 'required',
            //     'kondisi' => 'required',
            //     'kendali' => 'required',
            //     'current_severity' => 'required',
            //     'current_exposure' => 'required',
            //     'current_probability' => 'required',
            //     'current_risk_rating' => 'required',
            //     'current_risk_category' => 'required',
            //     'penyebab' => 'required',
            //     'usulan' => 'required',
            //     'form_diperlukan' => 'required',
            //     'sop' => 'required',
            //     'residual_severity' => 'required',
            //     'residual_exposure' => 'required',
            //     'residual_probability' => 'required',
            //     'residual_risk_rating' => 'required',
            //     'residual_risk_category' => 'required',
            //     'penanggung_jawab' => 'required',
            //     'status' => 'required',
            // ]);
    
            Hirarc::find($id)->update([
                //$validatedData
                'kesesuaian'      => $request->kesesuaian,
                'kondisi'      => $request->kondisi,
                'kendali'      => $request->kendali,
                'current_severity'      => $request->current_severity,
                'current_exposure'      => $request->current_exposure,
                'current_probability'      => $request->current_probability,
                'current_risk_rating'      => $request->current_risk_rating,
                'current_risk_category'      => $request->current_risk_category,
                'penyebab'      => $request->penyebab,
                'usulan'      => $request->usulan,
                'form_diperlukan'      => $request->form_diperlukan,
                'sop'      => $request->sop,
                'residual_severity'      => $request->residual_severity,
                'residual_exposure'      => $request->residual_exposure,
                'residual_probability'      => $request->residual_probability,
                'residual_risk_rating'      => $request->residual_risk_rating,
                'residual_risk_category'      => $request->residual_risk_category,
                'penanggung_jawab'      => $request->penanggung_jawab,
                'status'      => $request->status,
                
            ]);

            Alert::success('Berhasil', 'Data Hirarc berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('hirarc.tambah')
        ->with('id', $id);
        }

        public function editDetail($id ) {
            // dd($id);
            $departments = Departemen::all();
            $hirarc = Hirarc::where('id',$id)->first();
            $locations = Location_masters::all();
            $activities = Activitie_master::all();
            $hazards = Hazard::all();
            $risks = Risk::all();
            
            
    
            return view('dashboard.hirarc.edit-hirarc-detail')
                ->with('hirarc', $hirarc)
                ->with('locations', $locations)
                ->with('departments', $departments)
                ->with('activitie', $activities)
                ->with('hazard', $hazards)
                ->with('risk', $risks);
                
                
                    
            Alert::success('Berhasil', 'Data Hirarc berhasil ditambahkan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
            
        }
    
        public function update($id, Request $request) {
            // $request->validate([
            //     'activity' => 'required',
            //     'hazard' => 'required',
            //     'risk' => 'required',
            //     'kesesuaian' => 'required',
            //     'kondisi' => 'required',
            //     'kendali' => 'required',
            //     'current_severity' => 'required',
            //     'current_exposure' => 'required',
            //     'current_probability' => 'required',
            //     'current_risk_rating' => 'required',
            //     'current_risk_category' => 'required',
            //     'penyebab' => 'required',
            //     'usulan' => 'required',
            //     'form_diperlukan' => 'required',
            //     'sop' => 'required',
            //     'residual_severity' => 'required',
            //     'residual_exposuer' => 'required',
            //     'residual_probability' => 'required',
            //     'residual_risk_rating' => 'required',
            //     'residual_risk_category' => 'required',
            //     'penanggung_jawab' => 'required',
            //     'status' => 'required',
            // ]);

            Hirarc::find($id)->update([
               // $validatedData
                // 'activity'      => $request->activity,
                // 'hazard'      => $request->hazard,
                // 'risk'      => $request->risk,
                'kesesuaian'      => $request->kesesuaian,
                'kondisi'      => $request->kondisi,
                'kendali'      => $request->kendali,
                'current_severity'      => $request->current_severity,
                'current_exposure'      => $request->current_exposure,
                'current_probability'      => $request->current_probability,
                'current_risk_rating'      => $request->current_risk_rating,
                'current_risk_category'      => $request->current_risk_category,
                'penyebab'      => $request->penyebab,
                'usulan'      => $request->usulan,
                'form_diperlukan'      => $request->form_diperlukan,
                'sop'      => $request->sop,
                'residual_severity'      => $request->residual_severity,
                'residual_exposure'      => $request->residual_exposure,
                'residual_probability'      => $request->residual_probability,
                'residual_risk_rating'      => $request->residual_risk_rating,
                'residual_risk_category'      => $request->residual_risk_category,
                'penanggung_jawab'      => $request->penanggung_jawab,
                'status'      => $request->status,
                
            ]);
            // dd("aa");
            
            Alert::success('Berhasil', 'Data HIRARC berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('hirarc.index');
    
        }

        public function delete($id) {
            $hirarc = Hirarc::find($id);
            $hirarc->delete();
    
            Alert::success('Berhasil', 'Data Hirarc berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
            return redirect()->back();
        }
    
    

   public function simpanPreControl($current_severity, $current_seposure, $current_probability, Request $request) {
        $current_severity = Hirarc::get()->current_severity;
        $current_exposure = Hirarc::get()->current_exposure;
        $current_probability = Hirarc::get()->current_probability;

        $precontrol = $current_severity * $current_exposure * $current_probability;

        return $precontrol;
    //    $request->validate([
    //        'pre_severity' => 'required',
    //        'pre_exposure' => 'required',
    //        'pre_probability' => 'required',
    //        'hasilprecontrol' => 'required',
    //    ]);

    //    Hirarc_prerating::updateOrCreate([
    //        'hirarc_id' => $id,
    //        'hirarc_detail_id' => $detail_id,
    //    ], [
    //        'pre_severity' => $request->pre_severity,
    //        'pre_exposure' => $request->pre_exposure,
    //        'pre_probability' => $request->pre_probability,
    //        'hasilprecontrol' => $request->hasilprecontrol,
    //    ]);

    //    Alert::success('Berhasil', 'Data Pre Control berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
    //    return redirect()->back();

    }
}
   // public function simpanSolusi($id, $detail_id, Request $request) {
    //    $request->validate([
    //        'control_id' => 'required',
    //        'control_child_id' => 'required',
    //    ]);

    //    Hirarc::updateOrCreate([
    //        'hirarc_id' => $id,
    //        'hirarc_detail_id' => $detail_id,
    //    ], [
    //        'control_child_id' => $request->control_child_id,
    //    ]);

     //   Alert::success('Berhasil', 'Data Solusi berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
     //   return redirect()->back();
    //}

    //public function simpanPostControl($id, $detail_id, Request $request) {
    //    $request->validate([
    //        'post_severity' => 'required',
    //        'post_exposure' => 'required',
    //        'post_probability' => 'required',
    //        'hasilpostcontrol' => 'required',
    //    ]);

    //    Hirarc_postrating::updateOrCreate([
    //        'hirarc_id' => $id,
    //        'hirarc_detail_id' => $detail_id,
    //    ], [
    //        'post_severity' => $request->post_severity,
    //        'post_exposure' => $request->post_exposure,
    //        'post_probability' => $request->post_probability,
    //        'hasilpostcontrol' => $request->hasilpostcontrol,
    //    ]);

     //   Alert::success('Berhasil', 'Data Post Control berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
     //   return redirect()->back();
    //}

    
    

    
