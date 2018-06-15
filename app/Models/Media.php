<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @var array
     */
    protected $hidden = [];

    /**
     * Polymorphic Media
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function mediable()
    {
        return $this->morphTo();
    }
}
