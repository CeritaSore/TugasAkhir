<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationRole extends Model
{
    protected $table = 'organisasi_role';
    protected $fillable = [
        'role',
    ];
}
