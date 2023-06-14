<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Hirarc;
use App\Models\HirarcPre;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;
use App\Models\VwInventory;
use App\Models\VwHirarc;
use App\Models\VwHirarcPos;
use App\Models\VwHirarcPre;
use Hash;
use Validator;

class HirarcPreController extends Controller
{

    public function index(){
        $hirarcpre = VwHirarcPre::get();
        
        return response()->json([
            'message' => 'success',
            'data' => $hirarcpre,
        ], 200);
    }

    public function detail($id_hirarc_pretratings){
        $hirarcpre = VwHirarcPre::where('id_hirarc_pretratings', $id_hirarc_pretratings)->first();
        
        return response()->json([
            'message' => 'success',
            'data' => $hirarcpre,
        ], 200);
    }


    public function insert(Request $request){
        
        $request->validate([
            'pre_severity'      => 'required',
            'pre_exposure'      => 'required',
            'pre_probability'      => 'required',
            'hasil_precontrol'      => 'required',
            'id_hirarc'      => 'required',
        ]);


        $data = array(
            'pre_severity'      => $request->pre_severity,
            'pre_exposure'      => $request->pre_exposure,
            'pre_probability'      => $request->pre_probability,
            'hasil_precontrol'      => $request->hasil_precontrol,
            'id_hirarc'      => $request->id_hirarc,
        );

        HirarcPre::insert($data);

        return response()->json([
            'message' => 'Data berhasil di Tambahkan',
        ], 200);

    }


    public function update($id_hirarc_pretratings, Request $request){
        
        $request->validate([
            'pre_severity'      => 'required',
            'pre_exposure'      => 'required',
            'pre_probability'      => 'required',
            'hasil_precontrol'      => 'required',
            'id_hirarc'      => 'required',
        ]);

        $data = array(
            'pre_severity'      => $request->pre_severity,
            'pre_exposure'      => $request->pre_exposure,
            'pre_probability'      => $request->pre_probability,
            'hasil_precontrol'      => $request->hasil_precontrol,
            'id_hirarc'      => $request->id_hirarc,
        );

        HirarcPre::where('id_hirarc_pretratings', $id_hirarc_pretratings)->update($data);

        return response()->json([
            'message' => 'Data berhasil di Ubah',
        ], 200);
        

    }

    public function delete($id_hirarc_pretratings){
        HirarcPre::where('id_hirarc_pretratings', $id_hirarc_pretratings)->delete();
        return response()->json([
            'message' => 'Data berhasil di Hapus',
        ], 200);

    }
    

}
