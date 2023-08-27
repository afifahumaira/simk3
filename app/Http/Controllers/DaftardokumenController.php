<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        Dokumen::find($id)->update([
            'name_file' => $request->name_file,
        ]);
        return redirect('/daftardokumen');
    }

    public function tambah() {
        return view('dashboard.daftardokumen.tambah-dokumen');
    }

// ini belom upload pdf
    public function tambahdokumen(Request $request) {
        Dokumen::create([
            'name_file' => $request->name_file,
            'file' => 'test'
        ]);
        return redirect('/daftardokumen');
    }

    public function destroy($id){
        Dokumen::find($id)->delete();
        return redirect('/daftardokumen');
    }

}
