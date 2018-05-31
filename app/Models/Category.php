<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [];

    protected $hidden = [];

    public function events()
    {
        return $this->belongsTo(Event::class);
    }
}
