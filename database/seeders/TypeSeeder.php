<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Type;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['FrontEnd', 'Backend', 'FullStack', 'Design', 'DevOps'];

        foreach ($categories as $category_name) {

            $new_type = new Type();
            $new_type->name = $category_name;
            $new_type->slug = Str::slug($category_name);

            $new_type->save();
        }
    }
}
