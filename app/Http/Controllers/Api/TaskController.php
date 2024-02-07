<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Models\Project;
use App\Enums\TaskStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Task::all();
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $project = Project::find($request->project_id);

        $task = Task::create([
            'description' => $request->description,
            'status' => TaskStatus::TODO,
            'deadline' => $request->deadline,
            'project_id' => $project->getId()
        ]);

        return response()->json([
            'message' => 'Il task {$request->description} è stato creato.'
        ], 201);

    }

}
