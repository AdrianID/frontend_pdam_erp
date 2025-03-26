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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained('pelanggan')->onDelete('cascade');
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade');
            $table->string('nomor_tagihan')->unique();
            $table->decimal('total_tagihan', 12, 2);
            $table->enum('status', [
                'draft',         // Tagihan belum diproses
                'issued',        // Tagihan sudah diterbitkan
                'paid',          // Lunas
                'overdue',       // Jatuh tempo
                'cancelled'      // Dibatalkan
            ])->default('draft');
            $table->date('tanggal_tagihan')->useCurrent();
            $table->date('tanggal_jatuh_tempo')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};