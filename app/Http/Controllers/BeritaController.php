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
    public function show(Berita $beritum)
    {
        return view('admin.berita.detail', compact('beritum'));
    }
    public function create(Berita $beritum)
    {
        return view('admin.berita.create-edit', compact('beritum'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'gambar' => 'required',
            'slug'     => 'required|unique:beritas',
            'Deskripsi' => 'required',
        ]);

        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $location = 'admin/berita';
        $file->move($location, $nama_file);

        Berita::create([
            'gambar' => $nama_file,
            'judul' => Str::headline($request->judul),
            'slug'     => $request->slug,
            'Deskripsi' => Str::headline($request->Deskripsi)
        ]);



        return redirect()->route('berita.index')->with('success', 'data berhasil ditambahkan');
    }
    public function edit(Berita $beritum)
    {
        return view('admin.berita.create-edit', compact('beritum'));
    }
    public function update(Request $request, Berita $beritum)
    {
        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $location = 'admin/berita';
            $file->move($location, $nama_file);

            Storage::delete($location, $nama_file);

            $beritum->update([
                'gambar' => $nama_file,
                'judul' => Str::headline($request->nama),
                'slug'     => $request->slug,
                'Deskripsi' => Str::headline($request->Deskripsi)
            ]);

            // $berita = berita::findOrFail($id);
            // $berita->$request->nama_file;
            // $berita->$request->Str::headline($request->nama);
            // $berita->$request->Str::headline($request->Deskripsi);
            // $berita->save();
        } else {
            $beritum->update([
                'judul' => Str::headline($request->judul),
                'slug'     => $request->slug,
                'Deskripsi' => Str::headline($request->Deskripsi)
            ]);
        }
        return redirect()->route('berita.index')->with('success', 'data berhasil diupdate');
    }
    public function destroy(Berita $beritum)
    {
        $beritum->delete();
        return redirect()->route('berita.index')->with('success', 'data berhasil dihapus');
    }
}
