<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EscalationController;
use App\Http\Controllers\EscalationStateController;
use App\Http\Controllers\PriorityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TicketStateController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// INNER LEFT para obtener usuarios que no son empleados ni clientes
// Route::get('/user/not-customers-or-employees', [UserController::class, 'getNotCustomersOrEmployees'])->name('customer.getNotCustomersOrEmployees');

// obtener tickets de un usuario especifico
Route::get('/ticket/tickets-by-userid/{user}', [TicketController::class, 'getTicketsByUserId'])->name('ticket.getTicketsByUserId');
// obtener los tickets que no estan asginados ni escalados
Route::get('/ticket/available-tickets', [TicketController::class, 'getAvailableTickets'])->name('ticket.getAvailableTickets');

// obtener todos los tickets asignados de un tecnico especifico
// Route::get('/assignment/assigments-by-userid/{user}', [AssignmentController::class, 'getAssigmentsByUserId'])->name('assigment.getAssigmentsByUserId');


// obtener tickets asignados que no estan escalados
Route::get('/ticket/unescalated-assigned-tickets/{user}', [TicketController::class, 'getUnescalatedAssignedTickets'])->name('ticket.getUnescalatedAssignedTickets');

// obtener tickets escalados de un usuario especifico
Route::get('/ticket/escaled-tickets', [TicketController::class, 'getEscaledTickets'])->name('ticket.getEscaledTickets');


Route::post('login', [AuthController::class, 'login'])->name('login');
Route::resource('/user', UserController::class);
Route::resource('/role', RoleController::class);
Route::resource('/priority', PriorityController::class);
Route::resource('/type', TypeController::class);
Route::resource('/department', DepartmentController::class);
Route::resource('/ticket-state', TicketStateController::class);
Route::resource('/ticket', TicketController::class);
Route::resource('/assignment', AssignmentController::class);
Route::resource('/escalation-state', EscalationStateController::class);
Route::resource('/escalation', EscalationController::class);