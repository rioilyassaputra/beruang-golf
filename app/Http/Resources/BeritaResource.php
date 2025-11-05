<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BeritaResource extends JsonResource
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
            'judul' => $this->judul,
            'slug' => $this->slug,
            'gambar' => asset('admin/berita/' . $this->gambar),
            'Deskripsi' => $this->Deskripsi,
            'created_at' => $this->created_at->toIso8601String(),
            // 'komentar' => KomentarResource::collection($this->whenLoaded('komentar')),
        ];
    }
}
