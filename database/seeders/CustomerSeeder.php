<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $aya = User::factory()->create([
            'email' => 'aya@gmail.com',

        ]);
        $aya->customer()->create([
            'name' => 'aya', 'phone' => '0996754375', 'address' => 'سوريا,دمشق', //'birthDate' => '2012-02-22'
        ]);

        $nour = User::factory()->create([
            'email' => 'nour@gmail.com',

        ]);
        $nour->customer()->create([
            'name' => 'nour', 'phone' => '0996754375', 'address' => 'سوريا,دمشق', //'birthDate' => '2012-02-22'
        ]);

        $zeina = User::factory()->create([
            'email' => 'zeinaa@gmail.com',

        ]);
        $zeina->customer()->create([
            'name' => 'zeinaa', 'phone' => '0996754375', 'address' => 'سوريا,دمشق', //'birthDate' => '2012-02-22'
        ]);
    }
}
