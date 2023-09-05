<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('admin.berita.index', compact('berita'));
    }
    public function create(Berita $berita)
    {
        return view('admin.berita.create-edit', compact('berita'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'Deskripsi' => 'required',
        ]);
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $location = 'admin/berita';
        $file->move($location, $nama_file);

        Berita::create([
            'gambar' => $nama_file,
            'judul' => Str::headline($request->judul),
            'Deskripsi' => Str::headline($request->Deskripsi)
        ]);



        return redirect()->route('berita.index')->with('success', 'data berhasil ditambahkan');
    }
    public function edit(Berita $berita)
    {
        return view('admin.berita.create-edit', compact('berita'));
    }
    public function update(Request $request, Berita $berita)
    {
        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $location = 'admin/berita';
            $file->move($location, $nama_file);

            Storage::delete($location, $nama_file);

            $berita->update([
                'gambar' => $nama_file,
                'judul' => Str::headline($request->nama),
                'Deskripsi' => Str::headline($request->Deskripsi)
            ]);

            // $berita = berita::findOrFail($id);
            // $berita->$request->nama_file;
            // $berita->$request->Str::headline($request->nama);
            // $berita->$request->Str::headline($request->Deskripsi);
            // $berita->save();
        } else {
            $berita->update([
                'judul' => Str::headline($request->judul),
                'Deskripsi' => Str::headline($request->Deskripsi)
            ]);
        }
        return redirect()->route('berita.index')->with('success', 'data berhasil diupdate');
    }
    public function destroy(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('berita.index')->with('success', 'data berhasil dihapus');
    }
}
