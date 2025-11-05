<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'pesan' => 'required|string',
        ]);

        $komentar = Komentar::create([
            'id_user' => $request->user()->id,
            'id_berita' => $berita->id,
            'pesan' => $data['pesan'],
        ]);

        return response()->json([
            'message' => 'Komentar berhasil ditambahkan!',
            'data' => $komentar
        ], 201);
    }
}
