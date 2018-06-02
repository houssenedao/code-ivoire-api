<?php

namespace App\Http\Controllers\API\Event;

use App\Models\Tag;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function index(Event $event)
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event, Tag $tag)
    {
        //
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
        //
    }
}
