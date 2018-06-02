<?php

namespace App\Observers;

use App\Models\Tag;

class TagObserver
{
    /**
     * Listen to the \App\Models\Tag created event.
     *
     * @param Tag $tag
     * @return void
     */
    public function created(Tag $tag)
    {
        //
    }

    /**
     * Listen to the \App\Models\Tag created event.
     *
     * @param Tag $tag
     * @return void
     */
    public function saved(Tag $tag)
    {
        //
    }

    /**
     * Listen to the \App\Models\Tag created event.
     *
     * @param Tag $tag
     * @return void
     */
    public function updated(Tag $tag)
    {
        //
    }

    /**
     * Listen to the \App\Models\Tag deleting event.
     *
     * @param Tag $tag
     * @return void
     */
    public function deleting(Tag $tag)
    {
        //
    }
}
