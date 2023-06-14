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
use Hash;
use Validator;

class InventoryController extends Controller
{

    public function index(){
        $inventory = VwInventory::get();
        
        return response()->json([
            'message' => 'success',
            'data' => $inventory,
        ], 200);
    }

    public function detail($id_inventory){
        $inventory = VwInventory::where('id_inventory', $id_inventory)->first();
        
        return response()->json([
            'message' => 'success',
            'data' => $inventory,
        ], 200);
    }


    public function insert(Request $request){
        
        $request->validate([
            'nama_inventory'      => 'required',
            'tipe'      => 'required',
            'tanggal_kadaluarsa'      => 'required',
            'langitude'      => 'required',
            'latitude'      => 'required',
            'lokasi'      => 'required',
            'kondisi'      => 'required',
            'id_users'      => 'required',
            'gambar_inventory'      => 'required',
        ]);

        $berkas = $request->file('gambar_inventory');
        $nama_berkas = time()."_".$berkas->getClientOriginalName();
        $tujuan_upload = 'berkas';
        $berkas->move($tujuan_upload,$nama_berkas);

        $data = array(
            'nama_inventory'      => $request->nama_inventory,
            'tipe'      => $request->tipe,
            'tanggal_kadaluarsa'      => $request->tanggal_kadaluarsa,
            'langitude'      => $request->langitude,
            'latitude'      => $request->latitude,
            'lokasi'      => $request->lokasi,
            'kondisi'      => $request->kondisi,
            'id_users'      => $request->id_users,
            'gambar_inventory' => $nama_berkas,
        );

        Inventory::insert($data);

        return response()->json([
            'message' => 'Data berhasil di Tambahkan',
        ], 200);

    }


    public function update($id_inventory, Request $request){
        
        $request->validate([
            'nama_inventory'      => 'required',
            'tipe'      => 'required',
            'tanggal_kadaluarsa'      => 'required',
            'langitude'      => 'required',
            'latitude'      => 'required',
            'lokasi'      => 'required',
            'kondisi'      => 'required',
            'id_users'      => 'required',
        ]);

        if($request->gambar_inventory){
            $berkas = $request->file('gambar_inventory');
            $nama_berkas = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'berkas';
            $berkas->move($tujuan_upload,$nama_berkas);
    
            $data = array(
                'nama_inventory'      => $request->nama_inventory,
                'tipe'      => $request->tipe,
                'tanggal_kadaluarsa'      => $request->tanggal_kadaluarsa,
                'langitude'      => $request->langitude,
                'latitude'      => $request->latitude,
                'lokasi'      => $request->lokasi,
                'kondisi'      => $request->kondisi,
                'id_users'      => $request->id_users,
                'gambar_inventory' => $nama_berkas,
            );
    
            Inventory::where('id_inventory', $id_inventory)->update($data);
    
            return response()->json([
                'message' => 'Data berhasil di Ubah',
            ], 200);
        }else{

            $data = array(
                'nama_inventory'      => $request->nama_inventory,
                'tipe'      => $request->tipe,
                'tanggal_kadaluarsa'      => $request->tanggal_kadaluarsa,
                'langitude'      => $request->langitude,
                'latitude'      => $request->latitude,
                'lokasi'      => $request->lokasi,
                'kondisi'      => $request->kondisi,
                'id_users'      => $request->id_users,
            );
    
            Inventory::where('id_inventory', $id_inventory)->update($data);
    
            return response()->json([
                'message' => 'Data berhasil di Ubah',
            ], 200);
        }
        

    }

    public function delete($id_inventory){
        Inventory::where('id_inventory', $id_inventory)->delete();
        return response()->json([
            'message' => 'Data berhasil di Hapus',
        ], 200);

    }
    

}
