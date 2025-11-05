<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PelatihResource;
use App\Models\Pelatih;

class PelatihController extends Controller
{
    public function index()
    {
        return PelatihResource::collection(Pelatih::all());
    }

    public function show(Pelatih $pelatih)
    {
        return new PelatihResource($pelatih);
    }
}
