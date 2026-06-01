<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gedung extends Model
{
    public function organisasis()
    {
        return $this->belongsToMany(Organisasi::class, 'pivot_organisasigedung');
    }
}
