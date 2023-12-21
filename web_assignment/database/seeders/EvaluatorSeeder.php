<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evaluator;
use App\Models\User;

class EvaluatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $evaluatorUser = User::where('email', 'evaluator@example.com')->first();

        Evaluator::create([
            'user_id' => $evaluatorUser->id,
        ]);

    }
}
