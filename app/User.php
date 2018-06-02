<?php

namespace App;

use App\Models\Event;
use App\Models\Review;
use App\Models\Role;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User Roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function asRole()
    {
        //
    }

    public function assignRole()
    {
        //
    }

    public function detachRole()
    {
        //
    }

    /**
     * All Reviews for current user
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }

    /**
     * User opinion (review)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function myOpinion()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * User Events
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user');
    }

    /**
     * Events as speaker
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function eventsAsSpeaker()
    {
        return $this->events()->wherePivot('it_is', 'SPEAKER');
    }

    /**
     * Events as entry
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function eventsAsEntry()
    {
        return $this->events()->wherePivot('it_is', 'ENTRY');
    }

    /**
     * User subscribe event
     *
     * @param Event $event
     */
    public function entryEventSubscribe(Event $event)
    {
        $this->events()->attach($event, [
            'it_is' => 'ENTRY'
        ]);
    }

    /**
     * User unsubscribe event
     *
     * @param Event $event
     */
    public function entryEventUnsubscribe(Event $event)
    {
        $this->events()->detach($event);
    }
}
