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
        Schema::create('mustahik_penghasilan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mustahik_id')->constrained('mustahik')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jumlah_utama_kepala')->nullable();
            $table->tinyInteger('penghasilan_utama_kepala');
            $table->string('penghasilan_anggota_2')->nullable();
            $table->tinyInteger('pekerjaan_anggota_2');
            $table->string('penghasilan_anggota_lain')->nullable();
            $table->tinyInteger('pekerjaan_anggota_lain');
            $table->string('pendapatan_aset_sewa')->nullable();
            $table->tinyInteger('jenis_aset_sewa');
            $table->tinyInteger('jenis_bantuan_pendidikan');
            $table->string('pendapatan_bulanan_lain')->nullable();
            $table->tinyInteger('jenis_pendapatan_lain');
            $table->tinyInteger('kategori_penghasilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik_penghasilan');
    }
};
