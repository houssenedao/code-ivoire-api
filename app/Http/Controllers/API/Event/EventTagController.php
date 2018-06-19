<?php

namespace App\Http\Controllers\API\Event;

use App\Http\Resources\TagResource;
use App\Models\Tag;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventTagController extends Controller
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
        return TagResource::collection($event->tags()->get());
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
        $tag = Tag::whereName($request->get('name'))->pluck('id')->first();

        $attach = $event->tags()->attach($tag);

        if ($attach) {
            return response()->json($attach, 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, Tag $tag)
    {
        $detach = $event->tags()->detach($tag->id);

        if ($detach) {
            return response()->json($detach, 201);
        }
    }
}
