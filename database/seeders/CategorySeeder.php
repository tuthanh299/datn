<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name"=> "Sách Giáo Khoa",
            "parent_id"=> "GK",
            "slug"=> ""
        ]);

        Category::create([
            "name"=> "Sách Tham Khảo",
            "parent_id"=> "TK",
            "slug"=> ""
        ]);

        Category::create([
            "name"=> "Sách Kỹ Năng Sống",
            "parent_id"=> "KNS",
            "slug"=> ""
        ]);

        /*DB::table("categories")->insert([
            ["name"=> "Sách Giáo Khoa", "parent_id"=> "GK", "slug"=> ""],
            ["name"=> "Sách Tham Khảo", "parent_id"=> "TK", "slug"=> ""],
            ["name"=> "Sách Kỹ Năng Sống", "parent_id"=> "KNS", "slug"=> ""],
        ]);*/
    }
}
