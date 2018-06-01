<?php

namespace App\Observers;

use App\Models\Review;

class ReviewObserver
{
    /**
     * Listen to the \App\Models\Review created event.
     *
     * @param Review $review
     * @return void
     */
    public function created(Review $review)
    {
        //
    }

    /**
     * Listen to the \App\Models\Review created event.
     *
     * @param Review $review
     * @return void
     */
    public function saved(Review $review)
    {
        //
    }

    /**
     * Listen to the \App\Models\Review created event.
     *
     * @param Review $review
     * @return void
     */
    public function updated(Review $review)
    {
        //
    }

    /**
     * Listen to the \App\Models\Review deleting event.
     *
     * @param Review $review
     * @return void
     */
    public function deleting(Review $review)
    {
        //
    }
}
