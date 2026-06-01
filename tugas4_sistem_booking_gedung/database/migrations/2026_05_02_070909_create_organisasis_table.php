<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

public function up(): void
{
    Schema::create('organisasis', function (Blueprint $table) {
        $table->id();

        // 1. Tambahkan penghubung ke tabel users
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

        // 2. Kolom informasi organisasi (Username, Password, Email DIHAPUS dari sini)
        $table->string('jenis_organisasi');
        $table->string('nama_organisasi');
        $table->string('nama_ketua');
        $table->string('no_hp');
        $table->integer('jumlah_pengurus');
        $table->boolean('is_aktif')->default(true);
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('organisasis');
    }
};
