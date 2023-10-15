<?php

namespace App\Http\Controllers;

use App\Http\Controllers\InvestigasiPotensiController as ControllersInvestigasiPotensiController;
use Illuminate\Http\Request;
use App\Models\Potensibahaya;
use App\Models\InvestigasiPotensi;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\P2k3;
use App\Models\Departemen;

class InvestigasiPotensiController extends Controller
{
    public function index(Request $request) {
        $data = Potensibahaya::all();        
        $departemen = Departemen::all();
        $p2k3s = P2k3::all();
        $investigasis = InvestigasiPotensi::with(['p2k3_data', 'departemen', 'potensibahaya'])
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
                
                $query->whereHas('departemen', function ($subquery) use ($searchTerm) {
                    $subquery->where('name', 'LIKE', '%' . $searchTerm . '%');
                    })
            ->orWhere ('lokasi', 'LIKE', '%'.$request->search.'%')
            ->orWhere('potensi_bahaya', 'LIKE', '%'.$request->search.'%');
            })
        ->paginate(10);

        return view('dashboard.investigasipotensi.index')
            ->with('investigasis', $investigasis)
            ->with('laporinsdien', $data)
            ->with('departemen', $departemen)
            ->with('p2k3s', $p2k3s);
            
    }

    public function k3dep(Request $request) {
        $data = Potensibahaya::all();        
        $departemen = Departemen::all();
        $p2k3s = P2k3::all();
        $investigasis = InvestigasiPotensi::with(['p2k3_data', 'departemen', 'potensibahaya'])
        ->when($request->has('filter'), function($query) use($request){
            if($request->filter !=''){
             $query->where('status', $request->filter);
            }
         })
         ->where(function($query) use($request){
            $searchTerm = $request->search;
            
            $query->whereHas('departemen', function ($subquery) use ($searchTerm) {
                $subquery->where('name', 'LIKE', '%' . $searchTerm . '%');
                })
        ->orWhere ('lokasi', 'LIKE', '%'.$request->search.'%')
        ->orWhere('potensi_bahaya', 'LIKE', '%'.$request->search.'%');
        })
        ->paginate(10);

        return view('dashboard.investigasipotensi.k3view')
            ->with('investigasis', $investigasis)
            ->with('laporinsdien', $data)
            ->with('departemen', $departemen)
            ->with('p2k3s', $p2k3s);
            
    }

    public function tambah($id) {
        $lap = Potensibahaya::find($id);
        return view('dashboard.investigasipotensi.tambah-investigasi', compact('lap'));
    }

    public function lihat($id) {
        $investigasi = InvestigasiPotensi::where('id',$id)->first();
        return view('dashboard.investigasipotensi.Lihat-investigasi', compact('investigasi'));
                
    }

    public function melihat($id) {
        $investigasi = InvestigasiPotensi::where('id',$id)->first();
        return view('dashboard.investigasipotensi.Lihat-k3view', compact('investigasi'));
                
    }

    public function ubah($id) {
        $investigasi = InvestigasiPotensi::where('id',$id)->first();
        $p2k3s = P2k3::all();
        $departemen = Departemen::all();
        $laporinsiden = Potensibahaya::all();
        return view('dashboard.investigasipotensi.edit-investigasi')
                ->with('investigasi', $investigasi)
                ->with('p2k3s', $p2k3s)
                ->with('departemen', $departemen)
                ->with('laporinsiden', $laporinsiden);
    }

    public function simpan(Request $request) {
        $request->validate([
            'p2k3' => 'required',
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

        InvestigasiPotensi::create([
            'p2k3' => $request->p2k3,
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
        return redirect()->route('investigasipotensi.index');
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

        InvestigasiPotensi::find($id)->update([
            'p2k3' => $request->p2k3,
            'potensibahaya_id' => $request->potensibahaya_id,
            'departemen_id' => $request->departemen_id,
            'lokasi' => $request->lokasi,
            'potensi_bahaya' => $request->potensi_bahaya,
            'risiko' => $request->risiko,
            'usulan' => $request->usulan,
            'tenggat_waktu' => $request->tenggat_waktu,
            'tindakan' => $request->tindakan,
            'status' => $request->status,
        ]);

        if($request->status == 3) {
            $data = Potensibahaya::updated([
                'p2k3_id' => $request->p2k3,
                'status' => $request->status,
            ]);
            Alert::success('Berhasil', 'Data Investigasi berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
            return redirect()->route('investigasipotensi.index');
        }

        // if ($request->status == 3) {
        //     $data = InvestigasiPotensi::find($id);
        //     $data->delete();
            
        //     Alert::success('Berhasil', 'Investigasi selesai')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        //     return redirect()->route('daftarinvestigasi.index');
        // }

        Alert::success('Berhasil', 'Data Investigasi berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('investigasipotensi.index');
    }

    public function edit($id, Request $request) {
        // $request->validate([
        //     'p2k3_id' => 'required',
        //     'status' => 'required',
        // ]);

        InvestigasiPotensi::find($id)->update([
            'p2k3' => $request->p2k3,
            'status' => $request->status,
        ]);

        // if ($request->status == 3) {
        //     $data = InvestigasiPotensi::find($id);
        //     $data->delete();
            
        //     Alert::success('Berhasil', 'Investigasi selesai')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        //     return redirect()->route('daftarinvestigasi.index');
        // }

        Alert::success('Berhasil', 'Data Investigasi berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('investigasi.index');
    }

    public function delete($id) {
        $inv = InvestigasiPotensi::find($id);
        $inv->delete();

        Alert::success('Berhasil', 'Data Investigasi berhasil dihapus!')->iconHtml('<i class="bi bi-person-check fs-3x"></i>')->hideCloseButton();
        return redirect()->route('investigasipotensi.index');
    }

}
