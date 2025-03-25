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
        Schema::create('gelombang_spks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatan_id')->constrained('kecamatan')->onDelete('cascade');
            $table->foreignId('desa_id')->constrained('desa')->onDelete('cascade');
            $table->foreignId('area_distrik_id')->constrained('area_distrik')->onDelete('cascade');
            $table->foreignId('sub_area_distrik_id')->constrained('sub_area_distrik')->onDelete('cascade');
            $table->foreignId('spks_id')->constrained('spks')->onDelete('cascade');
            $table->string('nomor_spks_global');
            $table->string('nomor_spks_terakhir');
            $table->string('nomor_spks_terbaru');
            $table->text('alamat');
            $table->string('unit');
            $table->integer('kuota_gelombang');
            $table->text('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gelombang_spks');
    }
};
