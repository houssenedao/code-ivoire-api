<?php

namespace App\Http\Controllers\API\Me;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $update = $request->user()->update($request->all());

        if ($update) {
            return response()->json(null, 200);
        }
    }

    /**
     * My opinions
     *
     * @param Request $request
     * @return mixed
     */
    public function opinion(Request $request)
    {
        return $request->user()->myOpinions()->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        if ($request->user()->delete()) {
            return response()->json(null, 200);
        }
    }
}
