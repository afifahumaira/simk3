<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Apar;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Investigasi;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;
use App\Models\Inventory;
use Hash;
use Validator;
use Alert;


class AparController extends Controller
{
    public function index(Request $request){
        if($request->search){
            $inventory = Inventory::Where('name','LIKE','%'.$request->search.'%')
            ->orWhere('kondisi','LIKE','%'.$request->search.'%')
            ->where('tipe', "APAR")
            ->paginate(10);
        } else {
            $inventory = Inventory::where('tipe', "APAR")
            ->paginate(10);
        }

        return view('dashboard.inventory.apar.index')-> with('inventory',$inventory);
    }

    public function tambah() {

        return view('dashboard.inventory.apar.tambah-apar');
    }

    public function edit($id) {
        $data = Inventory::where('id',$id)->whereNull('deleted_at')->first();
        return view('dashboard.inventory.apar.edit-apar', compact('data'));
    }

    public function lihat($id) {
        $data = Inventory::where('id',$id)->whereNull('deleted_at')->first();
        return view('dashboard.inventory.apar.lihat-apar', compact('data'));
    }


    public function insert(Request $request){

        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'tipe' => 'required',
            'departemen_id' => 'required',
            'lokasi' => 'required',
            'berat' => 'required',
            'tanggal_kadaluwarsa' => 'required',
            'kondisi' => 'required',
            'gambar' => 'required',
        ]);

        if ($data) {
            $berkas = $request->file('gambar');
            $nama_berkas = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'berkas';
            $berkas->move($tujuan_upload,$nama_berkas);
            $data['gambar'] = $nama_berkas;
            $data['id_benda'] = 0;
            // dd($data);
            $success = Inventory::create($data);
            if($success) {
                Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
                return redirect()->route('apar.index');
            }
        }
    }


    public function update($id, Request $request){
        // dd($id);

        if($request->hasFile('gambar')){
            $data = $request->validate([
                'name' => 'required',
                'tipe' => 'required',
                'departemen_id' => 'required',
                'lokasi' => 'required',
                'berat' => 'required',
                'tanggal_kadaluwarsa' => 'required',
                'kondisi' => 'required',
                'gambar' => 'required',
            ]);
            $berkas = $request->file('gambar');
            $nama_berkas = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'berkas';
            $berkas->move($tujuan_upload,$nama_berkas);
            $data['gambar'] = $nama_berkas;
            Inventory::where('id', $id)->whereNull('deleted_at')->update($data);
            Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('apar.index');
        } else {
            $data = $request->validate([
                'name' => 'required',
                'tipe' => 'required',
                'departemen_id' => 'required',
                'lokasi' => 'required',
                'berat' => 'required',
                'tanggal_kadaluwarsa' => 'required',
                'kondisi' => 'required',
            ]);
            Inventory::where('id', $id)->whereNull('deleted_at')->update($data);
            Alert::success('Berhasil', 'Data Berhasil Diperbarui!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('apar.index');
        }

    }

    public function delete($id){
        Inventory::where('id', $id)->delete();
        Alert::success('Berhasil', 'Data berhasil Dihapus!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('apar.index');

    }
}
