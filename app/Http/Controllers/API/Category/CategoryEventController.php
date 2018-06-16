<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Resources\EventResource;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Category $category)
    {
        return EventResource::collection($category->events()->paginate());
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
        $create = $category->events()->create($request->all());

        if ($create) {
            return response()->json($create, 201);
        }
    }
}
