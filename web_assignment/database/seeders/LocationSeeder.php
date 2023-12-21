<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;


class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create(['name' => 'Location 1']);
        Location::create(['name' => 'Location 2']);
        Location::create(['name' => 'Location 3']);
        // Add more locations as needed
    }
}
