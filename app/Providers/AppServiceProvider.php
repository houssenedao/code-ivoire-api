<?php

namespace App\Providers;

use App\Models\{
    Category, Event, Permission, Review, Role, Tag
};
use App\Observers\{
    CategoryObserver, EventObserver, PermissionObserver, ReviewObserver, RoleObserver, TagObserver
};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Category::observe(CategoryObserver::class);
        Event::observe(EventObserver::class);
        Permission::observe(PermissionObserver::class);
        Review::observe(ReviewObserver::class);
        Role::observe(RoleObserver::class);
        Tag::observe(TagObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
