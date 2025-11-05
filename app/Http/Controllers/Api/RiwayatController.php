<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\User;
use App\Http\Resources\ReservasiResource;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $riwayat = $user->reservasis()->with('paket')->latest()->get();

        return ReservasiResource::collection($riwayat);
    }
}
