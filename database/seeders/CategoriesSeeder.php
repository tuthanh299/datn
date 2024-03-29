<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'id' => 'GK',
            "name"=> "Sách Giáo Khoa",
            //"parent_id"=> "GK",
            "slug"=> ""
        ]);

        Category::create([
            'id' => 'TK',
            "name"=> "Sách Tham Khảo",
            //"parent_id"=> "TK",
            "slug"=> ""
        ]);

        Category::create([
            'id' => 'KNS',
            "name"=> "Sách Kỹ Năng Sống",
            //"parent_id"=> "KNS",
            "slug"=> ""
        ]);
    }
}
