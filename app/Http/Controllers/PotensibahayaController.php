<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Investigasi;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;
use App\Models\VwInventory;
use App\Models\VwPotensiBahaya;

use Google\Cloud\Storage\Connection\Rest;
use Hash;
use Validator;
use Alert;
use App\Models\Departemen;
use App\Models\InvestigasiPotensi;
use App\Models\P2k3;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PotensibahayaController extends Controller
{
    public function index(Request $request){
        
        $datas = PotensiBahaya:: with(['p2k3', 'departemen'])
        ->whereNot('status', '2')
        ->when($request->has('filter'), function($query) use($request){
            if($request->filter !=''){
             $query->where('status', $request->filter);
            }
         })
        ->when (auth()->user()->hak_akses=='K3 Departemen', function ($query){
            $query->where('departemen_id', auth()->user()->departemen_id);
        })
        ->where(function($query) use($request){        
            $query-> where('nama_pelapor', 'LIKE', '%'.$request->search.'%')
            ->orWhere('lokasi', 'LIKE', '%'.$request->search.'%')
            ->orWhere('waktu_kejadian', 'LIKE', '%'.$request->search.'%');
    })
        ->paginate(10);
        
        return view('dashboard.potensibahaya.index', compact('datas'));
        
    }

    public function k3dep(Request $request){
        
        $datas = PotensiBahaya:: with(['p2k3', 'departemen'])
        ->whereNot('status', '2')
        ->when($request->has('filter'), function($query) use($request){
            if($request->filter !=''){
             $query->where('status', $request->filter);
            }
         })
        // ->when (auth()->user()->hak_akses=='K3 Departemen', function ($query){
        //     $query->where('departemen_id', auth()->user()->departemen_id);
        // })
        ->where(function($query) use($request){        
            $query-> where('nama_pelapor', 'LIKE', '%'.$request->search.'%')
            ->orWhere('lokasi', 'LIKE', '%'.$request->search.'%')
            ->orWhere('waktu_kejadian', 'LIKE', '%'.$request->search.'%');
    })
        ->paginate(10);
        
        return view('dashboard.potensibahaya.k3view', compact('datas'));
        
    }

    public function tambah() {
        $kode= PotensiBahaya::generateCode();
        $departemen = Departemen::all();
        return view('dashboard.potensibahaya.tambah-potensibahaya', compact('kode', 'departemen'));
    }

    public function tambahdata(Request $request) {

        $request->validate([
            'nama_pelapor' => 'required',
            'email_pelapor' => 'required',
            'nip_nim' => 'required',
            'nomer_telepon_pelapor' => 'required',
            'waktu_kejadian' => 'required',
            'institusi' => 'required',
            'tujuan' => 'required',
            'departemen_id' => 'required',
            'lokasi' => 'required',
            'deskripsi_potensi_bahaya' => 'required',
            'resiko_bahaya' => 'required',
            'usulan_perbaikan' => 'required',
            'tanda_pengenal' => 'required|image',
            'gambar' => 'required|image'
        ]);

        $gambar = $request->file('gambar');
        // Generate a unique filename using the current timestamp
        $gambarName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
        // Store the file in the desired folder
        $gambar->storeAs('public/potensi_bahaya/gambarkejadian', $gambarName);

        $pengenalName = '';
        if($request->hasFile('tanda_pengenal')) {
            $pengenal = $request->file('tanda_pengenal');
            // Generate a unique filename using the current timestamp
            $pengenalName = time() . '_' . Str::random(10) . '.' . $pengenal->getClientOriginalExtension();
            // Store the file in the desired folder
            $pengenal->storeAs('public/potensi_bahaya/tanda_pengenal', $pengenalName);
        } else {
            $pengenalName = '';
        }

        PotensiBahaya::create([
            'user_id' => auth()->user()->id,
            'kode_potensibahaya' => $request->kode_potensibahaya,
            'nama_pelapor' => $request->nama_pelapor,
            'email_pelapor' => $request->email_pelapor,
            'nip_nim' => $request->nip_nim,
            'nomer_telepon_pelapor' => $request->nomer_telepon_pelapor,
            'waktu_kejadian' => $request->waktu_kejadian,
            'kategori_pelapor' => $request->kategori_pelapor,
            'institusi' => $request->institusi,
            'tujuan' => $request->tujuan,
            'departemen_id' => $request->departemen_id,
            'unit_civitas_akademika_box' => $request->unit_civitas_akademika_box,
            'lokasi' => $request->lokasi,
            'potensi_bahaya' => $request->potensi_bahaya,
            'deskripsi_potensi_bahaya' => $request->deskripsi_potensi_bahaya,
            'resiko_bahaya' => $request->resiko_bahaya,
            'usulan_perbaikan' => $request->usulan_perbaikan,
            'tanda_pengenal' => $pengenalName,
            'status' => 1,
            'gambar' => $gambarName
        ]);

        Alert::success('Berhasil', 'Data Potensi Bahaya berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('potensibahaya.index');
    }

    public function lihat($id) {
        $data = PotensiBahaya::where('id',$id)->first();
        $departemen = Departemen::where('id', $id)->first();
        $potensibahayas=DB::table('potensibahayas')
        ->leftJoin('p2k3s', 'p2k3s.id', '=', 'potensibahayas.p2k3_id')
        ->select(            
            'p2k3s.nama as p2k3_nama'
        );
        return view('dashboard.potensibahaya.lihat-potensibahaya', compact('data', 'departemen'))
        -> with('potensibahaya', $potensibahayas);
    }

    public function melihat($id) {
        $data = PotensiBahaya::where('id',$id)->first();
        $departemen = Departemen::where('id', $id)->first();
        $potensibahayas=DB::table('potensibahayas')
        ->leftJoin('p2k3s', 'p2k3s.id', '=', 'potensibahayas.p2k3_id')
        ->select(            
            'p2k3s.nama as p2k3_nama'
        );
        return view('dashboard.potensibahaya.lihat-k3view', compact('data', 'departemen'))
        -> with('potensibahaya', $potensibahayas);
    }

    public function delete($id){
        $data = Potensibahaya::find($id)->delete();

        Alert::success('Berhasil', 'Data Potensi Bahaya berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('potensibahaya.index');
    }

    public function edit($id) {
        $data = PotensiBahaya::find($id);
        $p2k3s = P2k3::all();
        $departemen = Departemen::all();
        return view('dashboard.potensibahaya.edit-potensibahaya', compact('data', 'p2k3s', 'departemen'));
            
        
    }

    public function editstore($id, Request $request){

        $request->validate([
            'p2k3_id' => 'required',
            'nama_pelapor' => 'required',
            'email_pelapor' => 'required',
            'nip_nim' => 'required',
            'nomer_telepon_pelapor' => 'required',
            'waktu_kejadian' => 'required',
            'institusi' => 'required',
            'tujuan' => 'required',
            'departemen_id' => 'required',
            'lokasi' => 'required',
            'deskripsi_potensi_bahaya' => 'required',
            'resiko_bahaya' => 'required',
            'usulan_perbaikan' => 'required',
        ]);

        $gambarName = '';
        if($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            // Generate a unique filename using the current timestamp
            $gambarName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
            // Store the file in the desired folder
            $gambar->storeAs('public/potensi_bahaya/gambarkejadian', $gambarName);
        } else {
            $gambarName = $request->gambar_old;
        }

        $pengenalName = '';
        if($request->hasFile('tanda_pengenal')) {
            $pengenal = $request->file('tanda_pengenal');
            // Generate a unique filename using the current timestamp
            $pengenalName = time() . '_' . Str::random(10) . '.' . $pengenal->getClientOriginalExtension();
            // Store the file in the desired folder
            $pengenal->storeAs('public/potensi_bahaya/tanda_pengenal', $pengenalName);
        } else {
            $pengenalName = $request->tanda_pengenal_old;
        }

        PotensiBahaya::find($id)->update([
            'p2k3_id' => $request->p2k3_id,
            'kode_potensibahaya' => $request->kode_potensibahaya,
            'nama_pelapor' => $request->nama_pelapor,
            'email_pelapor' => $request->email_pelapor,
            'nip_nim' => $request->nip_nim,
            'nomer_telepon_pelapor' => $request->nomer_telepon_pelapor,
            'waktu_kejadian' => $request->waktu_kejadian,
            'kategori_pelapor' => $request->kategori_pelapor,
            'institusi' => $request->institusi,
            'tujuan' => $request->tujuan,
            'departemen_id' => $request->departemen_id,
            'unit_civitas_akademika_box' => $request->unit_civitas_akademika_box,
            'lokasi' => $request->lokasi,
            'potensi_bahaya' => $request->potensi_bahaya,
            'deskripsi_potensi_bahaya' => $request->deskripsi_potensi_bahaya,
            'resiko_bahaya' => $request->resiko_bahaya,
            'usulan_perbaikan' => $request->usulan_perbaikan,
            'tanda_pengenal' => $pengenalName,
            'status' => $request->status,
            'gambar' => $gambarName
        ]);

        if($request->status == 2 ) {
            $data = InvestigasiPotensi::create([
                'p2k3' => $request->p2k3_id,
                'potensibahaya_id' => $request->id,
                'departemen_id' => $request->departemen_id,
                'lokasi' => $request->lokasi,
                'potensi_bahaya' => $request->potensi_bahaya,
                'risiko' => $request->resiko_bahaya,
                'usulan' => $request->usulan_perbaikan,
            ]);
            Alert::success('Berhasil', 'Data Akan di Investigasi!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('potensibahaya.index');
        }
        elseif ($request->status == 3) {
            $data = PotensiBahaya::find($id);
            $data->delete();

        Alert::success('Berhasil', 'Data Telah Ditangani')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('potensibahaya.index');
        }
        Alert::success('Berhasil', 'Data Potensi Bahaya berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('potensibahaya.index');
    }

    public function potensibahaya() {
        $kode= PotensiBahaya::generateCode();
        return view('Frntend_simk3.potensibahayas', compact('kode'));
    }

    public function simpan(Request $request) {

        $request->validate([
            'nama_pelapor' => 'required',
            'email_pelapor' => 'required',
            'nip_nim' => 'required',
            'nomer_telepon_pelapor' => 'required',
            'waktu_kejadian' => 'required',
            'institusi' => 'required',
            'tujuan' => 'required',
            'lokasi' => 'required',
            'deskripsi_potensi_bahaya' => 'required',
            'resiko_bahaya' => 'required',
            'usulan_perbaikan' => 'required',
            'tanda_pengenal' => 'required|image',
            'gambar' => 'required|image'
        ]);

        $gambar = $request->file('gambar');
        // Generate a unique filename using the current timestamp
        $gambarName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
        // Store the file in the desired folder
        $gambar->storeAs('public/potensi_bahaya/gambarkejadian', $gambarName);

        $pengenalName = '';
        if($request->hasFile('tanda_pengenal')) {
            $pengenal = $request->file('tanda_pengenal');
            // Generate a unique filename using the current timestamp
            $pengenalName = time() . '_' . Str::random(10) . '.' . $pengenal->getClientOriginalExtension();
            // Store the file in the desired folder
            $pengenal->storeAs('public/potensi_bahaya/tanda_pengenal', $pengenalName);
        } else {
            $pengenalName = '';
        }

        PotensiBahaya::create([
            //'user_id' => auth()->user()->id,
            'kode_potensibahaya' => $request->kode_potensibahaya,
            'nama_pelapor' => $request->nama_pelapor,
            'email_pelapor' => $request->email_pelapor,
            'nip_nim' => $request->nip_nim,
            'nomer_telepon_pelapor' => $request->nomer_telepon_pelapor,
            'waktu_kejadian' => $request->waktu_kejadian,
            'kategori_pelapor' => $request->kategori_pelapor,
            'institusi' => $request->institusi,
            'tujuan' => $request->tujuan,
            'unit_civitas_akademika_box' => $request->unit_civitas_akademika_box,
            'lokasi' => $request->lokasi,
            'potensi_bahaya' => $request->potensi_bahaya,
            'deskripsi_potensi_bahaya' => $request->deskripsi_potensi_bahaya,
            'resiko_bahaya' => $request->resiko_bahaya,
            'usulan_perbaikan' => $request->usulan_perbaikan,
            'tanda_pengenal' => $pengenalName,
            'status' => 1,
            'gambar' => $gambarName
        ]);

        Alert::success('Berhasil', 'Data Potensi Bahaya berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('simk3.index');
    }

}
