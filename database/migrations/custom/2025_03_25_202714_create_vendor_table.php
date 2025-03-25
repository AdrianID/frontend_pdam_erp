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
        Schema::create('vendor', function (Blueprint $table) {
            $table->id();
            $table->string('nama_vendor');
            $table->enum('jenis_vendor', ['jasa_pemasangan', 'jasa_perbaikan', 'pengadaan_barang']);
            $table->text('alamat');
            $table->string('telepon');
            $table->string('email')->nullable();
            $table->string('nomor_surat_perjanjian');
            $table->date('tanggal_surat_perjanjian');
            $table->string('file_surat_perjanjian')->nullable(); // untuk menyimpan path/file
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
            $table->integer('rating')->default(5);
            $table->text('keterangan')->nullable();
            $table->date('tanggal_bergabung')->nullable();
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendor');
    }
};