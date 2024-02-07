<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\Employee;
use App\Models\Team;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $teamCeoId = Team::where('assignable', 0)->first()->getId() ?? 0;
        // CEO
        Employee::create([
            'firstname' => 'Albert',
            'lastname' => 'Schinner',
            'role' => Role::CEO,
            'team_id' => $teamCeoId,
            'pm_id' => 0
        ]);

        // PM 
        Employee::create([
            'firstname' => 'Erik',
            'lastname' => 'Stone',
            'role' => Role::PM,
            'team_id' => $this->randomAssignableTeamId(),
            'pm_id' => 0
        ]);

        Employee::create([
            'firstname' => 'John',
            'lastname' => 'Smith',
            'role' => Role::PM,
            'team_id' => $this->randomAssignableTeamId(),
            'pm_id' => 0
        ]);


        // DEV

        Employee::create([
            'firstname' => 'Mary',
            'lastname' => 'Stewart',
            'role' => Role::DEV,
            'team_id' => $this->randomAssignableTeamId(),
            'pm_id' => $this->randomProjectManagerId()
        ]);

        Employee::create([
            'firstname' => 'Darren',
            'lastname' => 'Deckow',
            'role' => Role::DEV,
            'team_id' => $this->randomAssignableTeamId(),
            'pm_id' => $this->randomProjectManagerId()
        ]);

        Employee::create([
            'firstname' => 'Mark',
            'lastname' => 'Bode',
            'role' => Role::DEV,
            'team_id' => $this->randomAssignableTeamId(),
            'pm_id' => $this->randomProjectManagerId()
        ]);

        Employee::create([
            'firstname' => 'Bob',
            'lastname' => 'Bishop',
            'role' => Role::DEV,
            'team_id' => $this->randomAssignableTeamId(),
            'pm_id' => $this->randomProjectManagerId()
        ]);

        Employee::create([
            'firstname' => 'Harry',
            'lastname' => 'Ford',
            'role' => Role::DEV,
            'team_id' => $this->randomAssignableTeamId(),
            'pm_id' => $this->randomProjectManagerId()
        ]);

        Employee::create([
            'firstname' => 'Jennifer',
            'lastname' => 'Mitch',
            'role' => Role::DEV,
            'team_id' => $this->randomAssignableTeamId(),
            'pm_id' => $this->randomProjectManagerId()
        ]);
        
        Employee::create([
            'firstname' => 'Kiara',
            'lastname' => 'Bartell',
            'role' => Role::DEV,
            'team_id' => $this->randomAssignableTeamId(),
            'pm_id' => $this->randomProjectManagerId()
        ]);

        Employee::create([
            'firstname' => 'Dino',
            'lastname' => 'Lemke',
            'role' => Role::DEV,
            'team_id' => $this->randomAssignableTeamId(),
            'pm_id' => $this->randomProjectManagerId()
        ]);
        
    }


    protected function randomAssignableTeamId() : int
    {
        $team_id = Team::where('assignable', 1)
            ->inRandomOrder()
            ->limit(1)
            ->first()->getId() ?? 0;
        
        return $team_id;
    }

    protected function randomProjectManagerId() : int
    {
        $pm_id = Employee::Pm()->get()->random()->getId() ?? 0;
        return $pm_id;
    }

}
