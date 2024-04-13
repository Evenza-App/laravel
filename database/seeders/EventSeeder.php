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
        Event::query()->delete();
        $events = array(
            array('name' => 'عيد ميلاد', 'image' => 'birthday.png'),
            array('name' => ' افتتاح ', 'image' => 'افتتاح.png'),
            array('name' => 'حفل زفاف', 'image' => 'زواج.png'),
            array('name' => 'حفلة خطوبة', 'image' => 'خطبة.png'),
            array('name' => 'حفلة تحديد جنس المولود', 'image' => 'تحديد حنس المولود.png'),
            array('name' => 'حفلة تخرج', 'image' => 'تخرج.png'),
        );
        Event::insert($events);
    }
}
