<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Review\CreateReviewRequest;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ReviewResource::collection(Review::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateReviewRequest $request
     * @return ReviewResource
     */
    public function store(CreateReviewRequest $request)
    {
        $create = Review::create(
           array_merge($request->all(), ['user_id' => $request->user()->id])
        );

        if ($create) {
            return response()->json($create, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review $review
     * @return ReviewResource
     */
    public function show(Review $review)
    {
        return new ReviewResource($review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateReviewRequest $request
     * @param  \App\Models\Review $review
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        $update = $review->fill($request->all());

        if ($update) {
            return response()->json(null, 204);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review $review
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Review $review)
    {
        if ($review->delete()) {
            return response()->json(null, 200);
        }
    }
}
