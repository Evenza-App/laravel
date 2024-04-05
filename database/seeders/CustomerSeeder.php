<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'email' => 'aya@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::factory()->create([
            'email' => 'nour@gmail.com',
            'password' => Hash::make('password'),
        ]);
        User::factory()->create([
            'email' => 'zeinaa@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('customers')->delete();
        $customers = array(
            array('name' => "aya", 'phone' => '0996754375', 'address' => 'Damascus,Syria', 'birthDate' => '2012-02-22', 'user_id' => 3),
            array('name' => "nour", 'phone' => '0996754375', 'address' => 'Damascus,Syria', 'birthDate' => '2012-02-22', 'user_id' => 4),
            array('name' => "zeinaa", 'phone' => '0996754375', 'address' => 'Damascus,Syria', 'birthDate' => '2012-02-22', 'user_id' => 5),
        );
        DB::table('customers')->insert($customers);
    }
}
