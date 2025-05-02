<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class EventForm extends Model
{
    protected $table = 'event_form';
    protected $fillable = [
        'nama_form',
        'event_id',
        'slug',
    ];
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    public static function slugging($data)
    {
        return Str::slug($data, '-');
    }
}
