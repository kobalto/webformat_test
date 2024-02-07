<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Employee;


class CeoController extends Controller
{
    
    public function __invoke(Request $request)
    {
        return Employee::seo()->get();
    }

}