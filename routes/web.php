<?php

use Illuminate\Support\Facades\Route;


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
    return view('landing_page/index');
});
Route::get('/berita', function () {
    return view('landing_page/berita');
});
Route::get('/kategori', function () {
    return view('landing_page/kategori');
});
Route::get('/reservasi', function () {
    return view('landing_page/reservasi');
});
Route::get('/tentangkami', function () {
    return view('landing_page/tentangkami');
});
