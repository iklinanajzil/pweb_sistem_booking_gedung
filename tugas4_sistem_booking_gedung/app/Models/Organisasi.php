<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organisasi extends Model
{
    /**
     * Atribut yang dapat diisi secara massal.
     * 'user_id' ditambahkan sebagai penghubung ke tabel users.
     */
    protected $fillable = [
        'user_id',
        'jenis_organisasi',
        'nama_organisasi',
        'nama_ketua',
        'no_hp',
        'jumlah_pengurus',
        'is_aktif',
        'foto_profil'
    ];

    /**
     * Konversi tipe data otomatis.
     */
    protected $casts = [
        'jumlah_pengurus' => 'integer',
        'is_aktif' => 'boolean',
    ];

    /**
     * Relasi balik ke User (Satu profil Organisasi dimiliki oleh satu User)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk memfilter organisasi yang sedang aktif.
     */
    public function scopeAktif(Builder $query): void
    {
        $query->where('is_aktif', true);
    }

    /**
     * Relasi Many-to-Many ke Gedung melalui tabel pivot.
     */
    public function gedungs()
    {
        return $this->belongsToMany(Gedung::class, 'pivot_organisasigedung');
    }
}
