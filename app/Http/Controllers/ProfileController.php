<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\User;
use App\Models\P2k3;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{

    public function index() {
        return view('dashboard.profile');
    }

    public function edit(Request $request){
        $data = User::find($request->id);
        $validatedData = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'reuqired'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $succes = $data->update($validatedData);
        if($succes){
            Alert::success('Berhasil', 'Data Pengguna Berhasil Diperbarui')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
            return redirect()->route('dashboard');
        }
        Alert::error('Gagal', 'Periksa Kembali Data Anda!')->iconHtml('<i class="bi bi-cross fs-3x"></i>')->hideCloseButton();
        return redirect()->route('/');

    }
}
