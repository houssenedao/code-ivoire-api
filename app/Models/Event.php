<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
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
     * Event category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Event reviews
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * Event media
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function medias()
    {
        return $this->morphMany(Media::class, 'mediable');
    }

    /**
     * Event tags
     *
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
        return $this->belongsToMany(Event::class, 'event_user');
    }

    /**
     * Speakers Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function eventSpeakers()
    {
        return $this->users()->wherePivot('it_is', 'SPEAKER');
    }

    /**
     * Entries Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function eventEntries()
    {
        return $this->users()->wherePivot('it_is', 'ENTRY');
    }
}
