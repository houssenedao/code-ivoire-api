<?php

namespace App;

use App\Models\Event;
use App\Models\Review;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use League\OAuth2\Server\Exception\OAuthServerException;

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


    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }


    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_tag');
    }

    /**
     * @param $username
     * @return mixed
     * @throws OAuthServerException
     */
    public function findForPassport($username)
    {
        $user = $this->where('email', $username)->first();

        if ($user !== null)
            if ($user->activated === 0)
                throw new OAuthServerException('User account is not activated', 6, 'Unauthorized', 401);

            if ($user->deleted_at !== null)
                throw new OAuthServerException('User account is disabled', 6, 'Unauthorized', 401);

        return $user;
    }
}
