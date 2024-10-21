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
        Schema::create('mustahik_keluarga', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mustahik_id')->constrained('mustahik')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('status_pernikahan');
            $table->tinyInteger('jumlah_anggota');
            $table->tinyInteger('usia_kepala');
            $table->tinyInteger('anggota_hamil');
            $table->tinyInteger('anak_usia_sekolah');
            $table->tinyInteger('orang_tua_uzur');
            $table->tinyInteger('anggota_penyakit_berat');
            $table->tinyInteger('anggota_cacat_fisik');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik_keluarga');
    }
};
