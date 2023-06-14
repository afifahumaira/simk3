<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Hirarc;
use App\Models\HirarcPos;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;
use App\Models\VwInventory;
use App\Models\VwHirarc;
use App\Models\VwHirarcPos;
use App\Models\VwHirarcPre;
use Hash;
use Validator;

class HirarcPosController extends Controller
{

    public function index(){
        $hirarcpos = VwHirarcPos::get();
        
        return response()->json([
            'message' => 'success',
            'data' => $hirarcpos,
        ], 200);
    }

    public function detail($id_hirarc_postratings){
        $hirarcpos = VwHirarcPos::where('id_hirarc_postratings', $id_hirarc_postratings)->first();
        
        return response()->json([
            'message' => 'success',
            'data' => $hirarcpos,
        ], 200);
    }


    public function insert(Request $request){
        
        $request->validate([
            'pos_severity'      => 'required',
            'pos_exposure'      => 'required',
            'pos_probability'      => 'required',
            'hasil_poscontrol'      => 'required',
            'id_hirarc'      => 'required',
        ]);


        $data = array(
            'pos_severity'      => $request->pos_severity,
            'pos_exposure'      => $request->pos_exposure,
            'pos_probability'      => $request->pos_probability,
            'hasil_poscontrol'      => $request->hasil_poscontrol,
            'id_hirarc'      => $request->id_hirarc,
        );

        HirarcPos::insert($data);

        return response()->json([
            'message' => 'Data berhasil di Tambahkan',
        ], 200);

    }


    public function update($id_hirarc_postratings, Request $request){
        
        $request->validate([
            'pos_severity'      => 'required',
            'pos_exposure'      => 'required',
            'pos_probability'      => 'required',
            'hasil_poscontrol'      => 'required',
            'id_hirarc'      => 'required',
        ]);

        $data = array(
            'pos_severity'      => $request->pos_severity,
            'pos_exposure'      => $request->pos_exposure,
            'pos_probability'      => $request->pos_probability,
            'hasil_poscontrol'      => $request->hasil_poscontrol,
            'id_hirarc'      => $request->id_hirarc,
        );

        HirarcPos::where('id_hirarc_postratings', $id_hirarc_postratings)->update($data);

        return response()->json([
            'message' => 'Data berhasil di Ubah',
        ], 200);
        

    }

    public function delete($id_hirarc_postratings){
        HirarcPos::where('id_hirarc_postratings', $id_hirarc_postratings)->delete();
        return response()->json([
            'message' => 'Data berhasil di Hapus',
        ], 200);

    }
    

}
