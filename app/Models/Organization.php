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
    public function pengurus()
    {
        return $this->hasMany(OrganizationCoreTeam::class, 'organisasi_id', 'id');
    }
    public function event()
    {
        return $this->hasMany(Event::class, 'organisasi_id', 'id');
    }
    public function program()
    {
        return $this->hasMany(OrganizationProgram::class, 'organisasi_id', 'id');
    }
}
