<?php

namespace App\Http\Controllers\API\Role;

use App\Http\Requests\Role\CreateRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection urceCollection
     */
    public function index()
    {
        return RoleResource::collection(Role::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRoleRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRoleRequest $request)
    {
        $create = Role::create($request->all());

        if ($create) {
            return response()->json($create, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role $role
     * @return RoleResource
     */
    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $update = $role->fill($request->all());

        if ($update) {
            return response()->json(null, 204);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Role $role)
    {
        if ($role->delete()) {
            return response()->json(null, 200);
        }
    }
}
