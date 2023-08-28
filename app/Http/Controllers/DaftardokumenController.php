<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaftardokumenController extends Controller
{
    public function index() {
        $datas = Dokumen::all();
        $index = 0;
// dd($datas);
        return view('dashboard.daftardokumen.index', [
            'datas' => $datas,
            'index' => $index,
        ]);
    }
  
    public function ubah($id) {
        $data = Dokumen::find($id);
        return view('dashboard.daftardokumen.edit-dokumen', [
            'data' => $data,
        ]);
    }

    // ini belum upload pdf
    public function ubahstore($id, Request $request){
        $db = Dokumen::find($id);
        if($request->hasFile('file')){
            $data = $request->validate([
                'nama_file' => 'required',
                'file' => 'required',
               
            ]);

            $input =$request->except([ 'file']);
            $berkas = $request->file('file');
            $nama_berkas = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'berkas';
            $berkas->move($tujuan_upload,$nama_berkas);
            $input['file'] = $nama_berkas;
            $success = Dokumen::where('id', $id)->whereNull('created_at')->update($input);
            if($success) {
                
                $input2['file'] = $nama_berkas;
                $input2['nama_file'] = $request->nama_file;
                //$user_id = $db->user_id;
                //User::where('id', $user_id)->whereNull('deleted_at')->update($input2);
                Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
                return redirect()->route('/daftardokumen');
            }

        } else {
            $data = $request->validate([
                'nama' => 'required',
                'email' => 'required',
                'jabatan' => 'required',
                'departemen' => 'required',
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
    //     Dokumen::find($id)->update([
    //         'name_file' => $request->name_file,
    //     ]);
    //     return redirect('/daftardokumen');
    // }

    public function tambah() {
        return view('dashboard.daftardokumen.tambah-dokumen');
    }

// ini belom upload pdf
public function tambahdokumen(Request $request) {
    $data = $request->validate([
        'nama_file' => 'required',
        'file' => 'required',
    ]);

    if ($data) {
            $berkas = $request->file('file');
            $nama_file = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'berkas';
            $berkas->move($tujuan_upload,$nama_file);
            $data['file'] = $nama_file;
            $data['nama_file'] = $request->nama;
            $success = Dokumen::create($data);
            if ($success) {
                $data2 = $request->all();
                $data2['file'] = $nama_file;
                //$data2['user_id'] = $success->id;
                $berhasil = Dokumen::create($data2);
                if($berhasil) {
                    Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
                    return redirect()->route('/daftardokumen');
                }
            }
        }
    }

    public function destroy($id){
        Dokumen::find($id)->delete();
        return redirect('/daftardokumen');
    }

}
