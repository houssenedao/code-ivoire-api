<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\TagResource;
use App\Jobs\TagJob;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(TagResource::collection(Tag::paginate()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->dispatch(new TagJob('STORE', null, $request->all()));

        return response()->json([
            'data' => [
                'action' => 'store new category',
                'message' => 'Please wait this action is running in background job.'
            ]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return response()->json(new TagResource($tag), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->dispatch(new TagJob('UPDATE', $tag, $request->all()));

        return response()->json([
            'data' => [
                'action' => 'update category',
                'message' => 'Please wait this action is running in background job.'
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Tag $tag)
    {
        if ($tag->delete())
            return response()->json([
                'data' => [
                    'action' => 'delete category',
                    'message' => 'Your content is deleted.'
                ]
            ], 204);
    }
}
