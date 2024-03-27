<?php

namespace Database\Seeders;

use App\Models\Buffet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BuffetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Buffet::factory(7)->create();
    }
}
