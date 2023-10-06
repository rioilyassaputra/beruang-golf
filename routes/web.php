<?php

use App\Models\Berita;
use App\Models\Pelatih;
use App\Models\Lapangan;
use App\Models\Paket;
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
})->name('beranda');
Route::get('/Berita', function () {
    $berita =  Berita::latest()->paginate(8);
    return view('landing_page/Berita', compact('berita'));
})->name('Berita');
Route::get('/kategori', function () {
    $paket = Paket::latest()->paginate(8);
    return view('landing_page/kategori', compact('paket'));
})->name('kategori');
Route::get('/Reservasi', function () {
    return view('landing_page/Reservasi');
})->name('Reservasi');
Route::get('/Paket/detail/{paket}', function (Paket $paket) {
    return view('landing_page/detailPaket', compact('paket'));
})->name('kategori.detail');
Route::get('/Berita/detail/{berita:slug}', function (Berita $berita) {
    return view('landing_page/detailBerita', compact('berita'));
})->name('Berita.detail');
Route::get('/tentangkami', function () {
    $pelatih = Pelatih::latest()->paginate(8);
    return view('landing_page/tentangkami', compact('pelatih'));
})->name('tentangkami');
Route::get('/user/login', function () {
    return view('landing_page/login');
});
Route::get('/user/login', function () {
    return view('landing_page/login');
});
Route::get('/user/register', function () {
    return view('landing_page/register');
});
Route::get('/Pelatih/detail/{pelatih}', function (Pelatih $pelatih) {
    return view('landing_page/detailPelatih', compact('pelatih'));
})->name('pelatih.detail');



// backend
Route::resource('lapangan', LapanganController::class);
Route::resource('pelatih', PelatihController::class);
Route::resource('berita', BeritaController::class);
Route::resource('paket', PaketController::class);
Route::resource('reservasi', ReservasiController::class);

route::put('/konfirmasi/{reservasi:id}', [ReservasiController::class, 'konfirmasi'])->name('confirm');
