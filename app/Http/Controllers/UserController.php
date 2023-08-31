<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\P2k3;
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'hak_aksesk' => 'required',
            'departemen_id' => 'required',
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'hak_akses' => $request->hak_akses,
            'departemen_id' => $request->departemen
        ]);
            if($request->hak_akses == 4) {
                $data = P2k3::create([
                    'user_id' => $request->id,
                    'nama' => $request->name,
                    //'avatar' => $request->avatar, 
                ]);
            }
            Alert::success('Berhasil', 'Data Berhasil Diperbarui!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('user.index');
        
    }

    public function lihat($id) {
        $data = User::where('id', $id)->first();
        return view('dashboard.users.user.lihat-user', compact('data'));
    }

}
