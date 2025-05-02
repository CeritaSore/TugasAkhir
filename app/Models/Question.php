<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'event_question';
    protected $fillable = ['question', 'form_id','type_id'];
}
