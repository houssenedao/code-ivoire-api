<?php

namespace App\Http\Controllers\API\Event;

use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Event $event)
    {
        return ReviewResource::collection($event->reviews()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $create = $event->reviews()->create(
            array_merge($request->all(), ['user_id' => $request->user()])
        );

        if ($create) {
            return response()->json($create, 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event $event
     * @param  \App\Models\Review $review
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Event $event, Review $review)
    {
        if ($review->delete()) {
            return response()->json(null, 200);
        }
    }
}
