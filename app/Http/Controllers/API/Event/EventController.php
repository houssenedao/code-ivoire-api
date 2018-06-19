<?php

namespace App\Http\Controllers\API\Event;

use App\Http\Requests\Event\CreateEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return EventResource::collection(Event::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateEventRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $create = $request->user()->events()->save($request->all(), ['it_is' => 'SPEAKER']);

        if ($create) {
            return response()->json($create, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return EventResource
     */
    public function show(Event $event)
    {
        return new EventResource($event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEventRequest $request
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $update = $event->fill($request->all());

        if ($update) {
            return response()->json(null, 204);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Event $event)
    {
        if ($event->delete()) {
            return response()->json(null, 200);
        }
    }
}
