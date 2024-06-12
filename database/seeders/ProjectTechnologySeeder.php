<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectTechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = Technology::all()->pluck('id');

        $projects = Project::all();

        

        foreach ($projects as $project) {

            $rand_tech = rand(1, count($technologies));

            $project->technologies()->sync($rand_tech);
            $project->save();

        }

    }
}
