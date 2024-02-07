<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;

class DevPmController extends Controller
{
    public function __invoke(Request $request, int $emp_id)
    {
        $emp = Employee::find($emp_id);
        $pm = Employee::find($emp->pm_id);
        return $pm->firstname . ' '. $pm->lastname;
    }
}
