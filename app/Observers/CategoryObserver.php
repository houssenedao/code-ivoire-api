<?php

namespace App\Observers;

use App\Events\CategoryIsDeleted;
use App\Models\Category;

class CategoryObserver
{
    /**
     * Listen to the \App\Models\Category created event.
     *
     * @param Category $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    /**
     * Listen to the \App\Models\Category created event.
     *
     * @param Category $category
     * @return void
     */
    public function saved(Category $category)
    {
        //
    }

    /**
     * Listen to the \App\Models\Category created event.
     *
     * @param Category $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Listen to the \App\Models\Category deleting event.
     *
     * @param Category $category
     * @return void
     */
    public function deleting(Category $category)
    {
        //
    }

    /**
     * Listen to the \App\Models\Category deleting event.
     *
     * @param Category $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }
}
