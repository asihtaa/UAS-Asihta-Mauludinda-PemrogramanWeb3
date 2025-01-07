<?php

namespace App\Http\Controllers\Api\V1\BatubaraApi;

use App\Models\Batubara;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;

class BatubaraApiController extends Controller
{
    public function index()
    {
        $batubara = Batubara::all();

        if($batubara) {
            return ResponseFormatter::success([
                'result' => $batubara
            ], 'Data barang berhasil diambil');
            
        } else {
            return ResponseFormatter::error([
                'result' => $batubara
            ], 'Data barang tidak ditemukan', 404);
        }
    }
}
