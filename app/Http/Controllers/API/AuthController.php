<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Validator;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Password tidak sesuai'
            ], 401);
        }

        $token = $user->createToken('token-name')->plainTextToken;

        return response()->json([
            'message' => 'success',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    public function register(Request $request){
        
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:8|confirmed'
        ]);

        
        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'hak_akses'  => 'pengguna',
            'password'  => bcrypt($request->password)
        ]);

        return response()->json([
            'message' => 'Data berhasil Di tambahakan',
            'data' => $user
        ], 200);

    }
    

    public function lengkapi_profile($id, Request $request){
        $request->validate([
            'name'      => 'required',
            'email'      => 'required',
            'id_department' => 'required',
            'no_telp'      => 'required',
            'jabatan'  => 'required',
        ]);


        $data = [
            'name' => $request->name,
            'email' => $request->name,
            'id_department' => $request->id_department,
            'no_telp' => $request->no_telp,
            'jabatan' => $request->jabatan,
        ];

        User::where('id', $id)->update($data);
        
        return response()->json([
            'message' => 'Data berhasil di ubah',
        ], 200);

    }
}
