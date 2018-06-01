<?php

namespace App\Observers;

use App\Models\Role;

class RoleObserver
{
    /**
     * Listen to the \App\Models\Role created event.
     *
     * @param Role $role
     * @return void
     */
    public function created(Role $role)
    {
        //
    }

    /**
     * Listen to the \App\Models\Role created event.
     *
     * @param Role $role
     * @return void
     */
    public function saved(Role $role)
    {
        //
    }

    /**
     * Listen to the \App\Models\Role created event.
     *
     * @param Role $role
     * @return void
     */
    public function updated(Role $role)
    {
        //
    }

    /**
     * Listen to the \App\Models\Role deleting event.
     *
     * @param Role $role
     * @return void
     */
    public function deleting(Role $role)
    {
        //
    }
}
