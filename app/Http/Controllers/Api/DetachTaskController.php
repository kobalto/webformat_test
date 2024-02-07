<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Task;
use Illuminate\Support\Arr;


class DetachTaskController extends Controller
{
    public function __invoke(Request $request, int $emp_id, int $task_id)
    {
        // validation ??
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

        $emp->tasks()->detach($task_id);
        return response()->json([
            'message' => 'Rimozione effettuata.'
        ], 200);

    }

}
