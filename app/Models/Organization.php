<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $table = 'organisasi';
    protected $fillable = [
        'nama',
        'deskripsi',
        'foto',
        'tanggal_berdiri',
        'status',
        'tipe_organisasi'
    ];
}
