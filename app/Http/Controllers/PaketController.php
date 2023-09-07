<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Paket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::all();
        return view('admin.paket.index', compact('paket'));
    }
    public function create(Paket $paket)
    {
        $lapangan = Lapangan::all();
        return view('admin.paket.create-edit', compact('paket', 'lapangan'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required',
            'nama' => 'required',
            'id_lapangan' => 'required',
            'deskripsi' => 'required',
            'jumlah_pemain' => 'required',
            'harga' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $location = 'admin/paket';
        $file->move($location, $nama_file);

        Paket::create([
            'gambar' => $nama_file,
            'nama' => Str::headline($request->nama),
            'deskripsi' => Str::headline($request->deskripsi),
            'id_lapangan' => $request->id_lapangan,
            'jumlah_pemain' => $request->jumlah_pemain,
            'harga' => $request->harga,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);



        return redirect()->route('paket.index')->with('success', 'data berhasil ditambahkan');
    }
    public function edit(Paket $paket)
    {
        $lapangan = Lapangan::all();
        return view('admin.paket.create-edit', compact('paket', 'lapangan'));
    }
    public function update(Request $request, Paket $paket)
    {
        if ($request->hasfile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $location = 'admin/paket';
            $file->move($location, $nama_file);

            Storage::delete($location, $nama_file);

            $paket->update([
                'gambar' => $nama_file,
                'nama' => Str::headline($request->nama),
                'deskripsi' => Str::headline($request->deskripsi),
                'id_lapangan' => $request->id_lapangan,
                'jumlah_pemain' => $request->jumlah_pemain,
                'harga' => $request->harga,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
            ]);

            // $paket = paket::findOrFail($id);
            // $paket->$request->nama_file;
            // $paket->$request->Str::headline($request->nama);
            // $paket->$request->Str::headline($request->deskripsi);
            // $paket->save();
        } else {
            $paket->update([
                'nama' => Str::headline($request->nama),
                'deskripsi' => Str::headline($request->deskripsi),
                'id_lapangan' => $request->id_lapangan,
                'jumlah_pemain' => $request->jumlah_pemain,
                'harga' => $request->harga,
                'jam_mulai' => $request->jam_mulai,
                'jam_selesai' => $request->jam_selesai,
            ]);
        }
        return redirect()->route('paket.index')->with('success', 'data berhasil diupdate');
    }
    public function destroy(Paket $paket)
    {
        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'data berhasil dihapus');
    }
}
