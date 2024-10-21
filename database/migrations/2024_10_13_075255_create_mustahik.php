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
        Schema::create('mustahik', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mustahik');
            $table->string('nama_kepala_keluarga');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->integer('usia');
            $table->string('no_ktp_kk');
            $table->text('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('kelurahan');
            $table->string('kelurahan_id');
            $table->string('kecamatan');
            $table->string('kecamatan_id');
            $table->string('kota');
            $table->string('kota_id');
            $table->string('no_telp');
            $table->string('pekerjaan');
            $table->string('agama');
            $table->string('nama_diwawancarai');
            $table->string('no_telp_diwawancarai');
            $table->string('hubungan');
            $table->string('nomor_index');
            $table->string('jenis_bantuan');
            $table->date('tanggal_survey');
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mustahik');
    }
};
