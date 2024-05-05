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
            ['id' => '1', 'name' => 'Văn học', 'parent_id' => '0', 'slug' => 'van-hoc'],
            ['id' => '2', 'name' => 'Tiểu thuyết', 'parent_id' => '1', 'slug' => 'tieu-thuyet'],
            ['id' => '3', 'name' => 'Tiểu thuyết trong nước', 'parent_id' => '2', 'slug' => 'tieu-thuyet-trong-nuoc'],
            ['id' => '4', 'name' => 'Tiểu thuyết nước ngoài', 'parent_id' => '2', 'slug' => 'tieu-thuyet-nuoc-ngoai'],
            ['id' => '5', 'name' => 'Sách giáo khoa', 'parent_id' => '0', 'slug' => 'sach-giao-khoa'],
            ['id' => '6', 'name' => 'Ngữ văn', 'parent_id' => '5', 'slug' => 'ngu-van'],
            ['id' => '7', 'name' => 'Toán', 'parent_id' => '5', 'slug' => 'toan'],
            ['id' => '8', 'name' => 'Toán phổ thông', 'parent_id' => '7', 'slug' => 'toan-pho-thong'],
            ['id' => '9', 'name' => 'Toán giải tích', 'parent_id' => '8', 'slug' => 'toan-hinh-hoc'],
            ['id' => '10', 'name' => 'Toán hình học', 'parent_id' => '8', 'slug' => 'toan-giai-tich'],           
        ]);
    }
}
