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
            ['name' => 'Danh mục Test', 'parent_id' => '0', 'slug' => 'danh-muc-test'],           
            ['name' => 'Ngôn tình', 'parent_id' => '1', 'slug' => 'ngon-tinh'],           
            ['name' => 'Truyện ngắn', 'parent_id' => '1', 'slug' => 'truyen-ngan'],           
            ['name' => 'Truyện ngụ ngôn', 'parent_id' => '1', 'slug' => 'truyen-ngu-ngon'],           
            ['name' => 'Ngữ Văn', 'parent_id' => '5', 'slug' => 'ngu-van'],           
            ['name' => 'Tiểu Thuyết Nuớc Ngoài 2', 'parent_id' => '2', 'slug' => 'tieu-thuyet-nuoc-ngoai-2'],           
            ['name' => 'Tiểu Thuyết Trong Nước 2', 'parent_id' => '2', 'slug' => 'tieu-thuyet-trong-nuoc-2'],             
            ['name' => 'Ngôn tình Trong Nước', 'parent_id' => '12', 'slug' => 'ngon-tinh-trong-nuoc'],             
            ['name' => 'Ngôn tình Trong Nước 1', 'parent_id' => '12', 'slug' => 'ngon-tinh-trong-nuoc-1'],             
            ['name' => 'Ngôn tình Trong Nước 2', 'parent_id' => '12', 'slug' => 'ngon-tinh-trong-nuoc-2'],             
            ['name' => 'Ngôn tình nước ngoài 2', 'parent_id' => '12', 'slug' => 'ngon-tinh-nuoc-ngoai-2'],                       
        ]);
    }
}
