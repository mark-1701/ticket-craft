<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        return UserResource::collection(User::all());
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
        // $rol = Role::find($request->role_id);
        // if (!$rol) {
        //     return response()->json([
        //         "error" => [
        //             "code" => 400,
        //             "message" => "El rol especificado no está disponible."
        //         ]
        //     ], 400);
        // }

        $user = User::create($request->all());
        $resource = new UserResource($user);
        return response()->json([
            'success' => true,
            'data' => $resource,
            'message' => 'Usuario creado exitosamente.',
        ], 201);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResource
    {
        $user = User::find($id);
        return new UserResource($user);
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
        $user = User::find($id);
        $user->update($request->all()); 
        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'Usuario actualizado exitosamente.'
        ], 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        User::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Usuario elimniado exitosamente.'
        ], 200); 
    }
}
