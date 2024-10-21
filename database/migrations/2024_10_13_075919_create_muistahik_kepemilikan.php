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
        Schema::create('mustahik_kepemilikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mustahik_id')->constrained('mustahik')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('kendaraan_transportasi');
            $table->tinyInteger('usaha_dagang_produksi');
            $table->tinyInteger('usaha_sampingan_jasa');
            $table->tinyInteger('usaha_pendapatan_sewa_aktiva');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik_kepemilikan');
    }
};
