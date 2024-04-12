<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
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

Route::resource('/user', UserController::class);
Route::resource('/role', RoleController::class);
Route::resource('/customer', CustomerController::class);
Route::resource('/employee', EmployeeController::class);
Route::resource('/priority', PriorityController::class);
Route::resource('/type', TypeController::class);
Route::resource('/department', DepartmentController::class);
Route::resource('/ticket-state', TicketStateController::class);
Route::resource('/ticket', TicketController::class);