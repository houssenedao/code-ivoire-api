<?php

namespace App\Http\Controllers\API\Category;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Event $event)
    {
        //
    }
}
