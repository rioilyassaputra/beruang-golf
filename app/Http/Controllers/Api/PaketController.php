<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaketResource;
use App\Models\Paket;

class PaketController extends Controller
{
    public function index()
    {
        return PaketResource::collection(Paket::all());
    }

    public function show(Paket $paket)
    {
        return new PaketResource($paket);
    }
}
