<?php

namespace App\Http\Controllers;

use App;
use PDF;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\Paket;
use App\Models\Reservasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReservasiController extends Controller
{
    public function index(Reservasi $reservasi)
    {
        $pesanan = Reservasi::latest()->paginate(5);
        return view('admin.reservasi.index', compact('reservasi', 'pesanan'));
    }
    public function create(Reservasi $reservasi)
    {
        $paket = Paket::all();
        return view('admin.reservasi.create-edit', compact('reservasi', 'paket'));
    }
    public function reservasiuser(Request $request)
    {
        $noakhir = Reservasi::max('id');
        $tgl = date('d-m-y');
        if ($noakhir < 1) {
            $no_reservasi = 'Puncak Golf' . '/' . '1' . '/' . $tgl;
        } else {
            $no_reservasi = 'Puncak Golf' . '/' . $noakhir++ . '/' . $tgl;
        }
        $request->validate([
            'nama' => 'required',
            'id_paket' => 'required',
            'no_telp' => 'required',
            'tanggal' => 'required',
            'email' => 'required|email',
        ]);

        $no_hp = $request->no_telp;
        $no_hp = trim($no_hp);
        $no_hp = strip_tags($no_hp);
        $no_hp = str_replace(" ", "", $no_hp);
        $no_hp = str_replace("(", "", $no_hp);
        $no_hp = str_replace(".", "", $no_hp);
        if (!preg_match('/[^+0-9]/', trim($no_hp))) {
            if (substr(trim($no_hp), 0, 3) == '62') {
                $no_hp = trim($no_hp);
            } elseif (substr($no_hp, 0, 1) == '0') {
                $no_hp = '62' . substr($no_hp, 1);
            }
        }


        $paketId = $request->id_paket;
        $paket = Paket::find($paketId);

        $data = [
            'nama' => Str::headline($request->nama),
            'id_paket' => $paketId,
            'no_telp' => $no_hp,
            'no_reservasi' => $no_reservasi,
            'tanggal' => $request->tanggal,
            'status' => 'pending',
            'email' => $request->email,
            'id_user' => Auth::user()->id,
        ];
        if ($paket) {
            // Menambahkan harga ke dalam data yang akan disimpan
            $data['harga'] = $paket->harga;
        }
        Reservasi::create($data);



        return redirect()->route('sukses')->with('success', 'data berhasil ditambahkan');
    }
    public function edit(Reservasi $reservasi)
    {
        $paket = Paket::all();
        return view('admin.reservasi.create-edit', compact('paket', 'reservasi'));
    }
    public function update(Request $request, Reservasi $reservasi)
    {
        $jumlahReservasi = Reservasi::where('id_paket', $request->id_paket)->where('status', 'konfirm')
            ->whereDate('tanggal', $request->tanggal)
            ->count();

        // Cek apakah jumlah reservasi melebihi batasan (3 kali)
        if ($jumlahReservasi >= 3) {
            // Reservasi melebihi batasan, berikan pesan kesalahan
            return redirect()->back()->with('error', 'Maaf, paket ini telah dipesan maksimal 3 kali pada tanggal yang sama.');
        }

        $noakhir = Reservasi::max('id');
        $tgl = date('d-m-y');
        if ($noakhir < 1) {
            $no_reservasi = 'Puncak Golf' . '/' . '1' . '/' . $tgl;
        } else {
            $no_reservasi = 'Puncak Golf' . '/' . $noakhir++ . '/' . $tgl;
        }
        $request->validate([
            'nama' => 'required',
            'id_paket' => 'required',
            'no_telp' => 'required',
            'tanggal' => 'required',
            'email' => 'required|email',
        ]);

        $no_hp = $request->no_telp;
        $no_hp = trim($no_hp);
        $no_hp = strip_tags($no_hp);
        $no_hp = str_replace(" ", "", $no_hp);
        $no_hp = str_replace("(", "", $no_hp);
        $no_hp = str_replace(".", "", $no_hp);
        if (!preg_match('/[^+0-9]/', trim($no_hp))) {
            if (substr(trim($no_hp), 0, 3) == '62') {
                $no_hp = trim($no_hp);
            } elseif (substr($no_hp, 0, 1) == '0') {
                $no_hp = '62' . substr($no_hp, 1);
            }
        }


        $paketId = $request->id_paket;

        $reservasi->update([
            'nama' => Str::headline($request->nama),
            'id_paket' => $paketId,
            'no_telp' => $no_hp,
            'no_reservasi' => $no_reservasi,
            'tanggal' => $request->tanggal,
            'email' => $request->email,
            'harga' => $request->harga,
        ]);


        return redirect()->route('reservasi.index')->with('success', 'data berhasil diupdate');
    }
    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();
        return redirect()->route('reservasi.index')->with('success', 'data berhasil dihapus');
    }

    public function confirm(Request $request, $id)
    {
        $request->validate([
            'bukti_pembayaran' => 'required',
        ]);

        $file = $request->file('bukti_pembayaran');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $location = 'admin/bukti_pembayaran';
        $file->move($location, $nama_file);

        $reservasiId = $request->input('id');

        $reservasi = Reservasi::find($reservasiId);

        if (!$reservasi) {
            return back()->with(['error' => 'Reservasi tidak ditemukan']);
        }

        $reservasi = Reservasi::where('id', $reservasiId)->update([
            'status'     => 'konfirm',
            'bukti_pembayaran'     => $nama_file,
        ]);
        // dd($reservasi);

        if ($reservasi) {
            return back()->with(['success' => 'Reservasi telah di konfirmasi!']);
        } else {
            return back()->with(['error' => 'Gagal mengkonfirmasi reservasi.']);
        }
    }

    public function pdf()
    {
        // $pdf = App::make('dompdf.wrapper');
        $reservasi = Reservasi::all()->sortByDesc('id')->take('1');
        // dd($reservasi);
        $pdf = PDF::loadview('admin.reservasi.pdf', compact('reservasi'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a5', 'landscape');
        return $pdf->download('bukti_pemesanan.pdf');
    }
}
