<?php

namespace App\Observers;

use App\Models\Permission;

class PermissionObserver
{
    /**
     * Listen to the \App\Models\Permission created event.
     *
     * @param Permission $permission
     * @return void
     */
    public function created(Permission $permission)
    {
        //
    }

    /**
     * Listen to the \App\Models\Permission created event.
     *
     * @param Permission $permission
     * @return void
     */
    public function saved(Permission $permission)
    {
        //
    }

    /**
     * Listen to the \App\Models\Permission created event.
     *
     * @param Permission $permission
     * @return void
     */
    public function updated(Permission $permission)
    {
        //
    }

    /**
     * Listen to the \App\Models\Permission deleting event.
     *
     * @param Permission $permission
     * @return void
     */
    public function deleting(Permission $permission)
    {
        //
    }
}
