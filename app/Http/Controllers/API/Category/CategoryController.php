<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Jobs\CategoryJob;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return response()->json(CategoryResource::collection(Category::paginate()), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $this->dispatch(new CategoryJob('STORE', null, $request->all()));

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
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response()->json(new CategoryResource($category), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategoryRequest $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $this->dispatch(new CategoryJob('UPDATE', $category, $request->all()));

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
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        if ($category->delete())
            return response()->json([
                'data' => [
                    'action' => 'delete category',
                    'message' => 'Your content is deleted.'
                ]
            ], 204);
    }
}
