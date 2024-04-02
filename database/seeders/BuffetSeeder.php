<?php

namespace Database\Seeders;

use App\Models\Buffet;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BuffetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buffet::factory(7)->create();

        // Buffet::factory()->create([
        //     'name' => 'بوفيه حلويات  بروفيشنال',
        //     'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
        //     'type' => 'حلو',
        //     'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
        //     'price' => 30.0000,
        //     'category_id' => 3,

        // ]);
        DB::table('buffets')->delete();
        $buffets = array(
            array(
                'name' => 'بوفيه حلويات  بروفيشنال', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'حلو',
                'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                'price' => 30.0000,
                'category_id' => 3,
            ),
            array(
                'name' => 'كيك الايس كريم', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'كيك',
                'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                'price' => 30.0000,
                'category_id' => 3,
            ),
            array(
                'name' => 'فطور عربي ملكي', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'فطور',
                'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                'price' => 30.0000,
                'category_id' => 1,
            ),
            array(
                'name' => 'بوفيه غداء فاخر',  'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'غداء',
                'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                'price' => 30.0000,
                'category_id' => 1,
            ),
            array(
                'name' => 'فطور غربي ', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'فطور',
                'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                'price' => 30.0000,
                'category_id' => 2,
            ),
            array(
                'name' => 'بوفيه عشاء فاخر',  'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'غداء',
                'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
                'price' => 30.0000,
                'category_id' => 2,
            ),
        );
        DB::table('buffets')->insert($buffets);
    }
}
