<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationCoreTeam extends Model
{
    protected $table = 'organisasi_pengurus';
    protected $fillable = ['user_id','role_id','organisasi_id','divisi_id'];
}
