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
use App\Models\VwLaporanInsiden;
use Hash;
use Validator;

class LaporanInsidenController extends Controller
{

    public function index(){
        $laporan_insiden = VwLaporanInsiden::get();
        
        return response()->json([
            'message' => 'success',
            'laporan_insiden' => $laporan_insiden,
        ], 200);
    }


    public function insert(Request $request){
        
        $request->validate([
            'tanggal_kejadian'      => 'required',
            'jenis_insiden'      => 'required',
            'kronologi'      => 'required',
            'langitude'      => 'required',
            'latitude'      => 'required',
            'penyebab_insiden'      => 'required',
            'nama_korban'      => 'required',
            'email_korban' => 'required|email',
            'status_laporan_insiden' => 'required',
            'id_users'      => 'required',
            'gambar_laporan'      => 'required',
        ]);

        $berkas = $request->file('gambar_laporan');
        $nama_berkas = time()."_".$berkas->getClientOriginalName();
        $tujuan_upload = 'berkas';
        $berkas->move($tujuan_upload,$nama_berkas);

        $data = array(
            'tanggal_kejadian'      => $request->tanggal_kejadian,
            'jenis_insiden'      => $request->jenis_insiden,
            'kronologi'      => $request->kronologi,
            'langitude'      => $request->langitude,
            'latitude'      => $request->latitude,
            'penyebab_insiden'      => $request->penyebab_insiden,
            'nama_korban'      => $request->nama_korban,
            'email_korban'     => $request->email_korban,
            'status_laporan_insiden' => $request->status_laporan_insiden,
            'id_users'      => $request->id_users,
            'gambar_laporan' => $nama_berkas,
        );

        LaporanInsiden::insert($data);

        return response()->json([
            'message' => 'Data berhasil di Tambahkan',
        ], 200);

    }


    public function update($id_laporan_insiden, Request $request){
        
        $request->validate([
            'tanggal_kejadian'      => 'required',
            'jenis_insiden'      => 'required',
            'kronologi'      => 'required',
            'langitude'      => 'required',
            'latitude'      => 'required',
            'penyebab_insiden'      => 'required',
            'nama_korban'      => 'required',
            'email_korban' => 'required|email',
            'status_laporan_insiden' => 'required',
            'id_users'      => 'required',
        ]);

        if($request->gambar_laporan){
            $berkas = $request->file('gambar_laporan');
            $nama_berkas = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'berkas';
            $berkas->move($tujuan_upload,$nama_berkas);
    
            $data = array(
                'tanggal_kejadian'      => $request->tanggal_kejadian,
                'jenis_insiden'      => $request->jenis_insiden,
                'kronologi'      => $request->kronologi,
                'langitude'      => $request->langitude,
                'latitude'      => $request->latitude,
                'penyebab_insiden'      => $request->penyebab_insiden,
                'nama_korban'      => $request->nama_korban,
                'email_korban'     => $request->email_korban,
                'status_laporan_insiden' => $request->status_laporan_insiden,
                'id_users'      => $request->id_users,
                'id_inventory' => $request->id_inventory,
                'gambar_laporan' => $nama_berkas,
            );

            LaporanInsiden::where('id_laporan_insiden', $id_laporan_insiden)->update($data);
    
            return response()->json([
                'message' => 'Data berhasil di Ubah',
            ], 200);
        }else{

            $data = array(
                'tanggal_kejadian'   => $request->tanggal_kejadian,
                'jenis_insiden'      => $request->jenis_insiden,
                'kronologi'      => $request->kronologi,
                'langitude'      => $request->langitude,
                'latitude'      => $request->latitude,
                'penyebab_insiden'      => $request->penyebab_insiden,
                'nama_korban'      => $request->nama_korban,
                'email_korban'     => $request->email_korban,
                'status_laporan_insiden' => $request->status_laporan_insiden,
                'id_users'      => $request->id_users,
                'id_inventory' => $request->id_inventory,
            );
    
            LaporanInsiden::where('id_laporan_insiden', $id_laporan_insiden)->update($data);
    
            return response()->json([
                'message' => 'Data berhasil di Ubah',
            ], 200);
        }
    }

    public function delete($id_laporan_insiden){
        LaporanInsiden::where('id_laporan_insiden', $id_laporan_insiden)->delete();
        return response()->json([
            'message' => 'Data berhasil di Hapus',
        ], 200);

    }
    

}
