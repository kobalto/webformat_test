<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\CeoController;
use App\Http\Controllers\Api\PmController;
use App\Http\Controllers\Api\DevController;
use App\Http\Controllers\Api\DevPmController;

// use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ProcessingTasksController;
use App\Http\Controllers\Api\AssignTaskController;
use App\Http\Controllers\Api\DetachTaskController;
use App\Http\Controllers\Api\CrossTeamController;
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
// response()->json($post);

Route::get('/ceo', CeoController::class);

Route::get('/project-manager', PmController::class);

Route::get('/developers', DevController::class);

Route::get('/processing-tasks/{employee_id}', ProcessingTasksController::class);

Route::get('/get-pm/{employee_id}', DevPmController::class);

Route::post('/assign-task/{employee_id}/{task_id}', AssignTaskController::class);

Route::post('/detach-task/{employee_id}/{task_id}', DetachTaskController::class);

// Route::get('/get-cross-team-projects', CrossTeamController::class);

// Route::post('/new-dev/{employee_id}', PmEmployeeController::class);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
