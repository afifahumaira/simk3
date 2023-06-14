<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Investigasi;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;
use App\Models\VwInventory;
use App\Models\VwPotensiBahaya;
use Hash;
use Validator;

class PotensiBahayaController extends Controller
{

    public function index(){
        $potensi_bahaya = VwPotensiBahaya::get();
        
        return response()->json([
            'message' => 'success',
            'data' => $potensi_bahaya,
        ], 200);
    }

    public function detail($id_potensi_bahaya){
        $potensi_bahaya = VwPotensiBahaya::where('id_potensi_bahaya', $id_potensi_bahaya)->first();
        
        return response()->json([
            'message' => 'success',
            'data' => $potensi_bahaya,
        ], 200);
    }


    public function insert(Request $request){
        
        $request->validate([
            'waktu_kejadian'      => 'required',
            'deskripsi_potensi_bahaya'      => 'required',
            'resiko_bahaya'      => 'required',
            'usulan_perbaikan'      => 'required',
            'status_potensi_bahaya'      => 'required',
            'gambar_potensi_bahaya'      => 'required',
            'id_users'      => 'required',
            'id_inventory'      => 'required',
        ]);

        $berkas = $request->file('gambar_potensi_bahaya');
        $nama_berkas = time()."_".$berkas->getClientOriginalName();
        $tujuan_upload = 'berkas';
        $berkas->move($tujuan_upload,$nama_berkas);

        $data = array(
            'waktu_kejadian'      => $request->waktu_kejadian,
            'deskripsi_potensi_bahaya'      => $request->deskripsi_potensi_bahaya,
            'resiko_bahaya'      => $request->resiko_bahaya,
            'usulan_perbaikan'      => $request->usulan_perbaikan,
            'status_potensi_bahaya'      => $request->status_potensi_bahaya,
            'gambar_potensi_bahaya'      => $nama_berkas,
            'id_users'      => $request->id_users,
            'id_inventory'      => $request->id_inventory,
        );

        PotensiBahaya::insert($data);

        return response()->json([
            'message' => 'Data berhasil di Tambahakan',
        ], 200);

    }


    public function update($id_potensi_bahaya, Request $request){
        
        $request->validate([
            'waktu_kejadian'      => 'required',
            'deskripsi_potensi_bahaya'      => 'required',
            'resiko_bahaya'      => 'required',
            'usulan_perbaikan'      => 'required',
            'status_potensi_bahaya'      => 'required',
            'id_users'      => 'required',
            'id_inventory'      => 'required',
        ]);

        if($request->gambar_potensi_bahaya){
            $berkas = $request->file('gambar_potensi_bahaya');
            $nama_berkas = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'berkas';
            $berkas->move($tujuan_upload,$nama_berkas);
    
            $data = array(
                'waktu_kejadian'      => $request->waktu_kejadian,
                'deskripsi_potensi_bahaya'      => $request->deskripsi_potensi_bahaya,
                'resiko_bahaya'      => $request->resiko_bahaya,
                'usulan_perbaikan'      => $request->usulan_perbaikan,
                'status_potensi_bahaya'      => $request->status_potensi_bahaya,
                'gambar_potensi_bahaya'      => $nama_berkas,
                'id_users'      => $request->id_users,
                'id_inventory'      => $request->id_inventory,
            );
    
            PotensiBahaya::where('id_potensi_bahaya', $id_potensi_bahaya)->update($data);
    
            return response()->json([
                'message' => 'Data berhasil di Ubah',
            ], 200);
        }else{

            $data = array(
                'waktu_kejadian'      => $request->waktu_kejadian,
                'deskripsi_potensi_bahaya'      => $request->deskripsi_potensi_bahaya,
                'resiko_bahaya'      => $request->resiko_bahaya,
                'usulan_perbaikan'      => $request->usulan_perbaikan,
                'status_potensi_bahaya'      => $request->status_potensi_bahaya,
                'id_users'      => $request->id_users,
                'id_inventory'      => $request->id_inventory,
            );
    
            PotensiBahaya::where('id_potensi_bahaya', $id_potensi_bahaya)->update($data);
    
            return response()->json([
                'message' => 'Data berhasil di Ubah',
            ], 200);
        }
        

    }

    public function delete($id_potensi_bahaya){
        PotensiBahaya::where('id_potensi_bahaya', $id_potensi_bahaya)->delete();
        return response()->json([
            'message' => 'Data berhasil di Hapus',
        ], 200);

    }
    

}
