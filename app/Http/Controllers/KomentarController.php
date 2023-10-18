<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, Berita $berita)
    {
        Komentar::create([
            'id_berita' => $berita->id,
            'id_user' => auth()->user()->id,
            'pesan' => $request->pesan,
        ]);
        return redirect()->back();
    }
    public function destroy(Komentar $komentar)
    {
        $komentar->delete();
        return redirect()->back()->with('success', 'data berhasil dihapus');
    }
}
