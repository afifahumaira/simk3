<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VwUsers;
use App\Models\Inventory;
use App\Models\Hirarc;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;
use App\Models\VwInventory;
use App\Models\VwHirarc;
use Hash;
use Validator;

class penggunaController extends Controller
{

    public function index(){
        $pengguna = VwUsers::where('hak_akses', 'pengguna')->get();
        
        return response()->json([
            'message' => 'success',
            'data' => $pengguna,
        ], 200);
    }

    public function detail($id_users){
        $pengguna =  VwUsers::where('hak_akses', 'pengguna')->where('id', $id_users)->get();
        
        return response()->json([
            'message' => 'success',
            'data' => $pengguna,
        ], 200);
    }


    public function insert(Request $request){
        
        $request->validate([
            'name'      => 'required',
            'id_department'      => 'required',
            'jabatan'      => 'required',
            'no_telp'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed'
        ]);


        $data = array(
            'name'      => $request->name,
            'email'      => $request->email,
            'id_department'      => $request->id_department,
            'jabatan'      => $request->jabatan,
            'no_telp'      => $request->no_telp,
            'hak_akses' => 'pengguna',
            'password'  => bcrypt($request->password)
        );

        User::insert($data);

        return response()->json([
            'message' => 'Data berhasil di Tambahkan',
        ], 200);

    }


    public function update($id_users, Request $request){
        
        $request->validate([
            'name'      => 'required',
            'email'      => 'required',
            'id_department'      => 'required',
            'jabatan'      => 'required',
            'no_telp'      => 'required',
        ]);

        $data = array(
            'name'      => $request->name,
            'email'      => $request->email,
            'id_department' => $request->id_department,
            'jabatan'      => $request->jabatan,
            'no_telp'      => $request->no_telp,
        );

        User::where('id', $id_users)->update($data);

        return response()->json([
            'message' => 'Data berhasil di Ubah',
        ], 200);
        

    }

    public function delete($id_users){
        User::where('id', $id_users)->delete();
        return response()->json([
            'message' => 'Data berhasil di Hapus',
        ], 200);

    }
    

}
