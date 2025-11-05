<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\KomentarController;
use App\Http\Controllers\Api\LapanganController;
use App\Http\Controllers\Api\PaketController;
use App\Http\Controllers\Api\PelatihController;
use App\Http\Controllers\Api\ReservasiController;
use App\Http\Controllers\Api\RiwayatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/




Route::post('/register', [AuthController::class, 'registeruser']);
Route::post('/login', [AuthController::class, 'loginuser']);


Route::get('/lapangan', [LapanganController::class, 'index']);
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/berita/{berita:slug}', [BeritaController::class, 'show']);
Route::get('/paket', [PaketController::class, 'index']);
Route::get('/paket/{paket}', [PaketController::class, 'show']);
Route::get('/pelatih', [PelatihController::class, 'index']);
Route::get('/pelatih/{pelatih}', [PelatihController::class, 'show']);


Route::get('/riwayat', [RiwayatController::class, 'index']);

Route::post('/reservasi', [ReservasiController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logoutuser']);


    Route::get('/user', function (Request $request) {
        return $request->user();
    });


    Route::post('/berita/{berita:slug}/komentar', [KomentarController::class, 'store']);


});
