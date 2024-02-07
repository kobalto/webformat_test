<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class ProcessingTasksController extends Controller
{
    public function __invoke(Request $request, int $emp_id)
    {
        $devs = Employee::Dev()->get()->toArray();
        $dev_ids = Arr::pluck($devs , 'id');
        if (!in_array($emp_id, $dev_ids))
        {
            return response()->json([
                'message' => 'The employee id is not from a developer.'
            ], 403);
        }


        $dev = Employee::find($emp_id);

        if ($dev->isDev() === false)
        {
            return response()->json([
                'message' => 'The employee is is not from a developer.'
            ], 403);
        }
        
        return $dev->getProcessingTasks();
    }
}