<?php

namespace Database\Seeders;

use App\Models\Photographer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        // DB::table('photographers')->delete();
        Photographer::query()->delete();
        $photograohers = [
            [
                'name' => 'ليليان وهبي', 'image' => 'Ellipse 6.png', 'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات',
                // 'numOfhours' => 3,
                'images' => json_encode([
                    'Group 214.png',
                    'Rectangle 313.png',
                    'Rectangle 314.png',
                    'Group 300.png',
                    'Group 299.png',
                    'Group 298.png',
                    'Group4.png',
                    'Rectangle 33.png',
                    'Rectangle 384.png',
                    'Rectangle 22.png',
                    'Group 215.png',
                    'Group 2874.png',

                ]),
            ],
            [
                'name' => 'سعيد مصلح', 'image' => 'Ellipse 6-2.png', 'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات
            بالإضافة إلى تصوير حديثي الولادة',
                // 'numOfhours' => 3,
                'images' => json_encode([
                    'SGroup 309.png',
                    'SGroup 308.png',
                    'SGroup 307.png',
                    'SRectangle 22.png',
                    'SGroup 214.png',
                    'SSRectangle 22.png',
                    'GroupS 214.png',
                    'RectangleS22.png',
                    'RectangleSS22.png',
                    'RectangleSSS 314.png',
                    'GroupSSS 214.png',
                    'RectangleSSS 313.png',
                ]),
            ],
            [
                'name' => 'هبة جويد',
                'image' => 'Ellipse 6-1.png',
                'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات
            بالإضافة إلى تصوير حديثي الولادة',
                // 'numOfhours' => 3,
                'images' => json_encode([
                    'Ellipse 6-1.png',
                    'Ellipse 6-1.png',
                    'Ellipse 6-1.png',
                ]),
            ],
            [
                'name' => ' ساهر سويدان ', 'image' => 'Ellipse 6-3.png',
                'bio' => 'تصوير جميع المناسبات
            مع توافر جميع الإكسسوارات
            بالإضافة إلى تصوير حديثي الولادة',
                // 'numOfhours' => 3,
                'images' => json_encode([
                    'Ellipse 6-3.png',
                    'Ellipse 6-3.png',
                    'Ellipse 6-3.png',
                ]),
            ],
        ];
        Photographer::insert($photograohers);
        // DB::table('photographers')->insert($photograohers);
    }
}
