<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $roles = Role::all();
            return ResponseHelper::successResponse($roles, 'Roles consultados exitosamente.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al consultar roles. '.$e->getMessage(), 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $role = Role::create($request->all());
            return ResponseHelper::successResponse($role, 'Role consultados exitosamente.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al crear role. '.$e->getMessage(), 400);;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $role = Role::find($id);
            return ResponseHelper::successResponse($role, 'Role consultado exitosamente.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al consultar role. '.$e->getMessage(), 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        try {
            $role = Role::find($id);
            $role->update($request->all());
            return ResponseHelper::successResponse($role, 'Role actualizado exitosamente.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al actualizar role. '.$e->getMessage(), 400);;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            Role::find($id)->delete();
            return ResponseHelper::successResponse(null, 'Role eliminado exitosamente.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al eliminar role. '.$e->getMessage(), 400);;
        }
    }
}
