<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        return RoleResource::collection(Role::all());
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
        $role = Role::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $role,
            'message' => 'Rol creado exitosamente.',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $role = Role::find($id);
        return response()->json($role);
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
        $role = Role::find($id);
        $role->update($request->all()); 
        return response()->json([
            'success' => true,
            'data' => $role,
            'message' => 'Rol actualizado exitosamente.'
        ], 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        Role::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Rol elimniado exitosamente.'
        ], 200); 
    }
}
