<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Investigasi;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;


use Hash;
use Validator;

class DaftarinvestigasiController extends Controller
{
    public function index(Request $request){
        $investigasi = Investigasi::with(['departemen', 'p2k3'])
        
        ->Where('p2k3_id', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
        
        return view('dashboard.daftarinvestigasi.index')-> with('investigasi',$investigasi);
    }

    public function detail($id_investigasi){
        $investigasi = Investigasi::where('id_investigasi', $id_investigasi)->first();
        
        return response()->json([
            'message' => 'success',
            'data' => $investigasi,
        ], 200);
    }

    public function lihat($id) {
        $investigasi = Investigasi::with(['departemen','p2k3'])->find($id);
        return view('dashboard.daftarinvestigasi.lihat-investigasi', compact('investigasi'));
    }


    public function insert(Request $request){
        
        $request->validate([
            'kategori'      => 'required',
            'penyebab_langsung'      => 'required',
            'penyebab_tak_langsung'      => 'required',
            'tenggat_waktu'      => 'required',
            'tindakan'      => 'required',
            'id_laporan_insiden'      => 'required',
            'id_users'      => 'required',
        ]);


        $data = array(
            'kategori'      => $request->kategori,
            'penyebab_langsung'      => $request->penyebab_langsung,
            'penyebab_tak_langsung'      => $request->penyebab_tak_langsung,
            'tenggat_waktu'      => $request->tenggat_waktu,
            'tindakan'      => $request->tindakan,
            'id_laporan_insiden'      => $request->id_laporan_insiden,
            'id_users'      => $request->id_users,
        );

        Investigasi::insert($data);

        return response()->json([
            'message' => 'Data berhasil di Tambahkan',
        ], 200);

    }


    public function update($id_investigasi, Request $request){
        
        $request->validate([
            'kategori'      => 'required',
            'penyebab_langsung'      => 'required',
            'penyebab_tak_langsung'      => 'required',
            'tenggat_waktu'      => 'required',
            'tindakan'      => 'required',
            'id_laporan_insiden'      => 'required',
            'id_users'      => 'required',
        ]);

        $data = array(
            'kategori'      => $request->kategori,
            'penyebab_langsung'      => $request->penyebab_langsung,
            'penyebab_tak_langsung'      => $request->penyebab_tak_langsung,
            'tenggat_waktu'      => $request->tenggat_waktu,
            'tindakan'      => $request->tindakan,
            'id_laporan_insiden'      => $request->id_laporan_insiden,
            'id_users'      => $request->id_users,
            'id_inventory'      => $request->id_inventory,
        );

        Investigasi::where('id_investigasi', $id_investigasi)->update($data);

        return response()->json([
            'message' => 'Data berhasil di Ubah',
        ], 200);
        

    }

    public function delete($id_investigasi){
        Investigasi::where('id_investigasi', $id_investigasi)->delete();
        return response()->json([
            'message' => 'Data berhasil di Hapus',
        ], 200);

    }
}
