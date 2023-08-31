<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\P2k3;
use App\Http\Controllers\P2k3Controller;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request) {
        $datas = User::with([ 'p2k3', 'departemen'])
        ->where('name', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
//        dd($datas);
        return view('dashboard.users.user.index', compact('datas'));
    }

    public function hapus($id) {
        User::find($id)->delete();
        return redirect('/user');
    }

    public function edit($id) {
        $data = User::find($id);
        return view('dashboard.users.user.edit-user', compact('data'));
    }

    public function update(Request $request, $id) {
        if($request->hasFile('avatar')){
            $data = $request->validate([
                'hak_akses' => 'required',
                'departemen_id' => 'required',
                'avatar' => 'required',
            ]);
            $berkas = $request->file('avatar');
            $nama_berkas = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'berkas';
            $berkas->move($tujuan_upload,$nama_berkas);
            $data['avatar'] = $nama_berkas;
            User::where('id', $id)->whereNull('deleted_at')->update($data);
            Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('user.index');
        } else {
            $data = $request->validate([
                'hak_akses' => 'required',
                'departemen_id' => 'required',
                'name' => 'required,'
            ]);
            User::where('id', $id)->whereNull('deleted_at')->update($data);
            // if($request->hak_akses == P2K3) {
            //     $data = P2k3::create([
            //         'user_id' => $request->id,
            //         'nama' => $request->name,
            //         //'avatar' => $request->avatar, 
            //     ]);
                
            // }
            Alert::success('Berhasil', 'Data Berhasil Diperbarui!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('user.index');
        }
    }

    public function lihat($id) {
        $data = User::where('id', $id)->first();
        return view('dashboard.users.user.lihat-user', compact('data'));
    }

}
