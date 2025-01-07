<?php

namespace App\Http\Controllers\Api\V1\GudangApi;

use App\Models\Gudang;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class GudangApiController extends Controller
{
    public function index()
    {
        $gudang = Gudang::all();

        if($gudang) {
            return ResponseFormatter::success([
                'result' => $gudang
            ], 'Data Gudang berhasil diambil');
            
        } else {
            return ResponseFormatter::error([
                'result' => $gudang
            ], 'Data Gudang tidak ditemukan', 404);
            
        }
    }
}
