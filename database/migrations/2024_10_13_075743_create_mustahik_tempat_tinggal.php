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
        Schema::create('mustahik_tempat_tinggal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mustahik_id')->constrained('mustahik')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('kepemilikan_tempat_tinggal');
            $table->tinyInteger('bentuk_bangunan');
            $table->tinyInteger('desain_bangunan');
            $table->tinyInteger('lokasi_rumah');
            $table->tinyInteger('tata_letak_lingkungan');
            $table->tinyInteger('akses_rumah_ke_jalan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik_tempat_tinggal');
    }
};
