<?php

namespace App\Http\Controllers;

use App\Models\Departament;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DepartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(Departament::all());
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
    public function store(Request $request)
    {
        $departament = Departament::create($request->all());
        return response()->json([
            'success' => true,
            'data' => $departament,
            'message' => 'Departamento creado exitosamente.',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $departament = Departament::find($id);
        return response()->json($departament);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $departament = Departament::find($id);
        $departament->update($request->all()); 
        return response()->json([
            'success' => true,
            'data' => $departament,
            'message' => 'Departamento actualizado exitosamente.'
        ], 200); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Departament::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Departamento elimniado exitosamente.'
        ], 200); 
    }
}
