<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;


class AssignTaskController extends Controller
{
    public function __invoke(Request $request, int $emp_id, int $task_id)
    {
        $devs = Employee::Dev()->get()->toArray();
        $dev_ids = Arr::pluck($devs , 'id');
        if (!in_array($emp_id, $dev_ids))
        {
            return response()->json([
                'message' => 'The employee id is not from a developer.'
            ], 403);
        }

        
        $emp = Employee::find($emp_id);
        
        if ($emp->isDev() === false)
        {
            return response()->json([
                'message' => 'The employee id is not from a developer.'
            ], 403);
        }

        $tasks = Task::all()->toArray();

        $ids = Arr::pluck($tasks , 'id');

        if (!in_array($task_id, $ids))
        {
            return response()->json([
                'message' => 'The task id is not valid.'
            ], 403);
        }

        $result = $emp->tasks()->attach($task_id);

        return response()->json([
            'message' => 'Associazione effettuata.'
        ], 201);
    }
}
