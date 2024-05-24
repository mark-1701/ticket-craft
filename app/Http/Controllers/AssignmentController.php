<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Helpers\SimpleCRUDHelper;
use App\Http\Requests\AssignmentRequest;
use App\Http\Resources\AssignmentResource;
use App\Http\Resources\TicketResource;
use App\Models\Assignment;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public $crud;
    public function __construct()
    {
        $this->crud = new SimpleCRUDHelper(new Assignment);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return $this->crud->index(AssignmentResource::class);
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
    public function store(AssignmentRequest $request): JsonResponse
    {
        return $this->crud->store($request, AssignmentResource::class);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return $this->crud->show($id, AssignmentResource::class);
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
        // return $this->crud->update($request, $id, AssignmentResource::class);
        return ResponseHelper::errorResponse('No es posible actualizar', 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        // return $this->crud->destroy($id);
        return ResponseHelper::errorResponse('No es posible eliminar', 403);
    }

    public function getAssigmentsByUserId(string $id): JsonResponse
    {
        $ticketIds = Assignment::where('user_id', $id)->select('ticket_id')->get();
        $data = Ticket::whereIn('id', $ticketIds)->get();
        return ResponseHelper::successResponse(TicketResource::collection($data), 'Tickets consultados correctamente', 200);
    }
}
