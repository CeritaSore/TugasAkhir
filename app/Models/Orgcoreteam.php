<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orgcoreteam extends Model
{
    //
    protected $table = 'org_coreteam';
    protected $fillable = ['org_id', 'user_id', 'role_id'];


    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function role()
    {
        return $this->belongsTo(Orgrole::class, 'role_id');
    }
}
