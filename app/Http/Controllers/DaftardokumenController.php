<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
class DaftardokumenController extends Controller
{
    public function index(Request $request) {
        $datas = Dokumen::where('name_file', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);
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
        // dd($request);
        if($request->file){
            $data = $request->validate([
                'name_file' => 'required',
                'file' => 'required',
            ]);
            if($db->file != null) {
                $done = unlink(public_path().'/berkas/'.$db->file);
                $file = $request->file('file');
                $ext = $request->file('file')->getClientOriginalExtension();
                $filename = ($request->name_file.".".$ext);
                $file->move('berkas', $filename);
                $data['file'] = $filename;
                $success = Dokumen::where('id', $id)->update($data);
                if($success) {
                    Alert::success('Berhasil', 'Data berhasil Diperbarui!')->iconHtml('<i class="bi-person-check fs-3x"></i>')->hideCloseButton();
                    return redirect()->route('daftardokumen.index');
                }
            } else {
                $file = $request->file('file');
                $ext = $request->file('file')->getClientOriginalExtension();
                $filename = ($request->name_file.".".$ext);
                $file->move('berkas', $filename);
                $data['file'] = $filename;
                $success = Dokumen::where('id', $id)->update($data);
                if($success) {
                    Alert::success('Berhasil', 'Data berhasil Diperbarui!')->iconHtml('<i class="bi-person-check fs-3x"></i>')->hideCloseButton();
                    return redirect()->route('daftardokumen.index');
                }
            }
        } else {
            $data = $request->validate([
                'name_file' => 'required',
            ]);
            // dd($data);
            $success = Dokumen::where('id', $id)->update($data);
            Alert::success('Berhasil', 'Data Berhasil Diperbarui!')->iconHtml('<i class="bi-person-check fs-3x "></i>')->hideCloseButton();
            return redirect()->route('daftardokumen.index');
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
        $validatedData = $request->validate([
            'name_file' => 'required',
            'file' => 'required',
        ]);
        $file = $request->file('file');
        $ext = $request->file('file')->getClientOriginalExtension();
        $filename = ($request->name_file.".".$ext);
        $file->move('berkas', $filename);
        $validatedData['file'] = $filename;
        $save = Dokumen::create($validatedData);
        if($save) {
            Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check fs-3x"></i>')->hideCloseButton();
            return redirect()->route('daftardokumen.index');
        }

    }

    // public function tambahdokumen(Request $request) {
    //     // dd($request);
    //     $data = $request->validate([
    //         'name_file' => 'required',
    //         'file' => 'required',
    //     ]);

    //     if ($data) {
    //         dd("berhasil");
    //             $berkas = $request->file('file');
    //             $nama_file = time()."_".$berkas->getClientOriginalName();
    //             $tujuan_upload = 'berkas';
    //             $berkas->move($tujuan_upload,$nama_file);
    //             $data['file'] = $nama_file;
    //             $data['nama_file'] = $request->nama;
    //             $success = Dokumen::create($data);
    //             // dd($success);
    //             if($success) {
    //                         Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
    //                         return redirect()->route('/daftardokumen');
    //                     }
    //             // if ($success) {
    //             //     $data2 = $request->all();
    //             //     $data2['file'] = $nama_file;
    //             //     //$data2['user_id'] = $success->id;
    //             //     $berhasil = Dokumen::create($data2);
    //             //     if($berhasil) {
    //             //         Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
    //             //         return redirect()->route('/daftardokumen');
    //             //     }
    //             // }
    //         }
    // }

    public function destroy($id){
        $db = Dokumen::find($id);
        if($db->file != null) {
            $done = unlink(public_path().'/berkas/'.$db->file);
            $done = Dokumen::find($id)->delete();
            if ($done) {
                Alert::success('Berhasil', 'Data berhasil Dihapus!')->iconHtml('<i class="bi-person-check fs-3x"></i>')->hideCloseButton();
                return redirect('/daftardokumen');
            }
        } else {
            $done = Dokumen::find($id)->delete();
            if ($done) {
                Alert::success('Berhasil', 'Data berhasil Dihapus!')->iconHtml('<i class="bi-person-check fs-3x"></i>')->hideCloseButton();
                return redirect('/daftardokumen');
            }
        }
    }

}
