<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LapanganController extends Controller
{
    public function index()
    {
        $lapangan = Lapangan::all();
        return view('admin.lapangan.index', compact('lapangan'));
    }
    public function create(Lapangan $lapangan)
    {
        return view('admin.lapangan.create-edit', compact('lapangan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
        ]);
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $location = 'admin/lapangan';
        $file->move($location, $nama_file);

        Lapangan::create([
            'gambar' => $nama_file,
            'nama' => Str::headline($request->nama),
            'deskripsi' => Str::headline($request->deskripsi)
        ]);



        return redirect()->route('lapangan.index')->with('success', 'data berhasil ditambahkan');
    }
    public function edit(Lapangan $lapangan)
    {
        return view('admin.lapangan.create-edit', compact('lapangan'));
    }
    public function update(Request $request, Lapangan $lapangan)
    {
        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $location = 'admin/lapangan';
            $file->move($location, $nama_file);

            Storage::delete($location, $nama_file);

            $lapangan->update([
                'gambar' => $nama_file,
                'nama' => Str::headline($request->nama),
                'deskripsi' => Str::headline($request->deskripsi)
            ]);

            // $lapangan = Lapangan::findOrFail($id);
            // $lapangan->$request->nama_file;
            // $lapangan->$request->Str::headline($request->nama);
            // $lapangan->$request->Str::headline($request->deskripsi);
            // $lapangan->save();
        } else {
            $lapangan->update([
                'nama' => Str::headline($request->nama),
                'deskripsi' => Str::headline($request->deskripsi)
            ]);
        }
        return redirect()->route('lapangan.index')->with('success', 'data berhasil diupdate');
    }
    public function destroy(Lapangan $lapangan)
    {
        $lapangan->delete();
        return redirect()->route('lapangan.index')->with('success', 'data berhasil dihapus');
    }
}
