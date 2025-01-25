<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orgcoreteam extends Model
{
    //
    protected $table = 'org_coreteam';
    protected $fillable = ['org_id', 'user_id', 'role_id'];
    
}
