<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Reservation::factory(2)->create();

        DB::table('reservations')->delete();
        $reservations = array(
            array(
                'date' => '2000-06-17', 'start_time' => '07:28:21', 'end_time' => '07:28:21', 'location' => '704 Prosacco Islands
           Malliechester, OH 36330-4126', 'number_of_people' => 45,
                //'image' => 'Rectangle 16.png',
                'status' => 'قيد المعالجة', 'event_id' => 1, 'photographer_id' => 2, 'user_id' => User::query()->has('customer')->inRandomOrder()->first()->id
            ),

            array(
                'date' => '2000-06-17',  'start_time' => '07:28:21', 'end_time' => '07:28:21', 'location' => '704 Prosacco Islands
           Malliechester, OH 36330-4126', 'number_of_people' => 45,
                // 'image' => 'Rectangle 16-4.png',
                'status' => 'قيد المعالجة', 'event_id' => 3, 'photographer_id' => 3, 'user_id' => User::query()->has('customer')->inRandomOrder()->first()->id
            ),

            array(
                'date' => '2000-06-17', 'start_time' => '07:28:21', 'end_time' => '07:28:21', 'location' => '704 Prosacco Islands
           Malliechester, OH 36330-4126', 'number_of_people' => 45,
                // 'image' => 'Rectangle 16-5.png',
                'status' => 'قيد المعالجة', 'event_id' => 4, 'photographer_id' => 1, 'user_id' => User::query()->has('customer')->inRandomOrder()->first()->id
            ),

            array(
                'date' => '2000-06-17', 'start_time' => '07:28:21', 'end_time' => '07:28:21', 'location' => '704 Prosacco Islands
           Malliechester, OH 36330-4126', 'number_of_people' => 45,
                //'image' => 'Rectangle 16-1.png',
                'status' => 'قيد المعالجة', 'event_id' => 2, 'photographer_id' => 4, 'user_id' => User::query()->has('customer')->inRandomOrder()->first()->id
            ),
        );
        DB::table('reservations')->insert($reservations);
    }
}
