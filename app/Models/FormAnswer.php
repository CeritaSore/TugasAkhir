<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormAnswer extends Model
{
    protected $table = 'event_answer';
    protected $fillable = [
        'jawaban',
        'form_id',
        'event_id',
        'type_id',
    ];
}
