<?php

namespace App\Http\Controllers;

use App\Models\Pelatih;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PelatihController extends Controller
{
    public function index()
    {
        $pelatih = Pelatih::all();
        return view('admin.pelatih.index', compact('pelatih'));
    }
    public function create(Pelatih $pelatih)
    {
        return view('admin.pelatih.create-edit', compact('pelatih'));
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
        $location = 'admin/pelatih';
        $file->move($location, $nama_file);

        Pelatih::create([
            'gambar' => $nama_file,
            'nama' => Str::headline($request->nama),
            'deskripsi' => Str::headline($request->deskripsi)
        ]);



        return redirect()->route('pelatih.index')->with('success', 'data berhasil ditambahkan');
    }
    public function edit(Pelatih $pelatih)
    {
        return view('admin.pelatih.create-edit', compact('pelatih'));
    }
    public function update(Request $request, Pelatih $pelatih)
    {
        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $location = 'admin/pelatih';
            $file->move($location, $nama_file);

            Storage::delete($location, $nama_file);

            $pelatih->update([
                'gambar' => $nama_file,
                'nama' => Str::headline($request->nama),
                'deskripsi' => Str::headline($request->deskripsi)
            ]);

            // $pelatih = pelatih::findOrFail($id);
            // $pelatih->$request->nama_file;
            // $pelatih->$request->Str::headline($request->nama);
            // $pelatih->$request->Str::headline($request->deskripsi);
            // $pelatih->save();
        } else {
            $pelatih->update([
                'nama' => Str::headline($request->nama),
                'deskripsi' => Str::headline($request->deskripsi)
            ]);
        }
        return redirect()->route('pelatih.index')->with('success', 'data berhasil diupdate');
    }
    public function destroy(Pelatih $pelatih)
    {
        $pelatih->delete();
        return redirect()->route('pelatih.index')->with('success', 'data berhasil dihapus');
    }
}
