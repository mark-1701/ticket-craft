<?php
namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SimpleCRUDHelper 
{
    public $model;
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function index(): JsonResponse
    {
        try {
            $data = $this->model::all();
            return ResponseHelper::successResponse($data, ucfirst($this->model->getTable()) . ' consultados exitosamente.', 201);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al consultar '. $this->model->getTable() . '. ' . $e->getMessage(), 400);
        }
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $data = $this->model::create($request->all());
            return ResponseHelper::successResponse($data, 'Registro creado exitosamente en la tabla ' . $this->model->getTable() . '.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al crear registro en la tabla ' . $this->model->getTable() . ': ' . $e->getMessage(), 400);
        }
    }

    public function show(string $id): JsonResponse
    {
        try {
            $data = $this->model::find($id);
            return ResponseHelper::successResponse($data, 'Registro consultado exitosamente en la tabla ' . $this->model->getTable() . '.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al consultar registro en la tabla ' . $this->model->getTable() . ': ' . $e->getMessage(), 400);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $data = $this->model::find($id);
            $data->update($request->all());
            return ResponseHelper::successResponse($data, 'Registro actualizado exitosamente en la tabla ' . $this->model->getTable() . '.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al actualizar registro en la tabla ' . $this->model->getTable() . ': ' . $e->getMessage(), 400);
        }
    }

    public function destroy(string $id)
    {
        try {
            $this->model::find($id)->delete();
            return ResponseHelper::successResponse(null, 'Registro eliminado exitosamente en la tabla ' . $this->model->getTable() . '.', 200);
        } catch (\Exception $e) {
            return ResponseHelper::errorResponse('Error al eliminar registro en la tabla ' . $this->model->getTable() . ': ' . $e->getMessage(), 400);
        }
    }
}