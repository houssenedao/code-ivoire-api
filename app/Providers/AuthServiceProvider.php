<?php

namespace App\Providers;

use App\Models\{
    Event, Media, Permission, Review, Role, Tag
};
use App\Policies\{
    EventPolicy, MediaPolicy, PermissionPolicy, ReviewPolicy, RolePolicy, TagPolicy
};
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Role::class => RolePolicy::class,
        Event::class => EventPolicy::class,
        Media::class => MediaPolicy::class,
        Permission::class => PermissionPolicy::class,
        Review::class => ReviewPolicy::class,
        Role::class => RolePolicy::class,
        Tag::class => TagPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

        Passport::tokensExpireIn(now()->addDays(15));

        Passport::refreshTokensExpireIn(now()->addDays(30));
    }
}
