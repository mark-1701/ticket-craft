<?php

namespace App\Http\Controllers;

use App\Helpers\FileHelper;
use App\Helpers\SimpleCRUDHelper;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
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
}
