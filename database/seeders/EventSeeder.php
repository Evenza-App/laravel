<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

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
        $events = [
            ['name' => 'عيد ميلاد', 'image' => 'birthday.png'],
            ['name' => ' افتتاح ', 'image' => 'افتتاح.png'],
            ['name' => 'حفل زفاف', 'image' => 'زواج.png'],
            ['name' => 'حفلة خطوبة', 'image' => 'خطبة.png'],
            ['name' => 'حفلة تحديد جنس المولود', 'image' => 'تحديد حنس المولود.png'],
            ['name' => 'حفلة تخرج', 'image' => 'تخرج.png'],
        ];
        Event::insert($events);
    }
}
