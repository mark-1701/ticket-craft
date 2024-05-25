<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Helpers\ResponseHelper;
use App\Helpers\SimpleCRUDHelper;
use App\Http\Resources\TicketResource;
use App\Models\Assignment;
use App\Models\Escalation;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public $crud;

    public function __construct()
    {
        $this->crud = new SimpleCRUDHelper(new Ticket);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->crud->index(TicketResource::class);
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
        return $this->crud->store(FileHelper::handleSingleFileUpload($request, 'image_uri'), TicketResource::class);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return $this->crud->show($id, TicketResource::class);
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
        return $this->crud->update(FileHelper::handleSingleFileUpload($request, 'image_uri'), $id, TicketResource::class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        return $this->crud->destroy($id);
    }

    public function getTicketsByUserId(string $id): JsonResponse
    {
        $data = Ticket::where('user_id', $id)->get();
        return ResponseHelper::successResponse(TicketResource::collection(($data)), 'Tickets consultados correctamente', 200);
    }

    public function getAvailableTickets(): JsonResponse
    {
        $ticketIds = Ticket::leftJoin('assignments', 'tickets.id', '=', 'assignments.ticket_id')
            ->leftJoin('escalations', 'tickets.id', '=', 'escalations.ticket_id')
            ->whereNull('assignments.ticket_id')
            ->whereNull('escalations.ticket_id')
            ->select('tickets.id') // Ajusta los campos que deseas seleccionar
            ->get();

        $data = Ticket::whereIn('id', $ticketIds)->get();
        return ResponseHelper::successResponse(TicketResource::collection(($data)), 'Tickets consultados correctamente', 200);
    }

    public function getUnescalatedAssignedTickets($id): JsonResponse
    {
        $ticketIds = Assignment::where('user_id', $id)
            ->whereNotIn('ticket_id', function ($query) {
                $query->select('ticket_id')->from('escalations');
            })->select('ticket_id')
            ->get();
        $data = Ticket::whereIn('id', $ticketIds)->get();
        return ResponseHelper::successResponse(TicketResource::collection(($data)), 'Tickets consultados correctamente', 200);
    }

    public function getEscaledTickets(): JsonResponse
    {
        $ticketIds = Escalation::select('ticket_id')->get();
        $data = Ticket::whereIn('id', $ticketIds)->get();
        return ResponseHelper::successResponse(TicketResource::collection($data), 'Tickets consultados correctamente', 200);
    }

    public function getGeneralTicketStatistics(): JsonResponse
    {
        $ticketsByState = Ticket::select('ticket_states.name', \DB::raw('COUNT(tickets.id) as ticket_count'))
            ->join('ticket_states', 'tickets.ticket_state_id', '=', 'ticket_states.id')
            ->groupBy('ticket_states.name')
            ->orderBy('ticket_count', 'DESC')
            ->get();

        return ResponseHelper::successResponse($ticketsByState, 'Tickets consultados correctamente', 200);
    }

    public function getGeneralTicketStatisticsForUser(int $userId): JsonResponse
    {
        $ticketsByState = Ticket::select('ticket_states.name', \DB::raw('COUNT(tickets.id) as ticket_count'))
            ->join('ticket_states', 'tickets.ticket_state_id', '=', 'ticket_states.id')
            ->where('tickets.user_id', '=', $userId) // Agregar condición para el ID del usuario
            ->groupBy('ticket_states.name')
            ->orderBy('ticket_count', 'DESC')
            ->get();

        return ResponseHelper::successResponse($ticketsByState, 'Tickets del usuario consultados correctamente', 200);
    }

}
