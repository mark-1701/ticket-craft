<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Helpers\SimpleCRUDHelper;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public $crud;

    public function __construct()
    {
        $this->crud = new SimpleCRUDHelper(new Employee);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        try {
            $resource = EmployeeResource::collection(Employee::all());
            return ResponseHelper::successResponse($resource, 'Employees consultados exitosamente.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al consultar employees. '.$e->getMessage(), 400);
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
    public function store(Request $request)
    {
        return $this->crud->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $employee = Employee::find($id);
            $resource = new EmployeeResource($employee);
            return ResponseHelper::successResponse($resource, 'Registro consultado exitosamente en la tabla employee.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al consultar registro en la tabla employee: '.$e->getMessage(), 400);
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
    public function update(Request $request, string $id)
    {
        return $this->crud->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->crud->destroy($id);
    }
}
