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
use App\Models\Activitie;
use GPBMetadata\Google\Cloud\Location\Locations;

class HirarcController extends Controller
{
    public function index(Request $request){
        $hirarcs = Hirarc::with(['departemen', 'user', 'location'])
        ->when (auth()->user()->hak_akses=='K3 Departemen', function ($query){
            $query->where('departemen_id', auth()->user()->departemen_id);
        })
        ->where(function($query) use($request){
            $query->where('departemen_id', 'LIKE', '%'.$request->search.'%');
            $query->where('location_id', 'LIKE', '%'.$request->search.'%');
        })
        ->orderBy('departemen_id')
        ->orderBy ('location_id')
        ->paginate(10);
        
        $locCount=[];
        $deptCount = [];
        // $printedDept = [];
        // dd($departemenCount);
        
        foreach ($hirarcs as $hir) {
            
            if (!isset($deptCount[$hir->departemen_id])) {
                $deptCount[$hir->departemen_id] = 0;
            }
            $deptCount[$hir->departemen_id]++;

            if (!isset($locCount[$hir->location_id])) {
                $locCount[$hir->location_id] = 0;
            }
            $locCount[$hir->location_id]++;
        } 
        

        return view('dashboard.hirarc.index')
            ->with('hirarcs',$hirarcs)
            ->with('deptCount',$deptCount)
            ->with('locCount',$locCount);
    }

    // public function index(){
    //     $hirarcs = Hirarc::with(['departemen', 'user', 'location'])
    //     ->when (auth()->user()->hak_akses=='K3 Departemen', function ($query){
    //         $query->where('departemen_id', auth()->user()->departemen_id);
    //     })
            
    //     ->paginate(10);
                
    //     return view('dashboard.hirarc.index')
    //         ->with('hirarcs',$hirarcs);
    // }

    public function tambah($id = null) {
        $departments = Departemen::all();
        $locations = Location_masters::all();
        $activities = Activitie_master::all();
        $hazards = Hazard::all();
        $risks = Risk::all();

        $hrcs = Hirarc::all();

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
        $hirarc = Hirarc::where('id',$id)->find($id);
        $hazards = Hazard::where('id',$id)->get();
        $risks = Risk::where('id',$id)->get();
        

        return view('dashboard.hirarc.tambah-hirarc-detail')
                ->with('hirarc', $hirarc)
                ->with('id', $id)
                ->with('hazard', $hazards)
                ->with('risk', $risks);
                
                
    }

    public function edit($id) {
        
        $hirarc = Hirarc::with(['departemen', 'activitie', 'location', 'hazard', 'risk'])->find($id);
        //$controls = Control::all();
        $activitie = Activitie_master::all();
        $locations = Location_masters::all();
        $departments = Departemen::all();
        $hazards = Hazard::all();
        $risks = Risk::all();

        //$hrcs = Hirarc::findorFail($id);

        
        return view('dashboard.hirarc.edit-hirarc', compact('hirarc', 'activitie', 'locations', 'departments', 'hazards', 'risks'));
               
    }

    public function editDetail($id ) {
        // dd($id);
        $departments = Departemen::all();
        $hirarc = Hirarc::where('id',$id)->find($id);
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
            
            
                
        Alert::success('Berhasil', 'Data Hirarc berhasil ditambahkan!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        
    }

    

    public function lihat($departemen_id, Request $request) {
        $hirarcs = Hirarc::with(['departemen', 'activitie', 'location', 'hazard', 'risk'])
        
        ->where('departemen_id', $departemen_id )
        ->when($request->has('location_id'), function($query) use($request){
            if($request->location_id !=''){
             $query->where('location_id', $request->location_id);
            }
         })
        ->orderBy ('location_id')
        ->orderBy('activity')
        ->orderBy ('hazard')
        ->get();
        $lokasi_ids=Hirarc::where('departemen_id', $departemen_id )->pluck('location_id')->unique()->toArray();
        // @dd($lokasi_ids);
        $locations=Location::whereIn('id', $lokasi_ids )->get();
        // dd($hirarcs);
        $locCount=[];
        $actCount=[];
        $hazardCount=[];
        foreach ($hirarcs as $hir) {
            if (!isset($locCount[$hir->location_id])) {
                            $locCount[$hir->location_id] = 0;
                        }
                        $locCount[$hir->location_id]++;
            if (!isset($actCount[$hir->activity])) {
                $actCount[$hir->activity] = 0;
            }
            $actCount[$hir->activity]++;

            if (!isset($hazardCount[$hir->hazard])) {
                $hazardCount[$hir->hazard] = 0;
            }
            $hazardCount[$hir->hazard]++;
        } 
        
        return view('dashboard.hirarc.lihat-hirarc', compact('hirarcs'))
        ->with('locCount',$locCount)
        ->with('actCount',$actCount)
        ->with('hazardCount',$hazardCount)
        ->with('locations',$locations);
        
    }

//     public function testlihat(){
//         $activities = Activitie::first();
//         // dd($activities->lokasi);
//         // $location = Location::whereIn('id', json_decode($activities->lokasi))->get();
//         $lokasi_id = array_map('intval', explode(',', $activities->lokasi));
// $location = Location::whereIn('id', $lokasi_id)->get();
// dd
        
//         // $activities = Activitie::whereRaw("FIND_IN_SET($id, lokasi)")->paginate(10);
//         // dd($activities);
//         return view('dashboard.hirarc.testlihat', compact('activities'));
//     }

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
            'risk' => $request->risk,
            
            
        ]);

        // foreach  ($request->hazard as $key => $hazard){
        //     Hirarc::update([
        //     'hazard' => $hazard[$key],
        //     'risk' => $request->risk[$key],
        //     ]);
        // }

    //    for($i = 0; $i < count($request->hazard); $i++) {
    //        Hirarc::create([             
    //            'hazard' => $request->hazard[$i],
    //            'risk' => $request->risk[$i],
    //        ]);
    //    }

        Alert::success('Berhasil', 'Data Hirarc berhasil disimpan!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
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

            Alert::success('Berhasil', 'Data Hirarc berhasil disimpan!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('hirarc.tambah')
        ->with('id', $id);
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
            
            Alert::success('Berhasil', 'Data HIRARC berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
            return redirect()->route('hirarc.index');
    
        }

        public function delete($id) {
            $hirarc = Hirarc::find($id);
            $hirarc->delete();
    
            Alert::success('Berhasil', 'Data Hirarc berhasil dihapus!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
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

    
    

    
