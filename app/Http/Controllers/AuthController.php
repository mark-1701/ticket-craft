<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(UserRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        // verificar si el usuario existe
        if (!$user)  return ResponseHelper::errorResponse('Email no encontrado', 401);

        // verificar password que tiene hash
        if (Hash::check($request->password, $user->password)) {
            // si la contraseña está correcta y necesita ser rehashada, actualízala
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
        } else {
            // verificar password que no tiene hash
            if ($user->password !== $request->password) 
            return ResponseHelper::errorResponse('Email o Password incorrecto', 401);
        } 
        
        // Crear un token de acceso para el usuario
        // $token = $user->createToken('Personal Access Token')->accessToken;
        // return response()->json([
        //     'user' => $user,
        //     'token' => $token,
        // ]);

        return ResponseHelper::successResponse($user, 'Credenciales aprobadas',200);
    }
}
