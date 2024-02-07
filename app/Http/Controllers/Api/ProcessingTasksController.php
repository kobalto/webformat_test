<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Controllers\Controller;

class ProcessingTasksController extends Controller
{
    public function __invoke(Request $request, int $dev_id)
    {
        $dev = Employee::find($dev_id);

        if ($dev->isDev() === false)
        {
            return response()->json([
                'message' => 'The employee is is not from a developer.'
            ], 403);
        }
        
        return $dev->getProcessingTasks();
    }
}