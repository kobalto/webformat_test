<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Controllers\Controller;

class CrossTeamProjectsController extends Controller
{
    public function __invoke(Request $request)
    {
        $crossteam = [];

        $projects = Project::all();

        if ($projects->count() > 0)
        {
            foreach ($projects as $project)
            {
                $tasks = $project->tasks()->get();
                if ($tasks->count() > 0)
                {
                    foreach ($tasks as $task)
                    {
                        $teams = $task->developers()->get()->pluck('team_id');
                        
                        if ($teams->count() > 1)
                        {
                            $crossteam[] = $project->name;
                        }
                    }
   
                }
            }
        }

        return response()->json(
            $crossteam,
            200);

    }
}