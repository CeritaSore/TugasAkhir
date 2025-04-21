<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationProgram extends Model
{
    protected $table = 'organisasi_program';
    protected $fillable = [
        'nama_program',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'tempat',
        'anggaran',
        'pelaksana',
        'status'
    ];
}
