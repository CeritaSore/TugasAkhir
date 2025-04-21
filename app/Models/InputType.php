<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InputType extends Model
{
    protected $table = 'event_form_type';
    protected $fillable = [
        'tipe',
    ];
    public function form()
    {
        return $this->hasMany(FormQuestion::class, 'input_type');
    }
}
