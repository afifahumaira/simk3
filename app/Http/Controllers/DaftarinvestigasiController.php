<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Investigasi;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;
use App\Models\P2k3;
use App\Models\Departemen;


use Hash;
use Validator;

class DaftarinvestigasiController extends Controller
{
    public function index(){
        $investigasi = Investigasi::with(['departemen', 'p2k3'])->paginate(10);
        
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

    public function ubah($id) {
        $departments = Departemen::all();
        $investigasi = Investigasi::findOrFail($id);

        $p2k3s = P2k3::all();
        return view('dashboard.laporaninsiden.edit-insiden', compact('investigasi', 'departments', 'p2k3s'));
    }

    public function update($id_investigasi, Request $request){
        
        $request->validate([
            'penyebab_langsung'      => 'required',
            'penyeyab_tidak_langsung' => 'required',
            'tenggat_waktu'      => 'required',
            'tindakan'      => 'required',
            
        ]);

        $data = array(
            
            'penyebab_langsung'      => $request->penyebab_langsung,
            'penyebab_tak_langsung'      => $request->penyebab_tak_langsung,
            'tenggat_waktu'      => $request->tenggat_waktu,
            'tindakan'      => $request->tindakan,
            
        );

        Investigasi::find($id_investigasi)->update($data);

        Alert::success('Berhasil', 'Data Laporan Insiden berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('daftarinvestigasi.index');
        

    }

    public function delete($id_investigasi){
        Investigasi::where('id_investigasi', $id_investigasi)->delete();
        return response()->json([
            'message' => 'Data berhasil di Hapus',
        ], 200);

    }
}
