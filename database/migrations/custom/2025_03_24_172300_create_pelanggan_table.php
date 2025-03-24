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
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id')->constrained('kecamatan')->onDelete('cascade');
            $table->foreignId('desa_id')->constrained('desa')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->foreignId('area_distrik_id')->constrained('area_distrik')->onDelete('cascade');
            $table->foreignId('sub_area_distrik_id')->constrained('sub_area_distrik')->onDelete('cascade');
            $table->string('jenis_pelanggan');
            $table->string('nomor_pelanggan')->unique();
            $table->string('nomor_meteran')->unique();
            $table->string('nomor_kk')->unique();
            $table->string('nomor_sertifikat')->nullable();
            $table->string('nomor_telp');
            $table->string('nama');
            $table->string('nik')->unique();
            $table->text('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('nomor_rumah');
            $table->string('gang')->nullable();
            $table->string('blok')->nullable();
            $table->decimal('luas_bangunan', 10, 2)->nullable();
            $table->string('jenis_hunian');
            $table->integer('kebutuhan_air_awal');
            $table->integer('kran_diminta');
            $table->string('kwh_pln')->nullable();
            $table->string('status_kepemilikan');
            $table->string('file_sertifikat')->nullable();
            $table->string('file_ktp')->nullable();
            $table->string('file_kk')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->json('data_geojson')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggan');
    }
};
