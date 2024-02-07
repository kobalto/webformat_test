<?php
namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Http\Controllers\Controller;

class PmController extends Controller
{
    public function __invoke(Request $request)
    {
        return Employee::Pm()->get();
    }

}

