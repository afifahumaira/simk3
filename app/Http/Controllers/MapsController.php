<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Alert;

class MapsController extends Controller
{

    public function index() {
        $maps = Map::all();
        return view('dashboard.maps.index', compact('maps'));
    }

    public function lihat(Request $request) {
        $maps = Map::where('gedung', 'LIKE', '%'.$request->search.'%')
        ->orWhere('lantai', 'LIKE', '%'.$request->search.'%')
        ->paginate(10);

        return view('dashboard.maps.lihat', compact('maps'));
    }

    public function tambah() {
        return view('dashboard.maps.tambah');
    }

    public function simpan(Request $request) {
        $request->validate([
            'gedung' => 'required',
            'lantai' => 'required',
            'gambar' => 'required',
        ]);

        $gambar = $request->file('gambar');
        $gambar->storeAs('public/maps/gambar', $gambar->getClientOriginalName());        

        Map::create([
            'gedung' => $request->gedung,
            'lantai' => $request->lantai,
            'gambar' => $gambar->getClientOriginalName(),
        ]);

        Alert::success('Berhasil', 'Data Maps berhasil ditambahkan!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('maps.lihat');
    }

    public function edit($id) {
        $map = Map::find($id);
        return view('dashboard.maps.edit', compact('map'));
    }

    public function update($id, Request $request) {
        $request->validate([
            'gedung' => 'required',
            'lantai' => 'required',
        ]);

        $gambarname = '';
        if($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/maps/gambar', $gambar->getClientOriginalName());
            $gambarname = $gambar->getClientOriginalName();
        } else {
            $gambarname = $request->gambar_old;
        }

        Map::find($id)->update([
            'gedung' => $request->gedung,
            'lantai' => $request->lantai,
            'gambar' => $gambarname,
        ]);

        Alert::success('Berhasil', 'Data Maps berhasil diperbaharui!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('maps.lihat');
    }

    public function detail($id) {
        $map = Map::find($id);
        return view('dashboard.maps.detail', compact('map'));
    }

    public function delete($id) {
        Map::find($id)->delete();
        Alert::success('Berhasil', 'Data Maps berhasil dihapus!')->iconHtml('<i class="bi bi-person-check"></i>')->hideCloseButton();
        return redirect()->route('maps.lihat');
    }

}
