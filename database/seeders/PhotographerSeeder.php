<?php

namespace Database\Seeders;

use App\Models\Photographer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhotographerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Photographer::factory(4)->create();

        // Photographer::factory()->create([
        //     'name' => 'ليليان وهبي',
        //     'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
        //     'bio' => 'تصوير جميع المناسبات
        //     مع توافر جميع الإكسسوارات',
        //     'numOfhours' => 3,
        //     'images' => json_encode([
        //         'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
        //         'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
        //         'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
        //     ]),
        // ]);
        DB::table('photographers')->delete();
        $photograohers = array(
            array(
                'name' => 'ليليان وهبي', 'image' => 'Ellipse 6.png', 'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات',
                'numOfhours' => 3,
                'images' => json_encode([
                    'url' => 'Ellipse 6.png',
                    'url' => 'Ellipse 6.png',
                    'url' => 'Ellipse 6.png',
                ]),
            ),
            array(
                'name' => 'سعيد مصلح', 'image' => 'Ellipse 6-2.png', 'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات
            بالإضافة إلى تصوير حديثي الولادة',
                'numOfhours' => 3,
                'images' => json_encode([
                    'url' => 'Ellipse 6-2.png',
                    'url' => 'Ellipse 6-2.png',
                    'url' => 'Ellipse 6-2.png',
                ]),
            ),
            array(
                'name' => 'هبة جويد',
                'image' => 'Ellipse 6-1.png',
                'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات
            بالإضافة إلى تصوير حديثي الولادة',
                'numOfhours' => 3,
                'images' => json_encode([
                    'url' => 'Ellipse 6-1.png',
                    'url' => 'Ellipse 6-1.png',
                    'url' => 'Ellipse 6-1.png',
                ]),
            ),
            array(
                'name' =>  ' ساهر سويدان ', 'image' => 'Ellipse 6-3.png',
                'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات
            بالإضافة إلى تصوير حديثي الولادة',
                'numOfhours' => 3,
                'images' => json_encode([
                    'url' => 'Ellipse 6-3.png',
                    'url' => 'Ellipse 6-3.png',
                    'url' => 'Ellipse 6-3.png',
                ]),
            ),
        );
        DB::table('photographers')->insert($photograohers);
    }
}
