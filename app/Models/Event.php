<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }


    public function medias()
    {
        return $this->morphMany(Media::class, 'mediable');
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'event_tag');
    }


    public function users()
    {
        return $this->belongsToMany(Event::class, 'event_tag');
    }


    public function speakers()
    {
        return $this->belongsToMany(Event::class, 'event_tag')->wherePivot('it_is', 'SPEAKER');
    }


    public function entries()
    {
        return $this->belongsToMany(Event::class, 'event_tag')->wherePivot('it_is', 'ENTRY');
    }
}
