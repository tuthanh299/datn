<?php

namespace Database\Seeders;

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
            ['name' => 'Văn học', 'parent_id' => '0'],
            ['name' => 'Tiểu thuyết', 'parent_id' => '1'],
            ['name' => 'Tiểu thuyết trong nước', 'parent_id' => '2'],
            ['name' => 'Tiểu thuyết nước ngoài', 'parent_id' => '2'],
            ['name' => 'Sách giáo khoa', 'parent_id' => '0'],
            ['name' => 'Ngữ văn', 'parent_id' => '5'],
            ['name' => 'Toán', 'parent_id' => '5'],
            ['name' => 'Toán phổ thông', 'parent_id' => '7'],
            ['name' => 'Toán giải tích', 'parent_id' => '8'],
            ['name' => 'Toán hình học', 'parent_id' => '8'],           
            ['name' => 'Ngôn tình', 'parent_id' => '1'],
            ['name' => 'Truyện ngắn', 'parent_id' => '1'],
            ['name' => 'Truyện ngụ ngôn', 'parent_id' => '1'],
            ['name' => 'Ngữ Văn', 'parent_id' => '5'],
            ['name' => 'Tiểu Thuyết Nuớc Ngoài 2', 'parent_id' => '2'],
            ['name' => 'Tiểu Thuyết Trong Nước 2', 'parent_id' => '2'],
            ['name' => 'Ngôn tình Trong Nước', 'parent_id' => '12'],
            ['name' => 'Ngôn tình Trong Nước 1', 'parent_id' => '12'],
            ['name' => 'Ngôn tình Trong Nước 2', 'parent_id' => '12'],
            ['name' => 'Ngôn tình nước ngoài 2', 'parent_id' => '12'],
        ]);
    }
}
