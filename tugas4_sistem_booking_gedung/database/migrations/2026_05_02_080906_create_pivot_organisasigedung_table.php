<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('pivot_organisasigedung', function (Blueprint $table) {
        $table->id();
        // Menghubungkan ke tabel organisasis
        $table->foreignId('organisasi_id')->constrained('organisasis')->onDelete('cascade');
        // Menghubungkan ke tabel gedungs
        $table->foreignId('gedung_id')->constrained('gedungs')->onDelete('cascade');

        // Kolom tambahan sesuai kebutuhan (opsional)
        $table->string('nama_kegiatan')->nullable();
        $table->date('tgl_acara')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('pivot_organisasigedung');
    }
};
