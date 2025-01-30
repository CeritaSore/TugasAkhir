<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orgtoken extends Model
{
    protected $table = 'organization_token';
    protected $fillable = ['token', 'expired_at', 'organization_id', 'roles_id', 'created_for', 'created_by', 'status'];

    public static function grantingAccess()
    {
        return Orgtoken::where('created_for', Auth::id())->where('status', 1)->exists();
    }
    public static function notify($id) # for sending notification to user that have token
    {
        return Orgtoken::where('created_for', $id)->where('status', 0)->get();
    }

    public function creator() # get relation to database user in column created_for
    {
        return $this->belongsTo(User::class, 'created_for');
    }

    public function receiver() # get relation to database user in column created_by
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function organization() # get relation to database organization in column organization_id
    {
        return $this->belongsTo(Organization::class);
    }

    public function roles() # get relation to database orgrole in column roles_id
    {
        return $this->belongsTo(Orgrole::class);
    }
}
