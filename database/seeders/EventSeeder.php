<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Event::factory(6)->create();

        // Event::factory()->create([
        //     'name' => 'عيد ميلاد',
        //     'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
        // ]);
        DB::table('events')->delete();
        $events = array(
            array('name' => 'عيد ميلاد', 'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui'),
            array('name' => ' افتتاح ', 'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui'),
            array('name' => 'حفل زفاف', 'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui'),
            array('name' => 'حفلة خطوبة', 'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui'),
            array('name' => 'حفلة تحديد جنس المولود', 'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui'),
            array('name' => 'حفلة تخرج', 'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui'),
        );
        DB::table('events')->insert($events);
    }
}
