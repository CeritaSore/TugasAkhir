<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    //
    protected $table = "pengurus";
    protected $fillable = ["nama","nim","prodi","jabatan"];
}
