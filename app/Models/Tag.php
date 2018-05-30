<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [];


    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_tag');
    }
}
