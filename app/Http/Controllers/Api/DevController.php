<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Controllers\Controller;

class DevController extends Controller
{
    public function __invoke(Request $request)
    {
        return Employee::dev()->get();
    }
}
