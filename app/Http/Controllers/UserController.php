<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Helpers\ResponseHelper;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $resource = UserResource::collection(User::all());
            return ResponseHelper::successResponse($resource, 'Usuarios consultados exitosamente.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al consultar usuarios. '.$e->getMessage(), 400);
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
            $fileName = FileHelper::handleSingleFileUpload($request);
            $user = new User();
            $user->role_id = $request->role_id;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->profile_picture_uri = $fileName;
            $user->save();
            $resource = new UserResource($user);
            return ResponseHelper::successResponse($resource, 'Usuario creado exitosamente.', 201);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al crear usuario. '.$e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        try {
            $user = User::find($id);
            $resource = new UserResource($user);
            return ResponseHelper::successResponse($resource, 'Usuario consultado exitosamente.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al consultar usuario. '.$e->getMessage(), 400);
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
            $fileName = FileHelper::handleSingleFileUpload($request);
            $user = User::find($id);
            $user->role_id = $request->role_id;
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $request->password;
            if ($fileName != null) $user->profile_picture_uri = $fileName;
            $user->save();
            $resource = new UserResource($user);
            return ResponseHelper::successResponse($resource, 'Usuario actualizado exitosamente.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al actualizar usuario. '.$e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            User::find($id)->delete();
            return ResponseHelper::successResponse(null, 'Usuario eliminado exitosamente.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al eliminar el usuario: '.$e->getMessage(), 400);
        }
    }
}
