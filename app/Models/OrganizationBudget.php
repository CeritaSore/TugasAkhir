<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationBudget extends Model
{
    protected $table = 'organisasi_anggaran';
    protected $fillable = [
        'jumlah_anggaran',
        'program_id',
    ];
    public function proker()
    {
        return $this->belongsTo(OrganizationProgram::class, 'program_id');
    }
}
