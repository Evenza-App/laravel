<?php

namespace Database\Seeders;

use App\Models\ApiCredintial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApiCredintialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        dump($key = md5('Evenza'));
        ApiCredintial::create([
            'key' => $key,
            'secret' => $key,
        ]);
    }
}
