<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'id_lapangan' => $this->id_lapangan,
            'deskripsi' => $this->deskripsi,
            'gambar' => asset('storage/admin/paket' . $this->gambar),
            'jumlah_pemain' => $this->jumlah_pemain,
            'harga' => $this->harga,
            'jam_mulai' => $this->jam_mulai,
            'jam_selesai' => $this->jam_selesai,
            'price' => $this->price,
        ];
    }
}
