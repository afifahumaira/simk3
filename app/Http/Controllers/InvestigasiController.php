<?php

namespace App\Http\Controllers;

use App\Models\Investigasi;
use App\Models\Laporinsiden;
use Illuminate\Http\Request;
use Alert;

class InvestigasiController extends Controller
{

    public function index() {

        $investigasis = Investigasi::with(['laporinsiden', 'departemen', 'p2k3'])->paginate(10);
        // ->where('kategori', 'LIKE', '%'.$request->search.'%')
        // ->orWhereHas('laporinsiden', function($query) use ($request) {
        //     $query->orWhere('nama_pelapor', 'LIKE', '%'.$request->search.'%');
        // })
        // ->orWhereHas('departemen', function($query) use ($request) {
        //     $query->orWhere('name', 'LIKE', '%'.$request->search.'%');
        // })
        // ->orWhereHas('p2k3', function($query) use ($request) {
        //     $query->orWhere('nama', 'LIKE', '%'.$request->search.'%');
        // })
        // ->paginate(10);

        return view('dashboard.daftarinvestigasi.index')
            ->with('investigasis', $investigasis);
    }

    public function tambah($id) {
        $lap = Laporinsiden::find($id);
        return view('dashboard.daftarinvestigasi.tambah-investigasi', compact('lap'));
    }

    public function lihat($id) {
        $investigasi = Investigasi::findorFail($id);
        return view('dashboard.daftarinvestigasi.Lihat-investigasi', compact('investigasi'));
                
    }

    public function ubah($id) {
        $investigasi = Investigasi::with(['laporinsiden', 'departemen', 'p2k3'])->find($id);
        return view('dashboard.daftarinvestigasi.edit-investigasi')
                ->with('investigasi', $investigasi);
    }

    public function simpan(Request $request) {
        $request->validate([
            'p2k3_id' => 'required',
            'laporinsiden_id' => 'required',
            'departemen_id' => 'required',
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
            'kategori' => $request->kategori,
            'penyebab_langsung' => $request->penyebab_langsung,
            'penyebab_tidak_langsung' => $request->penyebab_tidak_langsung,
            'penyebab_dasar' => $request->penyebab_dasar,
            'tenggat_waktu' => $request->tenggat_waktu,
            'tindakan' => $request->tindakan,
        ]);

        Alert::success('Berhasil', 'Data Investigasi berhasil disimpan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
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
            'kategori' => $request->kategori,
            'penyebab_langsung' => $request->penyebab_langsung,
            'penyebab_tidak_langsung' => $request->penyebab_tidak_langsung,
            'penyebab_dasar' => $request->penyebab_dasar,
            'tenggat_waktu' => $request->tenggat_waktu,
            'tindakan' => $request->tindakan,
        ]);

        Alert::success('Berhasil', 'Data Investigasi berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('daftarinvestigasi.index');
    }

    public function delete($id) {
        $inv = Investigasi::find($id);
        $inv->delete();

        Alert::success('Berhasil', 'Data Investigasi berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('daftarinvestigasi.index');
    }

}
