<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $fillable = [
        'nama',
        'deskripsi',
        'type_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'slug',
        'proker_id',
        'is_deleted'
    ];
    public static function slugTitle($slug)
    {
        return $slug = Str::slug($slug);
    }
    public function event_type()
    {
        return $this->belongsTo(EventType::class, 'type_id');
    }
    public function form()
    {
        return $this->hasMany(FormQuestion::class);
    }
    public function prokers()
    {
        return $this->belongsTo(OrganizationProgram::class, 'proker_id');
    }
}
