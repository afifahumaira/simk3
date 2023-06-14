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
use Illuminate\Support\Str;

class PotensibahayaController extends Controller
{
    public function index(){
        $datas = PotensiBahaya::paginate(10);

        return view('dashboard.potensibahaya.index', compact('datas'));
    }

    public function tambah() {
        $kode= PotensiBahaya::generateCode();
        return view('dashboard.potensibahaya.tambah-potensibahaya', compact('kode'));
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
            'unit_civitas_akademika_box' => $request->unit_civitas_akademika_box,
            'lokasi' => $request->lokasi,
            'potensi_bahaya' => $request->potensi_bahaya,
            'deskripsi_potensi_bahaya' => $request->deskripsi_potensi_bahaya,
            'resiko_bahaya' => $request->resiko_bahaya,
            'usulan_perbaikan' => $request->usulan_perbaikan,
            'tanda_pengenal' => $pengenalName,
            'gambar' => $gambarName
        ]);

        Alert::success('Berhasil', 'Data Potensi Bahaya berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('potensibahaya.index');
    }

    public function lihat($id) {
        $data = PotensiBahaya::find($id);
        return view('dashboard.potensibahaya.lihat-potensibahaya', compact('data'));
    }

    public function delete($id){
        $data = Potensibahaya::find($id)->delete();

        Alert::success('Berhasil', 'Data Potensi Bahaya berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('potensibahaya.index');
    }

    public function edit($id) {
        $data = PotensiBahaya::find($id);
        return view('dashboard.potensibahaya.edit-potensibahaya', [
            'data' => $data
        ]);
    }

    public function editstore($id, Request $request){

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
            'gambar' => $gambarName
        ]);

        Alert::success('Berhasil', 'Data Potensi Bahaya berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('potensibahaya.index');
    }

    public function potensibahaya() {
        return view('Frntend_simk3.potensibahayas');
    }
}
