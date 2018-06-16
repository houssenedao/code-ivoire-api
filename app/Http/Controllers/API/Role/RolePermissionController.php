<?php

namespace App\Http\Controllers\API\Role;

use App\Http\Requests\Permission\CreatePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Role $role)
    {
        return PermissionResource::collection($role->permissions()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePermissionRequest $request
     * @param  \App\Models\Role $role
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePermissionRequest $request, Role $role)
    {
        $create = $role->permissions()->create($request->all());

        if ($create) {
            return response()->json($create, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role $role
     * @param  \App\Models\Permission $permission
     * @return PermissionResource
     */
    public function show(Role $role, Permission $permission)
    {
        return new PermissionResource($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePermissionRequest $request
     * @param  \App\Models\Role $role
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, Role $role, Permission $permission)
    {
        $update = $permission->fill($request->all());

        if ($update) {
            return response()->json(null, 204);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role $role
     * @param  \App\Models\Permission $permission
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Role $role, Permission $permission)
    {
        if ($permission->delete()) {
            return response()->json(null, 200);
        }
    }
}
