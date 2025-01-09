<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('batubara', function (Blueprint $table) {
            $table->id();
            $table->string('HBA');
            $table->text('kalori')->nullable();
            $table->decimal('harga_per_ton', 12, 2);
            $table->timestamps();
        });
        
        
    }

    public function down()
    {
        Schema::dropIfExists('jenis_batu_bara');
    }
};
