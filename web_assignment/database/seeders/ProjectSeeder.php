<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Location;
use App\Models\Category;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = Category::where('name', 'Category 1')->first();
        $location1 = Location::where('name', 'Location 1')->first();

        Project::create([
            'name' => 'Project 1',
            'detail' => 'Project 1 Details',
            'marks' => 100.00,
            'status' => 'Marked',
            'location_id' => $location1->id,
            'category_id' => $category1->id,
        ]);

    }
}
