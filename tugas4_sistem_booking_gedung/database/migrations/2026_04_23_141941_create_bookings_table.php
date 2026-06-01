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

        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking')->unique();
            $table->string('nama_gedung');
            $table->string('organisasi');
            $table->dateTime("tanggal_pengajuan");
            $table->string('kategori_kegiatan');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('proposal')->nullable();
            $table->string('surat_izin')->nullable();
            $table->text('keterangan');
            $table->string('status')->default('Menunggu');
            $table->timestamps();
});
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
