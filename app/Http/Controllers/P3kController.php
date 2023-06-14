<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Investigasi;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;
use App\Models\Inventory;
use Hash;
use Validator;
use Alert;
use App\Models\Departemen;

class P3kController extends Controller
{
    public function index(Request $request){
        if($request->search){
            $datas = Inventory::Where('name','LIKE','%'.$request->search.'%')
            ->orWhere('kondisi','LIKE','%'.$request->search.'%')
            ->where('tipe', "P3K")
            ->paginate(10);
        } else {
            $datas = Inventory::where('tipe', "P3K")
            ->paginate(10);
        }
        return view('dashboard.inventory.p3k.index', compact('datas'));
    }

    public function tambah() {
        $departments = Departemen::all();
        return view('dashboard.inventory.p3k.tambah-p3k')
                ->with('departments', $departments);
    }

    public function edit($id) {
        $data = Inventory::where('id',$id)->whereNull('deleted_at')->first();
        $departments = Departemen::all();
        return view('dashboard.inventory.p3k.edit-p3k', compact('data', 'departments'));
    }

    public function lihat($id) {
        $data = Inventory::where('id',$id)->whereNull('deleted_at')->first();
        return view('dashboard.inventory.p3k.lihat-p3k', compact('data'));
    }

    public function detail($id_inventory){
        $inventory = Inventory::where('id_inventory', $id_inventory)->first();

        return response()->json([
            'message' => 'success',
            'data' => $inventory,
        ], 200);
    }


    public function insert(Request $request){

        // dd($request);
        $data = $request->validate([
            'name' => 'required',
            'tipe' => 'required',
            'departemen_id' => 'required',
            'lokasi' => 'required',
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
            $data['berat'] =0;
            // dd($data);
            $success = Inventory::create($data);
            if($success) {
                Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('p3k.tambah');
            }
        }
    }


    public function update($id, Request $request){

        if($request->hasFile('gambar')){
            $data = $request->validate([
                'name' => 'required',
                'tipe' => 'required',
                'departemen_id' => 'required',
                'lokasi' => 'required',
                'tanggal_kadaluwarsa' => 'required',
                'kondisi' => 'required',
                'gambar' => 'required',
            ]);
            $data['berat'] = 0;
            $berkas = $request->file('gambar');
            $nama_berkas = time()."_".$berkas->getClientOriginalName();
            $tujuan_upload = 'berkas';
            $berkas->move($tujuan_upload,$nama_berkas);
            $data['gambar'] = $nama_berkas;
            Inventory::where('id', $id)->whereNull('deleted_at')->update($data);
            Alert::success('Berhasil', 'Data berhasil disimpan!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('p3k.index');
        } else {
            $data = $request->validate([
                'name' => 'required',
                'tipe' => 'required',
                'departemen_id' => 'required',
                'lokasi' => 'required',
                'tanggal_kadaluwarsa' => 'required',
                'kondisi' => 'required',
            ]);
            $data['berat'] = 0;
            Inventory::where('id', $id)->whereNull('deleted_at')->update($data);
            Alert::success('Berhasil', 'Data Berhasil Diperbarui!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('p3k.index');
        }
    }

    public function delete($id){
        Inventory::where('id', $id)->delete();
        Alert::success('Berhasil', 'Data berhasil Dihapus!')->iconHtml('<i class="bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('p3k.index');

    }
}
