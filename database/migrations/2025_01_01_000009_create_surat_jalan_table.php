<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_jalan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique();
            $table->date('tanggal_surat');
            $table->foreignId('id_pelanggan')->constrained('pelanggan');
            $table->foreignId('id_kendaraan')->constrained('kendaraan');
            $table->foreignId('id_jenis_batu_bara')->constrained('batubara');
            $table->foreignId('id_gudang')->constrained('gudang');
            $table->decimal('jumlah_ton', 10, 2);
            $table->decimal('total_harga', 15, 2);
            $table->enum('status', ['draft', 'dikonfirmasi', 'dikirim', 'selesai']);
            $table->foreignId('id_role')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_jalan');
    }
};

