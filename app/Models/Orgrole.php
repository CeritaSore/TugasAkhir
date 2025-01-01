<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orgrole extends Model
{
    protected $table = 'org_roles';
    protected $fillable = ['role'];
}
