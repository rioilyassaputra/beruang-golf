<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReservasiResource extends JsonResource
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
             'email' => $this->email,
            'nama_paket' => $this->whenLoaded('id_paket', function () {
                return $this->paket->name;
            }),
            'no_telp' => $this->no_telp,
            'no_reservasi' => $this->no_reservasi,
            'tanggal' => $this->tanggal,
            'status' => $this->status,
            'id_user' => $this->user->id,
            'created_at' => $this->created_at->toIso8601String(),
        ];
    }
}
