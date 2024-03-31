<?php

namespace Database\Seeders;

use App\Models\Photographer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotographerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Photographer::factory(4)->create();
    }
}
