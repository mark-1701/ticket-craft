<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Helpers\ResponseHelper;
use App\Helpers\SimpleCRUDHelper;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends Controller
{
    public $crud;

    public function __construct()
    {
        $this->crud = new SimpleCRUDHelper(new User);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return $this->crud->index(UserResource::class);
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
        return $this->crud->store(FileHelper::handleSingleFileUpload($request, 'profile_picture_uri'), UserResource::class);


        // try {
        //     $user = new User();
        //     $user->role_id = $request->role_id;
        //     $user->name = $request->name;
        //     $user->username = $request->username;
        //     $user->email = $request->email;
        //     $user->password = $request->password;
        //     $user->profile_picture_uri = $fileName;
        //     $user->save();
        //     $resource = new UserResource($user);
        //     return ResponseHelper::successResponse($resource, 'Registro creado exitosamente en la tabla users.', 201);
        // } catch (\Exception $e) {
        //     return ResponseHelper::errorResponse('Error al crear registro en la tabla users: '.$e->getMessage(), 400);
        // }       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return $this->crud->show($id, UserResource::class);
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
        return $this->crud->update(FileHelper::handleSingleFileUpload($request, 'profile_picture_uri'), $id, UserResource::class);

        // try {
        //     $fileName = FileHelper::handleSingleFileUpload($request);
        //     $user = User::find($id);
        //     $user->role_id = $request->role_id;
        //     $user->name = $request->name;
        //     $user->username = $request->username;
        //     $user->email = $request->email;
        //     $user->password = $request->password;
        //     if ($fileName != null) $user->profile_picture_uri = $fileName;
        //     $user->save();
        //     $resource = new UserResource($user);
        //     return ResponseHelper::successResponse($resource, 'Registro actualizado exitosamente en la tabla users.', 200);
        // } catch (\Exception $e) {
        //     return ResponseHelper::errorResponse('Error al actualizar registro en la tabla users. '.$e->getMessage(), 400);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return $this->crud->destroy($id);
    }
}
