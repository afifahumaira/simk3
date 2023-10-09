<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\P2k3;
use App\Models\Departemen;
use App\Http\Controllers\P2k3Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Validator;
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
        $departemen = Departemen::all();
        return view('dashboard.users.user.edit-user', compact('data', 'departemen'));
    }

    public function update(Request $request, $id) {
        
            $request->validate([
                //dd($request->all()),
                'hak_akses' => 'required',
                'departemen_id' => 'required',
                'name' => 'required',
                
            ]);
            User::where('id', $id)->update([
                'hak_akses' => $request->hak_akses,
                'departemen_id' =>$request->departemen_id,
                'name' => $request->name,
            ]);

            if($request->hak_akses == "P2K3") {
                $data = P2k3::create([
                    'user_id' => $request->id,
                    'nama' => $request->name,                    
                    //'avatar' => $request->avatar, 
                ]);
               
            }
            Alert::success('Berhasil', 'Data Berhasil Diperbarui!')->iconHtml('<i class="bi-person-check fs-3x"></i>')->hideCloseButton();
            return redirect()->route('user.index');
        
    }

    public function lihat($id) {
        $data = User::where('id', $id)->first();
        return view('dashboard.users.user.lihat-user', compact('data'));
    }

}
