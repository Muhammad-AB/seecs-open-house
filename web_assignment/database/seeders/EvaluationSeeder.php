<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evaluation;
use App\Models\Evaluator;
use App\Models\Project;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evaluator = Evaluator::first();
        $project = Project::first();

        Evaluation::create([
            'evaluator_id' => $evaluator->id,
            'project_id' => $project->id,
            'marks' => 9.00,
        ]);

    }
}
