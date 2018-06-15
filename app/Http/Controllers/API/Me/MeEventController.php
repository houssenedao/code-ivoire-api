<?php

namespace App\Http\Controllers\API\Me;

use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return EventResource::collection($request->user()->events()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function subscribe(Event $event)
    {
        $user = User::whereId(request()->user()->id)->first();

        if ($user->entryEventSubscribe($event)) {
            return response()->json(true, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function unsubscribe(Event $event)
    {
        $user = User::whereId(request()->user()->id)->first();

        if ($user->entryEventUnsubscribe($event)) {
            return response()->json(true, 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function entry(Request $request)
    {
        return response()->json($request->user()->eventsAsEntry()->get());
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function speaker(Request $request)
    {
        return response()->json($request->user()->eventsAsSpeaker()->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Event $event
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Event $event)
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
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Event $event)
    {
        if ($event->delete()) {
            return response()->json(null, 200);
        }
    }
}
