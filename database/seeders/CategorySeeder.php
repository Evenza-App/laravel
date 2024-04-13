<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory()->create([
        //     'name' => 'شرقي',
        //     'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
        // ]);

        // Category::factory()->create([
        //     'name' => 'غربي',
        //     'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
        // ]);

        // Category::factory()->create([
        //     'name' => 'حلويات',
        //     'image' => 'https://via.placeholder.com/640x480.png/00eedd?text=qui',
        // ]);

        // DB::table('categories')->delete();
        Category::query()->delete();
        $categories = array(
            array('name' => "شرقي", 'image' => 'شرقي.png'),
            array('name' => "غربي", 'image' => 'غربي.png'),
            array('name' => "حلويات", 'image' => 'حلويات.png'),
        );
        Category::insert($categories);
        // DB::table('categories')->insert($categories);
    }
}
