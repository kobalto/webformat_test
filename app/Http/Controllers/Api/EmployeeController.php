<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Enums\Role;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = Employee::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'role' => Role::DEV,
            'team_id' => $request->team_id,
            'pm_id' => Employee::Pm()->get()->random()->getId()
        ]);
    }

}
