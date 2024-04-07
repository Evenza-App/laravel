<?php

namespace Database\Seeders;

use App\Models\Reservation;
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
                'date' => '2012-02-22', 'time' => '07:28:21', 'location' => '704 Prosacco Islands
           Malliechester, OH 36330-4126', 'numberOfPeople' => 45,
                'image' => 'Rectangle 16.png',
                'status' => 'قيد المعالجة', 'event_id' => 1, 'photographer_id' => 2, 'user_id' => 3
            ),

            array(
                'date' => '2000-06-17', 'time' => '07:28:21', 'location' => '704 Prosacco Islands
           Malliechester, OH 36330-4126', 'numberOfPeople' => 45,
                'image' => 'Rectangle 16-4.png',
                'status' => ' مقبول', 'event_id' => 3, 'photographer_id' => 3, 'user_id' => 4
            ),

            array(
                'date' => '2000-06-17', 'time' => '07:28:21', 'location' => '704 Prosacco Islands
           Malliechester, OH 36330-4126', 'numberOfPeople' => 45,
                'image' => 'Rectangle 16-5.png',
                'status' => 'قيد المعالجة', 'event_id' => 4, 'photographer_id' => 1, 'user_id' => 5
            ),

            array(
                'date' => '2012-02-22', 'time' => '07:28:21', 'location' => '704 Prosacco Islands
           Malliechester, OH 36330-4126', 'numberOfPeople' => 45,
                'image' => 'Rectangle 16-1.png',
                'status' => 'مرفوض', 'event_id' => 2, 'photographer_id' => 4, 'user_id' => 3
            ),
        );
        DB::table('reservations')->insert($reservations);
    }
}
