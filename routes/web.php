<?php

use App\Models\Paket;
use App\Models\Berita;
use App\Models\Pelatih;
use App\Models\Lapangan;
use Barryvdh\DomPDF\PDF;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\KomentarController;
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
    $paket = Paket::all();
    return view('landing_page/Reservasi', compact('paket'));
})->name('Reservasi');
Route::get('/Paket/detail/{paket}', function (Paket $paket) {
    return view('landing_page/detailPaket', compact('paket'));
})->name('kategori.detail');
Route::get('/Berita/detail/{berita:slug}', function (Berita $berita) {
    return view('landing_page/detailBerita', compact('berita'));
})->name('Berita.detail');
Route::post('/Berita/detail/{berita:slug}/komen', [KomentarController::class, 'store'])->name('komentar')->middleware('auth');
Route::get('/tentangkami', function () {
    $pelatih = Pelatih::latest()->paginate(8);
    return view('landing_page/tentangkami', compact('pelatih'));
})->name('tentangkami');
// Route::get('/user/login', function () {
//     return view('landing_page/login');
// })->name('Login');
Route::get('/masuk', function () {
    return view('landing_page/login');
})->name('login');
Route::get('/daftar', function () {
    return view('landing_page/register');
})->name('register');
Route::get('/sukses', function () {
    return view('landing_page/sukses');
})->name('sukses');
route::post('/daftar/user', [AuthController::class, 'registeruser'])->name('user.daftar');
Route::post('loginuser', [AuthController::class, 'loginuser']);
Route::get('/Pelatih/detail/{pelatih}', function (Pelatih $pelatih) {
    return view('landing_page/detailPelatih', compact('pelatih'));
})->name('pelatih.detail');
Route::get('logoutuser', [AuthController::class, 'logoutuser']);
Route::post('reservasi/user', [ReservasiController::class, 'reservasiuser'])->name('reservasi.user')->middleware('auth');

Route::get('/riwayat', function () {
    $riwayat = Reservasi::all()->where('id_user', Auth()->user()->id);
    return view('landing_page.riwayat', compact('riwayat'));
})->name('riwayat')->middleware('auth');




// backend
Route::resource('lapangan', LapanganController::class)->middleware('admin');
Route::resource('pelatih', PelatihController::class)->middleware('admin');
Route::resource('berita', BeritaController::class)->middleware('admin');
Route::resource('paket', PaketController::class)->middleware('admin');
route::put('/reservasi/confirm/{id}', [ReservasiController::class, 'confirm'])->name('reservasi.confirm')->middleware('admin');
Route::resource('reservasi', ReservasiController::class)->middleware('admin');

Route::get('/dashboard', function () {
    $pelatih = Pelatih::all()->count();
    $berita = berita::all()->count();
    $paket = Paket::all()->count();
    $reservasi = Reservasi::all()->count();
    return view('admin/dashboard', compact('pelatih', 'berita', 'paket', 'reservasi'));
})->name('dashboard')->middleware('admin');

Route::get('PDF', [ReservasiController::class, 'pdf'])->name('pdf');

Route::get('admin/login', [AuthController::class, 'index'])->name('admin');
Route::post('loginproses', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('admin');
