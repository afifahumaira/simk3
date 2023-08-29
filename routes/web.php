<?php

use App\Http\Controllers\FirebaseController;
use App\Http\Controllers\LaporanInsidenController;
use App\Http\Controllers\PotensibahayaController;
use App\Http\Controllers\HirarcController;
use App\Http\Controllers\AparController;
use App\Http\Controllers\P3kController;
use App\Http\Controllers\P2k3Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AparInspeksiController;
use App\Http\Controllers\P3kInspeksiController;
use App\Http\Controllers\DaftardokumenController;
use App\Http\Controllers\Simk3Controller;
use App\Http\Controllers\LokasiMasterController;
use App\Http\Controllers\AktifitasController;
use App\Http\Controllers\AktifitasMasterController;
use App\Http\Controllers\HazardController;
use App\Http\Controllers\InvestigasiController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\RisikoController;
// use App\Http\Controllers\Lihat_InsidenController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('simk3');
});

Route::get('dashboard', [Simk3Controller::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('laporaninsidens', [LaporanInsidenController::class, 'laporaninsiden'])->name('laporaninsidens');
Route::post('save', [LaporanInsidenController::class, 'save'])->name('save');
Route::get('potensibahayas', [PotensibahayaController::class, 'potensibahaya'])->name('potensibahayas');
Route::post('simpan', [PotensibahayaController::class, 'simpan'])->name('simpan');

Route::group(['middleware' => ['auth']], function() {
    // 1. Laporan Insiden
    Route::prefix('laporan-insiden')->name('laporan-insiden.')->group(function(){
        Route::get('/', [LaporanInsidenController::class, 'index'])->name('index');
        Route::get('tambah', [LaporanInsidenController::class, 'tambah'])->name('tambah');
        Route::get('lihat/{id}', [LaporanInsidenController::class, 'lihat'])->name('lihat');
        Route::get('ubah/{id}', [LaporanInsidenController::class, 'ubah'])->name('ubah');
        Route::post('insert', [LaporanInsidenController::class, 'insert'])->name('insert');
        Route::post('update/{id}', [LaporanInsidenController::class, 'update'])->name('update');
        Route::post('delete/{id}', [LaporanInsidenController::class, 'delete'])->name('delete');
    });

    // 2. Daftar Investigasi
    Route::prefix('daftarinvestigasi')->name('daftarinvestigasi.')->group(function(){
        Route::get('/', [InvestigasiController::class, 'index'])->name('index');
        Route::get('tambah/{id}', [InvestigasiController::class, 'tambah'])->name('tambah');
        Route::post('simpan', [InvestigasiController::class, 'simpan'])->name('simpan');
        Route::get('lihat/{id}', [InvestigasiController::class, 'lihat'])->name('lihat');
        Route::get('ubah/{id}', [InvestigasiController::class, 'ubah'])->name('ubah');
        Route::post('update/{id}', [InvestigasiController::class, 'update'])->name('update');
        Route::post('delete/{id}', [InvestigasiController::class, 'delete'])->name('delete');
    });

    // 3. Potensi Bahaya
    Route::prefix('potensibahaya')->name('potensibahaya.')->group(function(){
        Route::get('/', [PotensibahayaController::class, 'index'])->name('index');
        Route::get('tambah', [PotensibahayaController::class, 'tambah'])->name('tambah');
        Route::post('tambah', [PotensibahayaController::class, 'tambahdata'])->name('tambahdata');
        Route::get('lihat/{id}', [PotensibahayaController::class, 'lihat'])->name('lihat');
        Route::get('edit/{id}', [PotensibahayaController::class, 'edit'])->name('edit');
        Route::post('delete/{id}', [PotensibahayaController::class, 'delete'])->name('delete');
        Route::post('edit/{id}', [PotensibahayaController::class, 'editstore'])->name('editstore');
    });

    // 4. Hirarc
    Route::prefix('hirarc')->name('hirarc.')->group(function(){
        Route::get('/', [HirarcController::class, 'index'])->name('index');
        Route::get('tambah/{id?}', [HirarcController::class, 'tambah'])->name('tambah');
        Route::get('tambahDetail/{id}', [HirarcController::class, 'tambahDetail'])->name('tambahDetail');
        Route::post('simpan', [HirarcController::class, 'simpan'])->name('simpan');
        Route::put('save/{id}', [HirarcController::class, 'save'])->name('save');
        Route::post('simpanPreControl/{id}/{detail_id}', [HirarcController::class, 'simpanPreControl'])->name('simpanPreControl');
        Route::post('simpanSolusi/{id}/{detail_id}', [HirarcController::class, 'simpanSolusi'])->name('simpanSolusi');
        Route::post('simpanPostControl/{id}/{detail_id}', [HirarcController::class, 'simpanPostControl'])->name('simpanPostControl');
        Route::put('update/{id}', [HirarcController::class, 'update'])->name('update');
        Route::post('updateDetail/{id}', [HirarcController::class, 'updateDetail'])->name('updateDetail');
        Route::post('delete/{id}', [HirarcController::class, 'delete'])->name('delete');
        Route::get('getControlChildren/{id}', [HirarcController::class, 'getControlChildren'])->name('getControlChildren');
        Route::get('getLocation/{id}', [HirarcController::class, 'getLocation'])->name('getLocation');
        Route::get('getAktifitas/{id}', [HirarcController::class, 'getAktifitas'])->name('getAktifitas');
        Route::get('getHazard/{id}', [HirarcController::class, 'getHazard'])->name('getHazard');
        Route::get('getRisk/{id}', [HirarcController::class, 'getRisk'])->name('getRisk');
        Route::get('edit/{id}', [HirarcController::class, 'edit'])->name('edit');
        Route::get('editDetail/{id}', [HirarcController::class, 'editDetail'])->name('editDetail');
        Route::get('lihat/{id}', [HirarcController::class, 'lihat'])->name('lihat');
    });

    // Inventory
    // // // // 5. APAR // // //
    Route::prefix('inventory/apar')->name('apar.')->group(function(){
        Route::get('/', [AparController::class, 'index'])->name('index');
        Route::get('tambah', [AparController::class, 'tambah'])->name('tambah');
        Route::post('insert', [AparController::class, 'insert'])->name('insert');
        Route::get('edit/{id}', [AparController::class, 'edit'])->name('edit');
        Route::get('lihat/{id}', [AparController::class, 'lihat'])->name('lihat');
        Route::delete('delete/{id}', [AparController::class, 'delete'])->name('delete');
        Route::post('/update/{id}', [AparController::class, 'update'])->name('update');
    });

    //  // // // 6. P3K // // //
    Route::prefix('inventory/p3k')->name('p3k.')->group(function(){
        Route::get('/', [P3kController::class, 'index'])->name('index');
        Route::get('tambah', [P3kController::class, 'tambah'])->name('tambah');
        Route::get('edit/{id}', [P3kController::class, 'edit'])->name('edit');
        Route::get('lihat/{id}', [P3kController::class, 'lihat'])->name('lihat');
        Route::post('insert', [P3kController::class, 'insert'])->name('insert');
        Route::delete('delete/{id}', [P3kController::class, 'delete'])->name('delete');
        Route::post('/update/{id}', [P3kController::class, 'update'])->name('update');
    });

    // Users
    //  // // 7. P2K3 // // //
    Route::prefix('users/p2k3')->name('p2k3.')->group(function(){
        Route::get('/', [P2k3Controller::class, 'index'])->name('index');
        Route::get('lihat/{id}', [P2k3Controller::class, 'lihat'])->name('lihat');
        Route::get('tambah', [P2k3Controller::class, 'tambah'])->name('tambah');
        Route::post('simpan', [P2k3Controller::class, 'simpan'])->name('simpan');
        Route::get('edit/{id}', [P2k3Controller::class, 'edit'])->name('edit');
        Route::post('update/{id}', [P2k3Controller::class, 'update'])->name('update');
        Route::post('hapus/{id}', [P2k3Controller::class, 'hapus'])->name('hapus');
    });

    // // // 8. role user // // //
    Route::prefix('user')->name('user.')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('lihat/{id}', [UserController::class, 'lihat'])->name('lihat');
        Route::post('hapus/{id}', [UserController::class, 'hapus'])->name('hapus');
        Route::get('edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [UserController::class, 'update'])->name('update');
    });

    // Inspeksi
    // // // 9. Apar // // //
    Route::prefix('aparinspeksi')->name('aparinspeksi.')->group(function(){
        Route::get('/', [AparInspeksiController::class, 'index'])->name('index');
        Route::get('list/{id}', [AparInspeksiController::class, 'selected_index'])->name('selected_index');
        Route::get('inspek/{id}', [AparInspeksiController::class, 'inspek'])->name('inspek');
        Route::get('lihat', [AparInspeksiController::class, 'lihat'])->name('lihat');
        Route::get('ubah', [AparInspeksiController::class, 'ubah'])->name('ubah');
        Route::get('daftar', [AparInspeksiController::class, 'daftar'])->name('daftar');
        Route::get('/data-inspeksi', [AparInspeksiController::class, 'data_inspeksi'])->name('data');
        Route::post('store', [AparInspeksiController::class, 'store'])->name('store');
    });

    // // // 10. P3K // // //
    Route::prefix('p3kinspeksi')->name('p3kinspeksi.')->group(function(){
        Route::get('/', [P3kInspeksiController::class, 'index'])->name('index');
        Route::get('/{id}', [P3kInspeksiController::class, 'selected_index'])->name('selected_index');
        Route::get('inspek', [P3kInspeksiController::class, 'inspek'])->name('inspek');
        Route::get('daftar', [P3kInspeksiController::class, 'daftar'])->name('daftar');
        Route::get('lihat', [P3kInspeksiController::class, 'lihat'])->name('lihat');
    });

    // 11. Maps
    Route::prefix('maps')->name('maps.')->group(function(){
        Route::get('/', [MapsController::class, 'index'])->name('index');
        Route::get('lihat', [MapsController::class, 'lihat'])->name('lihat');
        Route::get('tambah', [MapsController::class, 'tambah'])->name('tambah');
        Route::post('simpan', [MapsController::class, 'simpan'])->name('simpan');
        Route::get('edit/{id}', [MapsController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [MapsController::class, 'update'])->name('update');
        Route::post('delete/{id}', [MapsController::class, 'delete'])->name('delete');
        Route::get('detail/{id}', [MapsController::class, 'detail'])->name('detail');
    });

    //  12. Daftar Dokumen
    Route::prefix('daftardokumen')->name('daftardokumen.')->group(function(){
        Route::get('/', [DaftardokumenController::class, 'index'])->name('index');
        Route::get('ubah/{id}', [DaftardokumenController::class, 'ubah'])->name('ubah');
        Route::post('ubah/{id}', [DaftardokumenController::class, 'ubahstore'])->name('ubahstore');
        Route::get('fortambah', [DaftardokumenController::class, 'tambah'])->name('tambah');
        Route::post('tambah', [DaftardokumenController::class, 'tambahdokumen'])->name('tambahdokumen');
        Route::post('store', [DaftardokumenController::class, 'store'])->name('store');

        Route::post('destroy/{id}', [DaftardokumenController::class, 'destroy'])->name('destroy');
    });

    // LandingPage
    Route::prefix('simk3')->name('simk3.')->group(function(){
        Route::get('/', [Simk3Controller::class, 'index'])->name('index');
        Route::get('dashoard', [Simk3Controller::class, 'dashboard'])->name('dashboard');
    });

    // // // // Data Master // // // //
    // 13. Lokasi Departemen
    Route::prefix('lokasimaster')->name('lokasimaster.')->group(function(){
        Route::get('/', [LokasiMasterController::class, 'index'])->name('index');
        Route::get('tambah', [LokasiMasterController::class, 'tambah'])->name('tambah');
        Route::get('edit/{id}', [LokasiMasterController::class, 'edit'])->name('edit');
        Route::get('detail/{id}', [LokasiMasterController::class, 'detail'])->name('detail');
        Route::post('update/{id}', [LokasiMasterController::class, 'update'])->name('update');
        Route::post('delete/{id}', [LokasiMasterController::class, 'delete'])->name('delete');
        Route::post('simpan', [LokasiMasterController::class, 'simpan'])->name('simpan');
    });

    // 14. Aktifitas
    Route::prefix('aktifitasmaster')->name('aktifitasmaster.')->group(function(){
        Route::get('/', [AktifitasMasterController::class, 'index'])->name('index');
        Route::get('tambah', [AktifitasMasterController::class, 'tambah'])->name('tambah');
        Route::get('edit/{id}', [AktifitasMasterController::class, 'edit'])->name('edit');
        Route::get('detail/{id}', [AktifitasMasterController::class, 'detail'])->name('detail');
        Route::post('simpan', [AktifitasMasterController::class, 'simpan'])->name('simpan');
        Route::post('update/{id}', [AktifitasMasterController::class, 'update'])->name('update');
        Route::post('delete/{id}', [AktifitasMasterController::class, 'delete'])->name('delete');
    });

    // 15. Hazard
    Route::prefix('hazard')->name('hazard.')->group(function(){
        Route::get('/', [HazardController::class, 'index'])->name('index');
        Route::get('tambah', [HazardController::class, 'tambah'])->name('tambah');
        Route::get('edit/{id}', [HazardController::class, 'edit'])->name('edit');
        Route::get('detail/{id}', [HazardController::class, 'detail'])->name('detail');
        Route::post('simpan', [HazardController::class, 'simpan'])->name('simpan');
        Route::post('update/{id}', [HazardController::class, 'update'])->name('update');
        Route::post('delete/{id}', [HazardController::class, 'delete'])->name('delete');
    });

    // 16. Risiko
    Route::prefix('risiko')->name('risiko.')->group(function(){
        Route::get('/', [RisikoController::class, 'index'])->name('index');
        Route::get('tambah', [RisikoController::class, 'tambah'])->name('tambah');
        Route::get('edit/{id}', [RisikoController::class, 'edit'])->name('edit');
        Route::get('detail/{id}', [RisikoController::class, 'detail'])->name('detail');
        Route::post('simpan', [RisikoController::class, 'simpan'])->name('simpan');
        Route::post('update/{id}', [RisikoController::class, 'update'])->name('update');
        Route::post('delete/{id}', [RisikoController::class, 'delete'])->name('delete');
    });
});

Route::get('testfirestore', [FirebaseController::class, 'index'])->name('firestore.index');
Route::get('insertdepartment', [FirebaseController::class, 'insertdepartment'])->name('firestore.insertdepartment');
Route::get('insertactivities', [FirebaseController::class, 'insertactivities'])->name('firestore.insertactivities');
Route::get('insertdocuments', [FirebaseController::class, 'insertdocuments'])->name('firestore.insertdocuments');
Route::get('inserthazards', [FirebaseController::class, 'inserthazards'])->name('firestore.inserthazards');
Route::get('inserthirarcs', [FirebaseController::class, 'inserthirarcs'])->name('firestore.inserthirarcs');
Route::get('insertinventories', [FirebaseController::class, 'insertinventories'])->name('firestore.insertinventories');
Route::get('insertinvestigasis', [FirebaseController::class, 'insertinvestigasis'])->name('firestore.insertinvestigasis');
Route::get('insertlaporinsidens', [FirebaseController::class, 'insertlaporinsidens'])->name('firestore.insertlaporinsidens');
Route::get('insertlocations', [FirebaseController::class, 'insertlocations'])->name('firestore.insertlocations');
Route::get('insertmaps', [FirebaseController::class, 'insertmaps'])->name('firestore.insertmaps');
Route::get('insertp2k3s', [FirebaseController::class, 'insertp2k3s'])->name('firestore.insertp2k3s');
Route::get('insertpotensibahayas', [FirebaseController::class, 'insertpotensibahayas'])->name('firestore.insertpotensibahayas');
Route::get('insertrisks', [FirebaseController::class, 'insertrisks'])->name('firestore.insertrisks');
Route::get('insertusers', [FirebaseController::class, 'insertusers'])->name('firestore.insertusers');
Route::get('insertapars', [FirebaseController::class, 'insertapars'])->name('firestore.insertapars');
Route::get('insertcontrols', [FirebaseController::class, 'insertcontrols'])->name('firestore.insertcontrols');
Route::get('insertp3k_inventories', [FirebaseController::class, 'insertp3k_inventories'])->name('firestore.insertp3k_inventories');

