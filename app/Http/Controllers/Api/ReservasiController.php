<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservasi;
use App\Models\Paket;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
   public function store(Request $request)
    {
        $noakhir = Reservasi::max('id');
        $tgl = date('d-m-y');
        if ($noakhir < 1) {
            $no_reservasi = 'Puncak Golf' . '/' . '1' . '/' . $tgl;
        } else {
            $no_reservasi = 'Puncak Golf' . '/' . ($noakhir + 1) . '/' . $tgl;
        }

        $validatedData = $request->validate([
            'nama' => 'required',
            'id_paket' => 'required|exists:pakets,id',
            'no_telp' => 'required',
            'tanggal' => 'required|date_format:Y-m-d',
            'email' => 'required|email',
        ]);

        $no_hp = $validatedData['no_telp'];

        $paket = Paket::find($validatedData['id_paket']);

        if (!$paket) {
            return response()->json(['message' => 'Paket tidak ditemukan.'], 404);
        }

        $data = [
    'nama' => Str::headline($validatedData['nama']),
    'id_paket' => $paket->id,
    'no_telp' => $no_hp,
    'no_reservasi' => $no_reservasi,
    'tanggal' => $validatedData['tanggal'],
    'status' => 'pending',
    'email' => $validatedData['email'],
    'id_user' => Auth::id(),
    'harga' => $paket->harga,
];


        $reservasi = Reservasi::create($data);

        return response()->json([
            'message' => 'Reservasi berhasil dibuat!',
            'data' => $reservasi
        ], 201);
    }
}
