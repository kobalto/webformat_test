<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;


class TeamSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // load json contents
        $json_data = File::get('database/json_data/teams.json');
        // convert json to laravel collections 
        $teams = collect(json_decode($json_data));

        $teams->each(function($team)
        {
            Team::create([
                'name' => $team->name,
                'assignable' => $team->assignable
            ]);
        });
        
    }
}

