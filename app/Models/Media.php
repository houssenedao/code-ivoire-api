<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = [];

    protected $hidden = [];

    public function mediable()
    {
        return $this->morphTo();
    }
}
