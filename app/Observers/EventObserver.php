<?php

namespace App\Observers;

use App\Models\Event;

class EventObserver
{
    /**
     * Listen to the \App\Models\Event created event.
     *
     * @param Event $event
     * @return void
     */
    public function created(Event $event)
    {
        //
    }

    /**
     * Listen to the \App\Models\Event created event.
     *
     * @param Event $event
     * @return void
     */
    public function saved(Event $event)
    {
        //
    }

    /**
     * Listen to the \App\Models\Event created event.
     *
     * @param Event $event
     * @return void
     */
    public function updated(Event $event)
    {
        //
    }

    /**
     * Listen to the \App\Models\Event deleting event.
     *
     * @param Event $event
     * @return void
     */
    public function deleting(Event $event)
    {
        //
    }
}
