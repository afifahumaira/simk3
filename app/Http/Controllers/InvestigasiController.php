<?php

namespace App\Http\Controllers;

use App\Models\Investigasi;
use App\Models\Laporinsiden;
use App\Models\P2k3;
use Illuminate\Http\Request;
use Alert;
use App\Models\Departemen;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;

class InvestigasiController extends Controller
{

    public function index(Request $request) {
        $data = Laporinsiden::all();
        $departemen = Departemen::all();
        $p2k3s = P2k3::all();
        $investigasis = Investigasi::with(['p2k3', 'departemen', 'laporinsiden'])
        ->when($request->has('filter'), function($query) use($request){
            if($request->filter !=''){
             $query->where('status', $request->filter);
            }
         })
        ->when (auth()->user()->hak_akses=='K3 Departemen', function ($query){
            $query->where('departemen_id', auth()->user()->departemen_id);
        })
        ->where(function($query) use($request){
            $query->where('kategori', 'LIKE', '%'.$request->search.'%');
        })
        ->paginate(10);        
                    
        return view('dashboard.daftarinvestigasi.index')
            ->with('investigasis', $investigasis)
            ->with('laporinsdien', $data)
            ->with('departemen', $departemen)
            ->with('p2k3s', $p2k3s);
            
    }

    public function k3dep(Request $request) {
        $data = Laporinsiden::all();
        $departemen = Departemen::all();
        $p2k3s = P2k3::all();
        $investigasis = Investigasi::with(['p2k3', 'departemen', 'laporinsiden'])
        ->when($request->has('filter'), function($query) use($request){
            if($request->filter !=''){
             $query->where('status', $request->filter);
            }
         })
        // ->when (auth()->user()->hak_akses=='K3 Departemen', function ($query){
        //     $query->where('departemen_id', auth()->user()->departemen_id);
        // })
        ->where(function($query) use($request){
            $query->where('kategori', 'LIKE', '%'.$request->search.'%');
        })
        ->paginate(10);        
                    
        return view('dashboard.daftarinvestigasi.k3view')
            ->with('investigasis', $investigasis)
            ->with('laporinsdien', $data)
            ->with('departemen', $departemen)
            ->with('p2k3s', $p2k3s);
            
    }

    public function tambah($id) {
        $lap = Laporinsiden::find($id);
        return view('dashboard.daftarinvestigasi.tambah-investigasi', compact('lap'));
    }

    public function lihat($id) {
        $investigasi = Investigasi::where('id',$id)->first();
        return view('dashboard.daftarinvestigasi.Lihat-investigasi', compact('investigasi'));
                
    }

    public function melihat($id) {
        $investigasi = Investigasi::where('id',$id)->first();
        return view('dashboard.daftarinvestigasi.Lihat-k3view', compact('investigasi'));
                
    }

    public function ubah($id) {
        $investigasi = Investigasi::where('id',$id)->first();
        $p2k3s = P2k3::all();
        $departemen = Departemen::all();
        $laporinsiden = Laporinsiden::all();
        return view('dashboard.daftarinvestigasi.edit-investigasi')
                ->with('investigasi', $investigasi)
                ->with('p2k3s', $p2k3s)
                ->with('departemen', $departemen)
                ->with('laporinsiden', $laporinsiden);
    }

    public function simpan(Request $request) {
        $request->validate([
            'p2k3_id' => 'required',
            'laporinsiden_id' => 'required',
            'departemen_id' => 'required',
            'lokasi' => 'required',
            'kategori' => 'required',
            'penyebab_langsung' => 'required',
            'penyebab_tidak_langsung' => 'required',
            'penyebab_dasar' => 'required',
            'tenggat_waktu' => 'required',
            'tindakan' => 'required',
        ]);

        Investigasi::create([
            'p2k3_id' => $request->p2k3_id,
            'laporinsiden_id' => $request->laporinsiden_id,
            'departemen_id' => $request->departemen_id,
            'lokasi' => $request->lokasi,
            'kategori' => $request->kategori,
            'penyebab_langsung' => $request->penyebab_langsung,
            'penyebab_tidak_langsung' => $request->penyebab_tidak_langsung,
            'penyebab_dasar' => $request->penyebab_dasar,
            'tenggat_waktu' => $request->tenggat_waktu,
            'tindakan' => $request->tindakan,
        ]);

        Alert::success('Berhasil', 'Data Investigasi berhasil disimpan!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('daftarinvestigasi.index');
    }

    public function update($id, Request $request) {
        // $request->validate([
        //     'p2k3_id' => 'required',
        //     'laporinsiden_id' => 'required',
        //     'departemen_id' => 'required',
        //     'kategori' => 'required',
        //     'penyebab_langsung' => 'required',
        //     'penyebab_tidak_langsung' => 'required',
        //     'penyebab_dasar' => 'required',
        //     'tenggat_waktu' => 'required',
        //     'tindakan' => 'required',
        // ]);

        Investigasi::find($id)->update([
            'p2k3_id' => $request->p2k3_id,
            'laporinsiden_id' => $request->laporinsiden_id,
            'departemen_id' => $request->departemen_id,
            'lokasi' => $request->lokasi,
            'kategori' => $request->kategori,
            'penyebab_langsung' => $request->penyebab_langsung,
            'penyebab_tidak_langsung' => $request->penyebab_tidak_langsung,
            'penyebab_dasar' => $request->penyebab_dasar,
            'tenggat_waktu' => $request->tenggat_waktu,
            'tindakan' => $request->tindakan,
            'status' => $request->status,
        ]);

        if ($request->status == 3) {
            $data = Investigasi::find($id);
            $data->delete();
            
            Alert::success('Berhasil', 'Investigasi selesai')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
            return redirect()->route('daftarinvestigasi.index');
        }

        Alert::success('Berhasil', 'Data Investigasi berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('daftarinvestigasi.index');
    }

    public function edit($id, Request $request) {
        // $request->validate([
        //     'p2k3_id' => 'required',
        //     'status' => 'required',
        // ]);

        Investigasi::find($id)->update([
            'p2k3_id' => $request->p2k3_id,
            'status' => $request->status,
        ]);

        if ($request->status == 3) {
            $data = Investigasi::find($id);
            $data->delete();
            
            Alert::success('Berhasil', 'Investigasi selesai')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
            return redirect()->route('daftarinvestigasi.index');
        }

        Alert::success('Berhasil', 'Data Investigasi berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('daftarinvestigasi.index');
    }

    public function delete($id) {
        $inv = Investigasi::find($id);
        $inv->delete();

        Alert::success('Berhasil', 'Data Investigasi berhasil dihapus!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('daftarinvestigasi.index');
    }

}
