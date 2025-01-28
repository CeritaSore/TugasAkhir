<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orgtoken extends Model
{
    protected $table = 'organization_token';
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
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_for');
    }
    public function receiver()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
    public function roles()
    {
        return $this->belongsTo(Orgrole::class);
    }
}
