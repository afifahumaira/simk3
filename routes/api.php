<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware => auth::sanctum'], function(){
    
    Route::get('/department',[App\Http\Controllers\API\DepartmentController::class, 'index']);
    Route::get('/detail-department/{id}',[App\Http\Controllers\API\DepartmentController::class, 'detail']);
    Route::post('/insert-department',[App\Http\Controllers\API\DepartmentController::class, 'insert']);
    Route::post('/update-department/{id}',[App\Http\Controllers\API\DepartmentController::class, 'update']);
    Route::get('/delete-department/{id}',[App\Http\Controllers\API\DepartmentController::class, 'delete']);
    
    Route::get('/inventory',[App\Http\Controllers\API\InventoryController::class, 'index']);
    Route::post('/insert-inventory',[App\Http\Controllers\API\InventoryController::class, 'insert']);
    Route::post('/update-inventory/{id}',[App\Http\Controllers\API\InventoryController::class, 'update']);
    Route::get('/delete-inventory/{id}',[App\Http\Controllers\API\InventoryController::class, 'delete']);
    Route::get('/detail-inventory/{id}',[App\Http\Controllers\API\InventoryController::class, 'detail']);

    Route::get('/potensi-bahaya',[App\Http\Controllers\API\PotensiBahayaController::class, 'index']);
    Route::post('/insert-potensi-bahaya',[App\Http\Controllers\API\PotensiBahayaController::class, 'insert']);
    Route::post('/update-potensi-bahaya/{id}',[App\Http\Controllers\API\PotensiBahayaController::class, 'update']);
    Route::get('/delete-potensi-bahaya/{id}',[App\Http\Controllers\API\PotensiBahayaController::class, 'delete']);
    Route::get('/detail-potensi-bahaya/{id}',[App\Http\Controllers\API\PotensiBahayaController::class, 'detail']);

    Route::get('/laporan-insiden',[App\Http\Controllers\API\LaporanInsidenController::class, 'index']);
    Route::post('/insert-laporan-insiden',[App\Http\Controllers\API\LaporanInsidenController::class, 'insert']);
    Route::post('/update-laporan-insiden/{id}',[App\Http\Controllers\API\LaporanInsidenController::class, 'update']);
    Route::get('/delete-laporan-insiden/{id}',[App\Http\Controllers\API\LaporanInsidenController::class, 'delete']);

    Route::get('/investigasi',[App\Http\Controllers\API\InvestigasiController::class, 'index']);
    Route::post('/insert-investigasi',[App\Http\Controllers\API\InvestigasiController::class, 'insert']);
    Route::post('/update-investigasi/{id}',[App\Http\Controllers\API\InvestigasiController::class, 'update']);
    Route::get('/delete-investigasi/{id}',[App\Http\Controllers\API\InvestigasiController::class, 'delete']);
    Route::get('/detail-investigasi/{id}',[App\Http\Controllers\API\InvestigasiController::class, 'detail']);


    Route::get('/hirarc',[App\Http\Controllers\API\HirarcController::class, 'index']);
    Route::post('/insert-hirarc',[App\Http\Controllers\API\HirarcController::class, 'insert']);
    Route::post('/update-hirarc/{id}',[App\Http\Controllers\API\HirarcController::class, 'update']);
    Route::get('/delete-hirarc/{id}',[App\Http\Controllers\API\HirarcController::class, 'delete']);
    Route::get('/detail-hirarc/{id}',[App\Http\Controllers\API\HirarcController::class, 'detail']);

    Route::get('/hirarcpre',[App\Http\Controllers\API\HirarcPreController::class, 'index']);
    Route::post('/insert-hirarcpre',[App\Http\Controllers\API\HirarcPreController::class, 'insert']);
    Route::post('/update-hirarcpre/{id}',[App\Http\Controllers\API\HirarcPreController::class, 'update']);
    Route::get('/delete-hirarcpre/{id}',[App\Http\Controllers\API\HirarcPreController::class, 'delete']);
    Route::get('/detail-hirarcpre/{id}',[App\Http\Controllers\API\HirarcPreController::class, 'detail']);

    Route::get('/hirarcpos',[App\Http\Controllers\API\HirarcPosController::class, 'index']);
    Route::post('/insert-hirarcpos',[App\Http\Controllers\API\HirarcPosController::class, 'insert']);
    Route::post('/update-hirarcpos/{id}',[App\Http\Controllers\API\HirarcPosController::class, 'update']);
    Route::get('/delete-hirarcpos/{id}',[App\Http\Controllers\API\HirarcPosController::class, 'delete']);
    Route::get('/detail-hirarcpos/{id}',[App\Http\Controllers\API\HirarcPosController::class, 'detail']);

    Route::get('/admin',[App\Http\Controllers\API\AdminController::class, 'index']);
    Route::post('/insert-admin',[App\Http\Controllers\API\AdminController::class, 'insert']);
    Route::post('/update-admin/{id}',[App\Http\Controllers\API\AdminController::class, 'update']);
    Route::get('/delete-admin/{id}',[App\Http\Controllers\API\AdminController::class, 'delete']);
    Route::get('/detail-admin/{id}',[App\Http\Controllers\API\AdminController::class, 'detail']);

    Route::get('/pengguna',[App\Http\Controllers\API\PenggunaController::class, 'index']);
    Route::post('/update-pengguna/{id}',[App\Http\Controllers\API\PenggunaController::class, 'update']);
    Route::get('/delete-pengguna/{id}',[App\Http\Controllers\API\PenggunaController::class, 'delete']);
    Route::get('/detail-pengguna/{id}',[App\Http\Controllers\API\PenggunaController::class, 'detail']);
    
});
Route::post('/register-users',[App\Http\Controllers\API\AuthController::class, 'register']);
Route::post('/login',[App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('/lengkapi-profile/{id}',[App\Http\Controllers\API\AuthController::class, 'lengkapi_profile']);


