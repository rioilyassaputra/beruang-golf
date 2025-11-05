<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BeritaResource;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        return BeritaResource::collection(Berita::latest()->get());
    }

    public function show(Berita $berita)
    {
        return new BeritaResource($berita);
    }
}
