<?php

// database/seeders/UsersTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
            'role' => 'S',
        ]);

        User::create([
            'name' => 'Evaluator User',
            'email' => 'evaluator@example.com',
            'password' => Hash::make('password'),
            'role' => 'E',
        ]);

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'A',
        ]);

        // Add more users as needed
    }
}
