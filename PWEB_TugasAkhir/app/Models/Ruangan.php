<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_ruangan',
        'kode_ruangan',
        'lokasi',
        'kapasitas',
        'fasilitas',
        'status',
        'foto'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
