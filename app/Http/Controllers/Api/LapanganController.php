<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\LapanganResource;
use App\Models\Lapangan;

class LapanganController extends Controller
{
    public function index()
    {
        return LapanganResource::collection(Lapangan::latest()->get());
    }
}
