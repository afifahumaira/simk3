<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\P2k3;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departemen;
use App\Models\Inventory;
use App\Models\Investigasi;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;
use App\Models\VwInventory;
use Illuminate\Support\Facades\Hash;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class P2k3Controller extends Controller
{
    public function index(Request $request) {
        $datas = P2k3::with(['user', 'departemen'])
        ->when (auth()->user()->hak_akses=='K3 Departemen', function ($query){
            $query->where('departemen_id', auth()->user()->departemen_id);
        })
        ->paginate(10);
        return view('dashboard.users.P2k3.index', compact('datas'));
    }

    public function tambah() {
        $departemen = Departemen::all();
        return view('dashboard.users.P2k3.tambah-p2k3', compact('departemen'));
    }

    public function simpan(Request $request) {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'jabatan' => 'required',
            'departemen_id' => 'required',
            'gambar' => 'required',
        ]);

        if ($data) {
            $berkas = $request->file('gambar');
            $nama_berkas = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'berkas';
            $berkas->move($tujuan_upload,$nama_berkas);
            $data['avatar'] = $nama_berkas;
            $data['hak_akses'] = 'p2k3';
            $data['password'] = Hash::make('password');
            $data['name'] = $request->nama;
            $success = User::create($data);
            if ($success) {
                $data2 = $request->all();
                $data2['avatar'] = $nama_berkas;
                $data2['user_id'] = $success->id;
                $berhasil = P2k3::create($data2);
                if($berhasil) {
                    Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
                    return redirect()->route('p2k3.index');
                }
            }

        }
    }

    public function edit($id) {
        $data = P2k3::find($id);
        $departemen = Departemen::all();
        return view('dashboard.users.P2k3.edit-p2k3', compact('data', 'departemen'));
    }

    public function update(Request $request, $id) {
        $db = P2k3::find($id);
        if($request->hasFile('gambar')){
            $data = $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'jabatan' => 'required',
                'departemen_id' => 'required',
                'gambar' => 'required',
            ]);
            $input =$request->except(['email', '_token', 'gambar']);
            $berkas = $request->file('gambar');
            $nama_berkas = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'berkas';
            $berkas->move($tujuan_upload,$nama_berkas);
            $input['avatar'] = $nama_berkas;
            $success = P2k3::where('id', $id)->whereNull('deleted_at')->update($input);
            if($success) {
                $input2 = $request->only(['email']);
                $input2['avatar'] = $nama_berkas;
                $input2['name'] = $request->nama;
                $user_id = $db->user_id;
                User::where('id', $user_id)->whereNull('deleted_at')->update($input2);
                Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
                return redirect()->route('p2k3.index');
            }

        } else {
            $data = $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'jabatan' => 'required',
                'departemen_id' => 'required',
            ]);
            $input =$request->except(['email', '_token']);
            P2k3::where('id', $id)->whereNull('deleted_at')->update($input);
            $user_id = $db->user_id;
            $input2['email']= $request->email;
            $input2['name'] = $request->nama;
            User::where('id', $user_id)->whereNull('deleted_at')->update($input2);
            Alert::success('Berhasil', 'Data Berhasil Diperbarui!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('p2k3.index');
        }
    }

    public function lihat($id) {
        $data = P2k3::find($id);
        $departemen = Departemen::findorFail($id);
        return view('dashboard.users.P2k3.lihat-p2k3', compact('data', 'departemen'));
    }

    public function hapus($id) {
        P2k3::find($id)->delete();
        return redirect('/users/p2k3');
    }

}
