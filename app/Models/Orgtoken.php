<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orgtoken extends Model
{
    protected $table = 'organization_token';
<<<<<<< HEAD
    protected $fillable = ['token', 'expired_at', 'organization_id', 'roles_id', 'created_for', 'created_by', 'status'];
    public static function getuser($nim)
    {
        return User::where('nim', $nim)->first();
    }
    public static function gettoken($token)
    {
        return Orgtoken::where('token', $token)->first();
    }
    public static function notify($id)
    {
        return Orgtoken::where('created_for', $id)->where('status', 0)->get();
    }
    public function users()
    {
        return $this->belongsTo(User::class);
    }
=======
    protected $fillable = ['token', 'expired_at', 'organization_id', 'org_roles_id', 'kemahasiswaan_id'];
>>>>>>> 320b1045e0f2c1096493f18dd60522f3c2c6da9b
}
