<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Reviews Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function medias()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'event_tag');
    }

    /**
     * Users Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(Event::class, 'event_tag');
    }

    /**
     * Speakers Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function speakers()
    {
        return $this->belongsToMany(Event::class, 'event_tag')->wherePivot('it_is', 'SPEAKER');
    }

    /**
     * Entries Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function entries()
    {
        return $this->belongsToMany(Event::class, 'event_tag')->wherePivot('it_is', 'ENTRY');
    }
}
