<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PelangganController;   
use App\Http\Controllers\GudangController; 
use App\Http\Controllers\ProfileController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Http\Controllers\BatubaraController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\LaporanPerhariController;
use App\Http\Controllers\LaporanPerbulanController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/edit-password', [ProfileController::class, 'changePassword'])->name('profile.edit-password');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    // Route kendaraan
    Route::controller(KendaraanController::class)->group(function () {
        Route::get('kendaraan', 'index')->name('kendaraan.index');
        Route::get('kendaraan/create', 'create')->name('kendaraan.create');
        Route::post('kendaraan/store', 'store')->name('kendaraan.store');
        // Route::get('kendaraan/{id}', 'show')->name('kendaraan.show');
        Route::get('kendaraan/{id}/edit', 'edit')->name('kendaraan.edit');
        Route::put('kendaraan/{id}', 'update')->name('kendaraan.update');
        Route::delete('kendaraan/delete/{id}', 'destroy')->name('kendaraan.destroy');
        Route::get('/kendaraan/data', 'data')->name('kendaraan.data');
    });

     // Route Pelaggan
     Route::controller(PelangganController::class)->group(function () {
        Route::get('pelanggan', 'index')->name('pelanggan.index');
        Route::get('pelanggan/create', 'create')->name('pelanggan.create');
        Route::post('pelanggan/store', 'store')->name('pelanggan.store');
        // Route::get('pelanggan/{id}', 'show')->name('pelanggan.show');
        Route::get('pelanggan/{id}/edit', 'edit')->name('pelanggan.edit');
        Route::put('pelanggan/{id}', 'update')->name('pelanggan.update');
        Route::delete('pelanggan/delete/{id}', 'destroy')->name('pelanggan.destroy');
        Route::get('/pelanggan/data', 'data')->name('pelanggan.data');
    });

     // Route Gudang
     Route::controller(gudangController::class)->group(function () {
        Route::get('gudang', 'index')->name('gudang.index');
        Route::get('gudang/create', 'create')->name('gudang.create');
        Route::post('gudang/store', 'store')->name('gudang.store');
        // Route::get('gudang/{id}', 'show')->name('gudang.show');
        Route::get('gudang/{id}/edit', 'edit')->name('gudang.edit');
        Route::put('gudang/{id}', 'update')->name('gudang.update');
        Route::delete('gudang/delete/{id}', 'destroy')->name('gudang.destroy');
        Route::get('/gudang/data', 'data')->name('gudang.data');
    });

    // Route SuratJalan
    Route::controller(SuratJalanController::class)->group(function () {
        Route::get('suratjalan', 'index')->name('suratjalan.index');
        Route::get('suratjalan/create', 'create')->name('suratjalan.create');
        Route::post('suratjalan/store', 'store')->name('suratjalan.store');
        // Route::get('suratjalan/{id}', 'show')->name('suratjalan.show');
        Route::get('suratjalan/{id}/edit', 'edit')->name('suratjalan.edit');
        Route::put('suratjalan/{id}', 'update')->name('suratjalan.update');
        Route::delete('suratjalan/delete/{id}', 'destroy')->name('suratjalan.destroy');
        Route::get('/suratjalan/data', 'data')->name('suratjalan.data');
        Route::get('/suratjalan/autofill/{id}', [SuratJalanController::class, 'autofill'])->name('suratjalan.autofill');
    });

    // Route Batubara
    Route::controller(BatubaraController::class)->group(function () {
        Route::get('batubara', 'index')->name('batubara.index');
        Route::get('batubara/create', 'create')->name('batubara.create');
        Route::post('batubara/store', 'store')->name('batubara.store');
        // Route::get('batubara/{id}', 'show')->name('batubara.show');
        Route::get('batubara/{id}/edit', 'edit')->name('batubara.edit');
        Route::put('batubara/{id}', 'update')->name('batubara.update');
        Route::delete('batubara/delete/{id}', 'destroy')->name('batubara.destroy');
        Route::get('/batubara/data', 'data')->name('batubara.data');
    });

    // Route Barang
    Route::controller(BarangController::class)->group(function () {
        Route::get('barang', 'index')->name('barang.index');
        Route::get('barang/create', 'create')->name('barang.create');
        Route::post('barang/store', 'store')->name('barang.store');
        // Route::get('barang/{id}', 'show')->name('barang.show');
        Route::get('barang/{id}/edit', 'edit')->name('barang.edit');
        Route::put('barang/{id}', 'update')->name('barang.update');
        Route::delete('barang/delete/{id}', 'destroy')->name('barang.destroy');
        Route::get('/barang/data', 'data')->name('barang.data');
        Route::get('barangcetak_pdf/{id}', 'cetakPdf')->name('barangcetakpdf.cetakpdf');
    });

    // Route User
    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'index')->name('user.index');
        Route::get('user/create', 'create')->name('user.create');
        Route::post('user/store', 'store')->name('user.store');
        // Route::get('user/{id}', 'show')->name('user.show');
        Route::get('user/{id}/edit', 'edit')->name('user.edit');
        Route::put('user/{id}', 'update')->name('user.update');
        Route::delete('user/delete/{id}', 'destroy')->name('user.destroy');
        Route::get('/user/data', 'data')->name('user.data');
    });

    // Route Role
    Route::controller(RoleController::class)->group(function () {
        Route::get('role', 'index')->name('role.index');
        Route::get('role/create', 'create')->name('role.create');
        Route::post('role/store', 'store')->name('role.store');
        // Route::get('role/{id}', 'show')->name('role.show');
        Route::get('role/{id}/edit', 'edit')->name('role.edit');
        Route::put('role/{id}', 'update')->name('role.update');
        Route::delete('role/delete/{id}', 'destroy')->name('role.destroy');
        Route::get('/role/data', 'data')->name('role.data');
    });

    // Route Laporan Perhari
    Route::controller(LaporanPerhariController::class)->group(function () {
        Route::get('laporan-perhari', 'index')->name('laporan-perhari.index');
        // Route::get('laporan-perhari/create', 'create')->name('laporan-perhari.create');
        // Route::post('laporan-perhari/store', 'store')->name('laporan-perhari.store');
        // Route::get('laporan-perhari/{id}', 'show')->name('laporan-perhari.show');
        Route::get('laporan-perhari/{id}/edit', 'edit')->name('laporan-perhari.edit');
        // Route::put('laporan-perhari/{id}', 'update')->name('laporan-perhari.update');
        // Route::delete('laporan-perhari/delete/{id}', 'destroy')->name('laporan-perhari.destroy');
        Route::get('/laporan-perhari/data', 'data')->name('laporan-perhari.data');
        Route::get('laporan-perhari/{id}', 'listBarang')->name('laporan-perhari.show'); // inihalaman list barang
        Route::get('/laporan-perhari/list-barang/dataListBarang', 'dataListBarang')->name('list-barang.dataListBarang');
    });

    // Route Laporan Perbulan
    Route::controller(LaporanPerbulanController::class)->group(function () {
        Route::get('laporan-perbulan', 'index')->name('laporan-perbulan.index');
        // Route::get('laporan-perbulan/create', 'create')->name('laporan-perbulan.create');
        // Route::post('laporan-perbulan/store', 'store')->name('laporan-perbulan.store');
        // Route::get('laporan-perbulan/{id}', 'show')->name('laporan-perbulan.show');
        // Route::get('laporan-perbulan/{id}/edit', 'edit')->name('laporan-perbulan.edit');
        // Route::put('laporan-perbulan/{id}', 'update')->name('laporan-perbulan.update');
        // Route::delete('laporan-perbulan/delete/{id}', 'destroy')->name('laporan-perbulan.destroy');
        Route::get('/laporan-perbulan/data', 'data')->name('laporan-perbulan.data');
    });
});


// Route::get('qrcode', function () {

//     return QrCode::size(300)->generate('A basic example of QR code!');
// });
require __DIR__ . '/auth.php';
