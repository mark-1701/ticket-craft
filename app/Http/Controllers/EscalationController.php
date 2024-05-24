<?php

namespace App\Http\Controllers;

use App\Helpers\SimpleCRUDHelper;
use App\Http\Requests\EscalationRequest;
use App\Http\Resources\EscalationResource;
use App\Models\Escalation;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class EscalationController extends Controller
{
    public $crud;

    public function __construct()
    {
        $this->crud = new SimpleCRUDHelper(new Escalation);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return $this->crud->index(EscalationResource::class);
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
    public function store(EscalationRequest $request): JsonResponse
    {
        return $this->crud->store($request, EscalationResource::class);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return $this->crud->show($id, EscalationResource::class);
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
        return $this->crud->update($request, $id, EscalationResource::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return $this->crud->destroy($id);
    }
}
