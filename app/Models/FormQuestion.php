<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormQuestion extends Model
{
    protected $table = 'event_form';
    protected $fillable = [
        'question',
        'event_id',
        'type_id',
        'input_type'
    ];
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    public function type()
    {
        return $this->belongsTo(EventType::class, 'type_id');
    }
    public function input()
    {
        return $this->belongsTo(InputType::class, 'input_type');
    }
}
