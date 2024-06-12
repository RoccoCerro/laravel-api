<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;   
use App\Models\Project;
use Illuminate\Support\Str;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $types = Type::all();
        $ids = $types->pluck('id')->all();


        for ($i = 0; $i < 10; $i++) {   
            $project = new Project();

            $title = $faker->sentence(6);
            $project->title = $title;
            $project->slug = Str::slug($title);
            $project->content = $faker->optional()->text(500);
            $project->type_id = $faker->optional()->randomElement($ids);
            $randomNumber = rand(1, 1000);
            $project->img_url = "https://picsum.photos/id/{$randomNumber}/2000/3000";
            $project->save();
        }
    }
}
