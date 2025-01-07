<?php

namespace App\Http\Controllers\Api\V1\KendaraanApi;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class KendaraanApiController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::all();

        if($kendaraan) {
            return ResponseFormatter::success([
                'result' => $kendaraan
            ], 'Data Kendaraan berhasil diambil');
            
        } else {
            return ResponseFormatter::error([
                'result' => $kendaraan
            ], 'Data Kendaraan tidak ditemukan', 404);
            
        }
    }
}
