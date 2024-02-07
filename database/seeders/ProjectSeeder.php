<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Employee;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'name' => 'Project One',
            'employee_id' => $this->randomPmId()
        ]);

        Project::create([
            'name' => 'Project Two',
            'employee_id' => $this->randomPmId()
        ]);

        Project::create([
            'name' => 'Project Three',
            'employee_id' => $this->randomPmId()
        ]);
    }

    protected function randomPmId() : int
    {
        $pm_id = Employee::Pm()->get()->random()->getId() ?? 0;
        
        return $pm_id;
    }

}
