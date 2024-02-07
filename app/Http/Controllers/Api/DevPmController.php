<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Support\Arr;

class DevPmController extends Controller
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

        
        $emp = Employee::find($emp_id);
        
        if ($emp->isDev() === false)
        {
            return response()->json([
                'message' => 'The employee id is not from a developer.'
            ], 403);
        }

        $pm = Employee::find($emp->pm_id);

        if ($pm)
        {
            return $pm->firstname . ' '. $pm->lastname;
        }

        return '';
    }
}
