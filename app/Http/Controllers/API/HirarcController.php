<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Hirarc;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;
use App\Models\VwInventory;
use App\Models\VwHirarc;
use Hash;
use Validator;

class HirarcController extends Controller
{

    public function index(){
        $hirarc = VwHirarc::get();
        
        return response()->json([
            'message' => 'success',
            'data' => $hirarc,
        ], 200);
    }

    public function detail($id_hirarc){
        $hirarc = VwHirarc::where('id_hirarc', $id_hirarc)->first();
        
        return response()->json([
            'message' => 'success',
            'data' => $hirarc,
        ], 200);
    }


    public function insert(Request $request){
        
        $request->validate([
            'activity'      => 'required',
            'hazard'      => 'required',
            'risk'      => 'required',
            'id_potensi_bahaya'      => 'required',
            'id_users'      => 'required',
        ]);


        $data = array(
            'activity'      => $request->activity,
            'hazard'      => $request->hazard,
            'risk'      => $request->risk,
            'id_potensi_bahaya'      => $request->id_potensi_bahaya,
            'id_users'      => $request->id_users,
            'id_inventory' => $request->id_inventory,
        );

        Hirarc::insert($data);

        return response()->json([
            'message' => 'Data berhasil di Tambahkan',
        ], 200);

    }


    public function update($id_hirarc, Request $request){
        
        $request->validate([
            'activity'      => 'required',
            'hazard'      => 'required',
            'risk'      => 'required',
            'id_potensi_bahaya'      => 'required',
            'id_users'      => 'required',
        ]);

        $data = array(
            'activity'      => $request->activity,
            'hazard'      => $request->hazard,
            'risk'      => $request->risk,
            'id_potensi_bahaya'      => $request->id_potensi_bahaya,
            'id_users'      => $request->id_users,
            'id_inventory' => $request->id_inventory,
        );

        Hirarc::where('id_hirarc', $id_hirarc)->update($data);

        return response()->json([
            'message' => 'Data berhasil di Ubah',
        ], 200);
        

    }

    public function delete($id_hirarc){
        Hirarc::where('id_hirarc', $id_hirarc)->delete();
        return response()->json([
            'message' => 'Data berhasil di Hapus',
        ], 200);

    }
    

}
