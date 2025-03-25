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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jabatan_id')->constrained('jabatan')->onDelete('restrict');
            $table->foreignId('tempat_id')->constrained('tempat')->onDelete('restrict');
            $table->foreignId('user_id')->constrained('users')->onDelete('restrict');
            $table->string('nik')->unique();
            $table->string('nip')->unique();
            $table->string('jabatan');
            $table->date('periode_masuk');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('nomor_tlp');
            $table->string('nomor_bpjs')->nullable();
            $table->string('nomor_npwp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
