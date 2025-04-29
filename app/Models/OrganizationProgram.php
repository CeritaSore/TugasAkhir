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
        'pelaksana',
        'status'
    ];
    public function budgets()
    {
        return $this->hasOne(OrganizationBudget::class, 'program_id');
    }
    public function pics()
    {
        return $this->belongsTo(OrganizationCoreTeam::class, 'pelaksana');
    }
}
