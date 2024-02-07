<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Task;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'employee_id'
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    // public static function crossTeam()
    // {
    //     $crossteam = [];

    //     $projects = Project::all();

    //     if ($projects->count() > 0)
    //     {
    //         foreach ($projects as $project)
    //         {
    //             $tasks = $project->tasks();
    //             if ($tasks->count() > 0)
    //             {
    //                 foreach ($tasks as $task)
    //                 {
    //                     $teams = $task->developers()->get()->unique('team_id');
    //                     if ($teams->count() > 1)
    //                     {
    //                         $crossteam[] = $project->name;
    //                     }
    //                 }
   
    //             }
    //         }
    //     }

    //     return $crossteam;
    // }
}
