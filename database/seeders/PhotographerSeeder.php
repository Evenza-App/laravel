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
                'name' => 'ليليان وهبي', 'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui', 'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات',
                'numOfhours' => 3,
                'images' => json_encode([
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                ]),
            ),
            array(
                'name' => 'سعيد مصلح', 'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui', 'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات
            بالإضافة إلى تصوير حديثي الولادة',
                'numOfhours' => 3,
                'images' => json_encode([
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                ]),
            ),
            array(
                'name' => 'هبة جويد',
                'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات
            بالإضافة إلى تصوير حديثي الولادة',
                'numOfhours' => 3,
                'images' => json_encode([
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                ]),
            ),
            array(
                'name' =>  ' ساهر سويدان ', 'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات
            بالإضافة إلى تصوير حديثي الولادة',
                'numOfhours' => 3,
                'images' => json_encode([
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                    'url' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                ]),
            ),
        );
        DB::table('photographers')->insert($photograohers);
    }
}
