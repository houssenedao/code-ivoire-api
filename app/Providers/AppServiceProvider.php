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
        //
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
