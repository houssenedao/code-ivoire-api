<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name', 'label'
    ];

    /**
     * @var array
     */
    protected $hidden = [];
}
