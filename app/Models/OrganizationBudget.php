<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationBudget extends Model
{
    protected $table = 'organisasi_anggaran';
    protected $fillable = [
        'nama_anggaran',
        'user_id',
        'divisi_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function divisi()
    {
        return $this->belongsTo(OrganizationDivision::class, 'divisi_id');
    }
    public function budgetsDetail()
    {
        return $this->hasMany(OrganizationBudgetsDetail::class, 'anggaran_id');
    }
}
