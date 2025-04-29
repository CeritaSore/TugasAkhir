<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventForm extends Model
{
    protected $table = 'event_form';
    protected $fillable = [
        'nama_form',
        'event_id'
    ];
}
