<?php

namespace App\Http\Controllers\API\Me;

use App\Http\Resources\ReviewResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return ReviewResource::collection($request->user()->reviews()->paginate());
    }
}
