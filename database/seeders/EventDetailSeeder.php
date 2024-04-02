<?php

namespace Database\Seeders;

use App\Models\EventDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventDetail::factory(5)->create();
    }
}
