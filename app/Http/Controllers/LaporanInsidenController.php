<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Departemen;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Investigasi;
use App\Models\LaporanInsiden;
use App\Models\PotensiBahaya;
use App\Models\VwInventory;
use App\Models\Laporinsiden;
use Hash;
use Validator;
Use Alert;
use Auth;
use App\Models\P2k3;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LaporanInsidenController extends Controller
{
    public function index(Request $request){
        $p2k3s = P2k3::all();
        $laporaninsidens = Laporinsiden::with(['p2k3', 'departemen'])
        // ->whereNot('status', '2')
        ->when($request->has('filter'), function($query) use($request){
           if($request->filter !=''){
            $query->where('status', $request->filter);
           }
        })
        ->when (auth()->user()->hak_akses=='K3 Departemen', function ($query){
            $query->where('departemen_id', auth()->user()->departemen_id);
        })
            ->where(function($query) use($request){
                $searchTerm = $request->search;
            // Use a subquery to filter based on department name
            $query->whereHas('departemen', function ($subquery) use ($searchTerm) {
            $subquery->where('name', 'LIKE', '%' . $searchTerm . '%');
            })
                ->orWhere('lokasi_rinci', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_pelapor', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_korban', 'LIKE', '%'.$request->search.'%');
            }); 

            if ($request->has('sort') && $request->has('order')) {
                $laporaninsidens->orderBy($request->sort, $request->order);
            };
            $laporaninsidens = $laporaninsidens
            ->paginate(10);
        return view('dashboard.laporaninsiden.index')
            ->with('laporaninsidens',$laporaninsidens)
            ->with('p2k3s', $p2k3s);
    }

    public function k3dep(Request $request){
        
        $laporaninsidens = Laporinsiden::with(['p2k3', 'departemen'])
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
                $query->where('kode_laporinsiden', 'LIKE', '%'.$request->search.'%')
                ->orWhere('lokasi_rinci', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_pelapor', 'LIKE', '%'.$request->search.'%')
                ->orWhere('nama_korban', 'LIKE', '%'.$request->search.'%');
            }); 
            
            if ($request->has('sort') && $request->has('order')) {
                $laporaninsidens->orderBy($request->sort, $request->order);
            };
            $laporaninsidens = $laporaninsidens
            ->paginate(10);
        return view('dashboard.laporaninsiden.k3view')
            ->with('laporaninsidens',$laporaninsidens);
    }

    public function tambah() {
        $departments = Departemen::all();
        $kode = Laporinsiden::generateCode();

        return view('dashboard.laporaninsiden.tambahinsiden')
                ->with('kode', $kode)
                ->with('departments', $departments);
    }

    public function lihat($id) {
        $lap = Laporinsiden::with(['p2k3'])->find($id);
        
        return view('dashboard.laporaninsiden.lihat-insiden', compact('lap'));
    }

    public function melihat($id) {
        $lap = Laporinsiden::with(['p2k3'])->find($id);
        
        return view('dashboard.laporaninsiden.lihat-k3view', compact('lap'));
    }

    public function ubah($id) {
        $departments = Departemen::all();
        $lap = Laporinsiden::findOrFail($id);

        $p2k3s = P2k3::all();
        return view('dashboard.laporaninsiden.edit-insiden', compact('lap', 'departments', 'p2k3s'));
    }

    

    public function insert(Request $request) {
        $request->validate([
            'kode_laporinsiden' => 'required',
            'waktu_kejadian' => 'required',
            'departemen_id' => 'required',
            'lokasi_rinci' => 'required',
            'jenis_insiden' => 'required',
            'kronologi' => 'required',
            'penyebab_insiden' => 'required',
            'nama_pelapor' => 'required',
            'email_pelapor' => 'required',
            'nomer_telepon_pelapor' => 'required',
            //'unit_pelapor' => 'required',
            'gambar' => 'required',
            'tanda_pengenal' => 'required',
        ]);

        $gambar = $request->file('gambar');
        // Generate a unique filename using the current timestamp
        $gambarName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
        // Store the file in the desired folder
        $gambar->storeAs('public/laporan_insiden/gambarkejadian', $gambarName);

        $pengenalName = '';
        if($request->hasFile('tanda_pengenal')) {
            $pengenal = $request->file('tanda_pengenal');
            // Generate a unique filename using the current timestamp
            $pengenalName = time() . '_' . Str::random(10) . '.' . $pengenal->getClientOriginalExtension();
            // Store the file in the desired folder
            $pengenal->storeAs('public/laporan_insiden/tanda_pengenal', $pengenalName);
        } else {
            $pengenalName = '';
        }

        Laporinsiden::create([
            'user_id' => auth()->user()->id,
            'kode_laporinsiden' => $request->kode_laporinsiden,
            'tanda_pengenal' => $pengenalName,
            'waktu_kejadian' => $request->waktu_kejadian,
            'departemen_id' => $request->departemen_id,
            'lokasi_rinci' => $request->lokasi_rinci,
            'jenis_insiden' => $request->jenis_insiden,
            // 'jenis_insiden_box' => $request->jenis_insiden_box,
            'kronologi' => $request->kronologi,
            'penyebab_insiden' => $request->penyebab_insiden,
            // 'penyebab_insiden_box' => $request->penyebab_insiden_box,
            'nama_pelapor' => $request->nama_pelapor,
            'email_pelapor' => $request->email_pelapor,
            'nomer_telepon_pelapor' => $request->nomer_telepon_pelapor,
            //'unit_pelapor' => $request->unit_pelapor,
            'nama_korban' => $request->nama_korban,
            'email_korban' => $request->email_korban,
            'nomer_telepon_korban' => $request->nomer_telepon_korban,
           // 'unit_korban' => $request->unit_korban,
            'status' => 1,
            'gambar' => $gambarName,
        ]);

        Alert::success('Berhasil', 'Data Laporan Insiden berhasil disimpan!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('laporan-insiden.index');
    }

    public function update($id, Request $request) {
        $request->validate([
            
            'p2k3_id' => 'required',
            'kode_laporinsiden' => 'required',
            'waktu_kejadian' => 'required',
            'departemen_id' => 'required',
            'lokasi_rinci' => 'required',
            'jenis_insiden' => 'required',
            'kronologi' => 'required',
            'penyebab_insiden' => 'required',
            'nama_pelapor' => 'required',
            'email_pelapor' => 'required',
            'nomer_telepon_pelapor' => 'required',
            //'unit_pelapor' => 'required',
        ]);
       
        $gambarName = '';
        if($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            // Generate a unique filename using the current timestamp
            $gambarName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
            // Store the file in the desired folder
            $gambar->storeAs('public/laporan_insiden/gambarkejadian', $gambarName);
        } else {
            $gambarName = $request->gambar_old;
        }

        $pengenalName = '';
        if($request->hasFile('tanda_pengenal')) {
            $pengenal = $request->file('tanda_pengenal');
            // Generate a unique filename using the current timestamp
            $pengenalName = time() . '_' . Str::random(10) . '.' . $pengenal->getClientOriginalExtension();
            // Store the file in the desired folder
            $pengenal->storeAs('public/laporan_insiden/tanda_pengenal', $pengenalName);
        } else {
            $pengenalName = $request->tanda_pengenal_old;
        }
        
        
        Laporinsiden::find($id)->update([
            
            'p2k3_id' => $request->p2k3_id,
            'kode_laporinsiden' => $request->kode_laporinsiden,
            'tanda_pengenal' => $pengenalName,
            'waktu_kejadian' => $request->waktu_kejadian,
            'departemen_id' => $request->departemen_id,
            'lokasi_rinci' => $request->lokasi_rinci,
            'jenis_insiden' => $request->jenis_insiden,
            // 'jenis_insiden_box' => $request->jenis_insiden_box,
            'kronologi' => $request->kronologi,
            'penyebab_insiden' => $request->penyebab_insiden,
            // 'penyebab_insiden_box' => $request->penyebab_insiden_box,
            'nama_pelapor' => $request->nama_pelapor,
            'email_pelapor' => $request->email_pelapor,
            'nomer_telepon_pelapor' => $request->nomer_telepon_pelapor,
            //'unit_pelapor' => $request->unit_pelapor,
            'nama_korban' => $request->nama_korban,
            'email_korban' => $request->email_korban,
            'nomer_telepon_korban' => $request->nomer_telepon_korban,
            //'unit_korban' => $request->unit_korban,
            'status' => $request->status,
            'gambar' => $gambarName,
        ]);

        if ($request->status == 2) {
            $data = Investigasi::create([
                'p2k3_id' => $request->p2k3_id,
                'laporinsiden_id' => $request->kode_laporinsiden,
                'departemen_id' => $request->departemen_id,
                'lokasi' => $request->lokasi_rinci,
                'kategori' => $request->jenis_insiden,
                'penyebab_dasar' =>$request->penyebab_insiden,
                'status' => $request->status                
            ]);      
            Alert::success('Berhasil', 'Data Laporan Insiden berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
            return redirect()->route('daftarinvestigasi.index'); 

            // if ($data) {
            //     $inves = Laporinsiden::find($id);
            //     $inves->delete();
            // }
        }
        // elseif ($request->status == 3) {
        //     $data = Laporinsiden::find($id);
        //     $data->delete();
            
        //     Alert::success('Berhasil', 'Data Telah Ditangani')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        //     return redirect()->route('laporan-insiden.index');
        // }

            Alert::success('Berhasil', 'Data Laporan Insiden berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
            return redirect()->route('laporan-insiden.index');
    }

    public function edit( Request $request) {
        // $request->validate([
        //     'p2k3_id' => 'required',
        //     'status' => 'required',
        // ]);
        //    dd($request);
        Laporinsiden::find($request->id)->update([
            'p2k3_id' => $request->p2k3_id,
            'status' => $request->status,
            'id' => $request->id,
            'kode_laporinsiden' => $request->kode_laporinsiden,
            'departemen_id' => $request->departemen_id,
            'lokasi_rinci' => $request->lokasi_rinci,
            'penyebab_insiden' => $request->penyebab_insiden,
            'jenis_insiden' => $request->jenis_insiden,
        ]);

        if ($request->status == 2) {
            $data = Investigasi::create([
                'p2k3_id' => $request->p2k3_id,                
                'status' => $request->status,
                'laporinsiden_id' => $request->kode_laporinsiden,
                'departemen_id' => $request->departemen_id,
                'lokasi' => $request->lokasi_rinci,
                'kategori' => $request->jenis_insiden,
                'penyebab_dasar' =>$request->penyebab_insiden,                
            ]);      
            Alert::success('Berhasil', 'Data Laporan berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
            return redirect()->route('daftarinvestigasi.index'); 
     
        // }
        // elseif ($request->status == 3) {
        //     $data = Laporinsiden::find($request->id);
        //     $data->delete();
            
        //     Alert::success('Berhasil', 'Investigasi telah selesai')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        //     return redirect()->route('laporan-insiden.index');
        }
        Alert::success('Berhasil', 'Data Laporan berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('laporan-insiden.index');
    }

    public function delete($id) {

        $lap = Laporinsiden::find($id);
        // if (Storage::exists('public/laporan_insiden/gambarkejadian/'. $lap->gambar)) {
        //     Storage::delete('public/laporan_insiden/gambarkejadian/'. $lap->gambar);
        // }
        // if (Storage::exists('public/laporan_insiden/tanda_pengenal/'. $lap->tanda_pengenal)) {
        //     Storage::delete('public/laporan_insiden/tanda_pengenal/'. $lap->tanda_pengenal);
        // }
        $lap->delete();

        Alert::success('Berhasil', 'Data Laporan Insiden berhasil dihapus!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('laporan-insiden.index');
    }

    public function laporaninsiden(){
        $kode = Laporinsiden::generateCode();
        $departments = Departemen::all();        

        return view('Frntend_simk3.laporaninsidens')
                ->with('kode', $kode)
                ->with('departments', $departments);
        
    }

    public function save(Request $request) {
        $request->validate([
            'kode_laporinsiden' => 'required',
            'waktu_kejadian' => 'required',
            'departemen_id' => 'required',
            'lokasi_rinci' => 'required',
            'jenis_insiden' => 'required',
            'kronologi' => 'required',
            'penyebab_insiden' => 'required',
            'nama_pelapor' => 'required',
            'email_pelapor' => 'required',
            'nomer_telepon_pelapor' => 'required',
            //'unit_pelapor' => 'required',
            'gambar' => 'required',
            'tanda_pengenal' => 'required',
        ]);

        $gambar = $request->file('gambar');
        // Generate a unique filename using the current timestamp
        $gambarName = time() . '_' . Str::random(10) . '.' . $gambar->getClientOriginalExtension();
        // Store the file in the desired folder
        $gambar->storeAs('public/laporan_insiden/gambarkejadian', $gambarName);

        $pengenalName = '';
        if($request->hasFile('tanda_pengenal')) {
            $pengenal = $request->file('tanda_pengenal');
            // Generate a unique filename using the current timestamp
            $pengenalName = time() . '_' . Str::random(10) . '.' . $pengenal->getClientOriginalExtension();
            // Store the file in the desired folder
            $pengenal->storeAs('public/laporan_insiden/tanda_pengenal', $pengenalName);
        } else {
            $pengenalName = '';
        }

        Laporinsiden::create([
            //'user_id' => auth()->user()->id,
            'kode_laporinsiden' => $request->kode_laporinsiden,
            'tanda_pengenal' => $pengenalName,
            'waktu_kejadian' => $request->waktu_kejadian,
            'departemen_id' => $request->departemen_id,
            'lokasi_rinci' => $request->lokasi_rinci,
            'jenis_insiden' => $request->jenis_insiden,
            // 'jenis_insiden_box' => $request->jenis_insiden_box,
            'kronologi' => $request->kronologi,
            'penyebab_insiden' => $request->penyebab_insiden,
            // 'penyebab_insiden_box' => $request->penyebab_insiden_box,
            'nama_pelapor' => $request->nama_pelapor,
            'email_pelapor' => $request->email_pelapor,
            'nomer_telepon_pelapor' => $request->nomer_telepon_pelapor,
            //'unit_pelapor' => $request->unit_pelapor,
            'nama_korban' => $request->nama_korban,
            'email_korban' => $request->email_korban,
            'nomer_telepon_korban' => $request->nomer_telepon_korban,
            //'unit_korban' => $request->unit_korban,
            'status' => 1,
            'gambar' => $gambarName,
        ]);

        Alert::success('Berhasil', 'Data Laporan Insiden berhasil disimpan!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('simk3.index');
    }
}




