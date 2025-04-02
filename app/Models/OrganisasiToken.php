<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\MockObject\Builder\Stub;

class OrganisasiToken extends Model
{
    protected $table = 'organisasi_token';
    protected $fillable = [
        'token',
        'receiver',
        'creator',
        'organisasi_id',
        'role_id',
        // 'status',
        'expired'
    ];
    public function createFor()
    {
        return $this->belongsTo(User::class, 'creator');
    }
    public function receiveBy()
    {
        return $this->belongsTo(User::class, 'receiver');
    }
    public static function encodeToken($data)
    {
        return base64_encode(json_encode($data));
    }
    public static function decodeToken($data)
    {

        return base64_decode(json_decode($data));
    }
}
