<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Controllers\Controller;

class CrossTeamController extends Controller
{
    public function __invoke(Request $request)
    {
        return Project::crossTeam();
    }
}