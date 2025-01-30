<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orgcoreteam extends Model
{
    //
    protected $table = 'org_coreteam';
    protected $fillable = ['org_id', 'user_id', 'role_id'];
    public static function addCoreteam($data)
    {
        $coreteam = new Orgcoreteam();
        $coreteam->org_id = $data['org_id'];
        $coreteam->user_id = $data['user_id'];
        $coreteam->role_id = $data['role_id'];
        $coreteam->save();
        return $coreteam;
    }


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
