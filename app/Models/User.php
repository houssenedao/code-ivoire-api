<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable, SoftDeletes;

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username', 'phone', 'activated', 'activated_token', 'avatar',
    ];

    /**
     * Appends content
     *
     * @var array
     */
    protected $appends = ['avatar_url'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activated_token'
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
    public function myOpinions()
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
     * @return void
     */
    public function entryEventSubscribe(Event $event)
    {
        return $this->events()->attach($event, [
            'it_is' => 'ENTRY'
        ]);
    }

    /**
     * User unsubscribe event
     *
     * @param Event $event
     * @return int
     */
    public function entryEventUnsubscribe(Event $event)
    {
        return $this->events()->detach($event);
    }

    /**
     * Avatar
     * @return mixed
     */
    public function getAvatarUrlAttribute()
    {
        return Storage::url('public/avatars/'.$this->id.'/'.$this->avatar);
    }
}
