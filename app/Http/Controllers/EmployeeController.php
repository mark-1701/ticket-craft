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
        return $this->crud->index(EmployeeResource::class);
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
        return $this->crud->store($request, EmployeeResource::class);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->crud->show($id, EmployeeResource::class);
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
        return $this->crud->update($request, $id, EmployeeResource::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->crud->destroy($id);
    }
}
