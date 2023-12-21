<?php

namespace Database\Seeders;
// namespace Database\Seeders\UserSeeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $this->call(CategorySeeder::class);
        // $this->call(LocationSeeder::class);
        // $this->call(ProjectSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(EvaluatorSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(EvaluationSeeder::class);
    }
}
