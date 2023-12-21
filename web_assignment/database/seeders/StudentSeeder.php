<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;
use App\Models\Project;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $studentUser = User::where('email', 'student@example.com')->first();
        $project = Project::first();

        Student::create([
            'user_id' => $studentUser->id,
            'project_id' => $project->id,
        ]);
    }
}
