<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('surat_perintah_kerja', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique();
            $table->date('tanggal_surat');
            $table->foreignId('vendor_id')->constrained('vendors');
            $table->text('alamat_vendor');
            $table->enum('perihal', [
                'pemasangan_sambungan_baru',
                'pemeliharaan_sambungan',
                'perbaikan_meter'
            ]);
            $table->foreignId('permohonan_id')->constrained('permohonan');
            $table->string('nama_pemohon');
            $table->text('alamat_pemohon');
            $table->string('nomor_telp_pemohon');
            $table->string('titik_koordinat');
            $table->integer('waktu_kerja');
            $table->date('masa_kerja');
            $table->text('keterangan')->nullable();
            $table->enum('status', ['draft', 'dikirim', 'disetujui', 'ditolak'])->default('draft');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surat_perintah_kerja');
    }
};