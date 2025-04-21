<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'organisasi_anggaran';
    protected $fillable = [
        'organisasi_id',
        'anggaran',
    ];
}
