<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthApi\EditApiController;
use App\Http\Controllers\Api\V1\AuthApi\LoginApiController;
use App\Http\Controllers\Api\V1\AuthApi\LogoutApiController;
use App\Http\Controllers\Api\V1\AuthApi\RegisterApiController;
use App\Http\Controllers\Api\V1\BatubaraApi\BatubaraApiController;
use App\Http\Controllers\Api\V1\PelangganApi\PelangganApiController;
use App\Http\Controllers\Api\V1\KendaraanApi\KendaraanApiController;
use App\Http\Controllers\Api\V1\GudangApi\GudangApiController;


Route::prefix('v1')->group(function () {
    Route::post('/register', RegisterApiController::class)->name('user.register');
    Route::post('/login', LoginApiController::class)->name('user.login');
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', LogoutApiController::class)->name('user.logout');
    Route::post('/user/edit', EditApiController::class)->name('user.edit');

    // Batubara
    Route::get('/batubara', [BatubaraApiController::class, 'index'])->name('batubara.index');

    // pelanggan
    Route::get('/pelanggan', [PelangganApiController::class, 'index'])->name('pelanggan.index');

    // Kendaraan   
    Route::get('/kendaraan', [KendaraanApiController::class, 'index'])->name('kendaraaan.index');

    // Gudang   
    Route::get('/gudang', [GudangApiController::class, 'index'])->name('gudang.index');


  
});