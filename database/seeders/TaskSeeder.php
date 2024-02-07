<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\Project;
use App\Enums\TaskStatus;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $current = Carbon::create(2024, 1, 15, 0);
        $deadline = $current->addMonth(3);

        $range = range(0, 20);

        foreach ($range as $number)
        {
            Task::create([
                'description' => fake()->sentence(),
                'status' => TaskStatus::TODO,
                'deadline' => $deadline,
                'project_id' => $this->randomProjectId()
            ]);
        }

        Task::create([
            'description' => fake()->sentence(),
            'status' => TaskStatus::IN_PROGRESS,
            'deadline' => $deadline,
            'project_id' => $this->randomProjectId()
        ]);

        Task::create([
            'description' => fake()->sentence(),
            'status' => TaskStatus::IN_PROGRESS,
            'deadline' => $deadline,
            'project_id' => $this->randomProjectId()
        ]);

        Task::create([
            'description' => fake()->sentence(),
            'status' => TaskStatus::IN_PROGRESS,
            'deadline' => $deadline,
            'project_id' => $this->randomProjectId()
        ]);

    }

    protected function randomProjectId() : int
    {
        $prj_id = Project::all()->random()->getId() ?? 0;
        
        return $prj_id;
    }
}
