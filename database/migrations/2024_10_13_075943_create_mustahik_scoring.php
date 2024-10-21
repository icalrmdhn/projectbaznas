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
        Schema::create('mustahik_scoring', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mustahik_id')->constrained('mustahik')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('total_nilai')->comment('Total nilai scoring');
            $table->decimal('nilai_akhir', 4, 2)->comment('Nilai akhir setelah perhitungan');
            $table->boolean('rekomendasi_scoring')->default(false)->comment('1: Ya, 0: Tidak');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik_scoring');
    }
};
