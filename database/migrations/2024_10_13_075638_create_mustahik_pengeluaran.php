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
        Schema::create('mustahik_pengeluaran', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mustahik_id')->constrained('mustahik')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('konsumsi_pangan', 15, 2)->nullable();
            $table->tinyInteger('jenis_konsumsi_pangan')->default(0); 
            $table->decimal('konsumsi_rokok', 15, 2)->nullable();
            $table->tinyInteger('jenis_konsumsi_rokok')->default(0); 
            $table->decimal('pakaian_kebersihan', 15, 2)->nullable();
            $table->tinyInteger('jenis_pakaian_kebersihan')->default(0); 
            $table->decimal('komunikasi', 15, 2)->nullable();
            $table->tinyInteger('jenis_komunikasi')->default(0); 
            $table->decimal('transportasi', 15, 2)->nullable();
            $table->tinyInteger('jenis_transportasi')->default(0); 
            $table->decimal('biaya_sewa', 15, 2)->nullable();
            $table->tinyInteger('jenis_biaya_sewa')->default(0); 
            $table->decimal('biaya_sekolah', 15, 2)->nullable();
            $table->tinyInteger('jenis_biaya_sekolah')->default(0); 
            $table->decimal('biaya_kesehatan', 15, 2)->nullable();
            $table->tinyInteger('jenis_biaya_kesehatan')->default(0); 
            $table->decimal('angsuran_kredit', 15, 2)->nullable();
            $table->tinyInteger('jenis_angsuran_kredit')->default(0); 
            $table->string('keterangan_angsuran_kredit')->nullable();

            $table->tinyInteger('kategori_pengeluaran')->nullable(); 
            $table->tinyInteger('tabungan_bank')->default(0); 
            $table->tinyInteger('memiliki_bpjs')->default(0); 
            $table->string('keterangan_bpjs')->nullable();
            $table->tinyInteger('asuransi_pendidikan')->default(0); 
            $table->string('keterangan_asuransi_pendidikan')->nullable();
            $table->tinyInteger('deposito')->default(0); 
            $table->string('keterangan_deposito')->nullable();
            $table->tinyInteger('jenis_biaya_listrik_air_gas')->default(0); 
            $table->decimal('biaya_listrik_air_gas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik_pengeluaran');
    }
};
