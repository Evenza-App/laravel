<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            AdminSeeder::class,
            CustomerSeeder::class,
            CategorySeeder::class,
            EventSeeder::class,
            // EventDetailSeeder::class,
            BuffetSeeder::class,
            PhotographerSeeder::class,
            //  ReservationSeeder::class,
        ]);
        $this->call(EventDetailsTableSeeder::class);
    }
}
