<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    'kode_booking', 'nama_gedung', 'organisasi', 'tanggal_pengajuan',
    'kategori_kegiatan', 'tgl_mulai', 'tgl_selesai', 'proposal',
    'surat_izin', 'keterangan', 'status'
];
}
