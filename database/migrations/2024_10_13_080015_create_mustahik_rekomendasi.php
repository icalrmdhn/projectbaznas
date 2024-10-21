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
        Schema::create('mustahik_rekomendasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mustahik_id')->constrained('mustahik')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('akurasi_alamat')->nullable();
            $table->tinyInteger('kelayakan_mustahik')->nullable();
            $table->text('analisis_rekomendasi')->nullable()->comment('Analisis dan rekomendasi surveyor');
            $table->string('kode_koordinat')->nullable()->comment('Kode titik koordinat (Share Lokasi Google Maps)');
            $table->text('signed_disurvey')->nullable()->comment('Paraf yang disurvey');
            $table->text('signed_koordinator')->nullable()->comment('Paraf koordinator survey');
            $table->text('signed_surveyor')->nullable()->comment('Paraf surveyor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik_rekomendasi');
    }
};
