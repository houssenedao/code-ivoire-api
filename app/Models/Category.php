<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @var array
     */
    protected $hidden = [];

    /**
     * Category Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function events()
    {
        return $this->belongsTo(Event::class);
    }
}
