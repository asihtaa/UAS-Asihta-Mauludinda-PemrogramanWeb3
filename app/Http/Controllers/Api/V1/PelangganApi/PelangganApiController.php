<?php

namespace App\Http\Controllers\Api\V1\PelangganApi;

use App\Helpers\ResponseFormatter;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelangganApiController extends Controller
{

    public function index()
    {
        $pelanggan = Pelanggan::all();

        if($pelanggan) {
            return ResponseFormatter::success([
                'result' => $pelanggan
            ], 'Data Pelanggan berhasil diambil');
        } else {
            return ResponseFormatter::error([
                'result' => $pelanggan
            ], 'Data Pelanggan tidak ditemukan', 404);
        }
    }
}
