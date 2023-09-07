<?php

use App\Models\Berita;
use App\Models\Pelatih;
use App\Models\Lapangan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\ReservasiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//frontend//

Route::get('/', function () {
    $lapangan = Lapangan::latest()->paginate(8);
    return view('landing_page/index', compact('lapangan'));
});
Route::get('/Berita', function () {
    $berita =  Berita::latest()->paginate(8);
    return view('landing_page/Berita', compact('berita'));
});
Route::get('/kategori', function () {
    return view('landing_page/kategori');
});
Route::get('/reservasi', function () {
    return view('landing_page/reservasi');
});
Route::get('/tentangkami', function () {
    $pelatih = Pelatih::latest()->paginate(8);
    return view('landing_page/tentangkami', compact('pelatih'));
});


// backend
Route::resource('lapangan', LapanganController::class);
Route::resource('pelatih', PelatihController::class);
Route::resource('berita', BeritaController::class);
Route::resource('paket', PaketController::class);
Route::resource('reservasi', ReservasiController::class);

route::put('/konfirmasi/{reservasi:id}', [ReservasiController::class, 'konfirmasi'])->name('confirm');
