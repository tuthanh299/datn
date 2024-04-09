<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Văn học', 'parent_id' => '0', 'slug' => 'van-hoc'],
            ['name' => 'Tiểu thuyết', 'parent_id' => '1', 'slug' => 'tieu-thuyet'],
            ['name' => 'Tiểu thuyết trong nước', 'parent_id' => '2', 'slug' => 'tieu-thuyet-trong-nuoc'],
            ['name' => 'Tiểu thuyết nước ngoài', 'parent_id' => '2', 'slug' => 'tieu-thuyet-nuoc-ngoai'],
            ['name' => 'Sách giáo khoa', 'parent_id' => '0', 'slug' => 'sach-giao-khoa'],
            ['name' => 'Ngữ văn', 'parent_id' => '5', 'slug' => 'ngu-van'],
            ['name' => 'Toán', 'parent_id' => '5', 'slug' => 'toan'],
            ['name' => 'Toán phổ thông', 'parent_id' => '7', 'slug' => 'toan-pho-thong'],
            ['name' => 'Toán giải tích', 'parent_id' => '8', 'slug' => 'toan-hinh-hoc'],
            ['name' => 'Toán hình học', 'parent_id' => '8', 'slug' => 'toan-giai-tich'],           
        ]);
    }
}
