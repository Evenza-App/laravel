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
        // DB::table('buffets')->delete();
        Buffet::query()->delete();
        $buffets = array(
            array(
                'name' => 'بوفيه حلويات  بروفيشنال', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'حلو',
                'image' => 'بوفيه حلويات  بروفيشنال.png',
                'price' => 30.0000,
                'category_id' => 3,
            ),
            array(
                'name' => 'كيك الايس كريم', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'كيك',
                'image' => 'كيك الايس كريم.png',
                'price' => 30.0000,
                'category_id' => 3,
            ),
            array(
                'name' => 'فطور عربي أصيل', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'فطور',
                'image' => 'فطور عربي ملكي.png',
                'price' => 30.0000,
                'category_id' => 1,
            ),
            array(
                'name' => 'فطور عربي فاخر', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'فطور',
                'image' => 'فطور عربي ملكي.png',
                'price' => 30.0000,
                'category_id' => 1,
            ),
            array(
                'name' => 'فطور عربي منوع', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'فطور',
                'image' => 'فطور عربي ملكي.png',
                'price' => 30.0000,
                'category_id' => 1,
            ),
            array(
                'name' => ' غداء عربي أصيل',  'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'غداء',
                'image' => 'بوفيه غداء فاخر.png',
                'price' => 30.0000,
                'category_id' => 1,
            ),
            array(
                'name' => ' غداء  فاخر',  'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'غداء',
                'image' => 'بوفيه غداء فاخر.png',
                'price' => 30.0000,
                'category_id' => 1,
            ),
            array(
                'name' => ' غداء منوع ',  'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'غداء',
                'image' => 'بوفيه غداء فاخر.png',
                'price' => 30.0000,
                'category_id' => 1,
            ),
            array(
                'name' => 'فطور مودرن ', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'فطور',
                'image' => 'فطور غربي.png',
                'price' => 30.0000,
                'category_id' => 2,
            ),
            array(
                'name' => 'فطور فاخر ', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'فطور',
                'image' => 'فطور غربي.png',
                'price' => 30.0000,
                'category_id' => 2,
            ),
            array(
                'name' => 'فطور متنوع ', 'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'فطور',
                'image' => 'فطور غربي.png',
                'price' => 30.0000,
                'category_id' => 2,
            ),
            array(
                'name' => 'بوفيه عشاء مودرن',  'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'غداء',
                'image' => 'بوفيه عشاء فاخر.png',
                'price' => 30.0000,
                'category_id' => 2,
            ),
            array(
                'name' => 'بوفيه عشاء فاخر',  'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'غداء',
                'image' => 'بوفيه عشاء فاخر.png',
                'price' => 30.0000,
                'category_id' => 2,
            ),
            array(
                'name' => 'بوفيه عشاء منوع',  'ingredients' => 'كول وشكور , مبرومة , بلورية ,وربات بالقشطة , كنافة , كنافة نابلسية بأنواعها , أم النارين , هريسة بقشطة , هريسة  بأنواعها ,معمول بأنواعه , غريبة بقشطة ',
                'type' => 'غداء',
                'image' => 'بوفيه عشاء فاخر.png',
                'price' => 30.0000,
                'category_id' => 2,
            ),
        );
        Buffet::insert($buffets);
        //   DB::table('buffets')->insert($buffets);
    }
}
