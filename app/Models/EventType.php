<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected $table = 'event_type';
    protected $fillable = [
        'tipe'
    ];
    public function event()
    {
        return $this->hasMany(Event::class, 'type_id');
    }
}
