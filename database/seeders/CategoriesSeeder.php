<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*DB::table('categories')->insert([
            ['name' => 'Văn học', 'parent_id' => '0'],
            ['name' => 'Tiểu thuyết', 'parent_id' => '1'],
            ['name' => 'Tiểu thuyết trong nước', 'parent_id' => '2'],
            ['name' => 'Tiểu thuyết nước ngoài', 'parent_id' => '2'],
            ['name' => 'Sách giáo khoa', 'parent_id' => '0'],
            ['name' => 'Ngữ văn', 'parent_id' => '5'],
            ['name' => 'Toán', 'parent_id' => '5'],
            ['name' => 'Tiếng Anh', 'parent_id' => '5'],
            ['name' => 'Toán phổ thông', 'parent_id' => '8'],
            ['name' => 'Toán giải tích', 'parent_id' => '9'],
            ['name' => 'Toán hình học', 'parent_id' => '9'],           
            ['name' => 'Ngôn tình', 'parent_id' => '1'],
            ['name' => 'Truyện ngắn', 'parent_id' => '1'],
            ['name' => 'Truyện ngụ ngôn', 'parent_id' => '1'],
            ['name' => 'Tiểu Thuyết Nuớc Ngoài 2', 'parent_id' => '2'],
            ['name' => 'Tiểu Thuyết Trong Nước 2', 'parent_id' => '2'],
            ['name' => 'Ngôn tình Trong Nước', 'parent_id' => '12'],
            ['name' => 'Ngôn tình Trong Nước 1', 'parent_id' => '12'],
            ['name' => 'Ngôn tình Trong Nước 2', 'parent_id' => '12'],
            ['name' => 'Ngôn tình nước ngoài 2', 'parent_id' => '12'],
        ]);*/

        DB::table('categories')->insert([
            //văn học
            ['name' => 'Văn học', 'parent_id' => '0'], //1
            ['name' => 'Tiểu thuyết', 'parent_id' => '1'],  //2
            ['name' => 'Tiểu thuyết trong nước', 'parent_id' => '2'], //3
            ['name' => 'Tiểu thuyết nước ngoài', 'parent_id' => '2'], //4
            //end văn học
            //sách giáo khoa
            ['name' => 'Sách giáo khoa', 'parent_id' => '0'], //5
            ['name' => 'Ngữ văn', 'parent_id' => '5'], //6
            ['name' => 'Toán', 'parent_id' => '5'], //7 
            ['name' => 'Tiếng Anh', 'parent_id' => '5'], //8
            ['name' => 'Ngữ văn cấp 1', 'parent_id' => '6'], //9
            ['name' => 'Ngữ văn cấp 2', 'parent_id' => '6'], //10
            ['name' => 'Ngữ văn cấp 3', 'parent_id' => '6'], //11
            ['name' => 'Toán cấp 1', 'parent_id' => '7'], //12
            ['name' => 'Toán cấp 2', 'parent_id' => '7'], //13
            ['name' => 'Toán cấp 3', 'parent_id' => '7'], //14
            ['name' => 'Tiếng anh cấp 1', 'parent_id' => '8'], //15
            ['name' => 'Tiếng anh cấp 2', 'parent_id' => '8'], //16
            ['name' => 'Tiếng anh cấp 3', 'parent_id' => '8'], //17
            //end sách giáo khoa
            //Sách tham khảo
            ['name' => 'Sách tham khảo', 'parent_id' => '0'], //18
            ['name' => 'Toán', 'parent_id' => '18'], //19
            ['name' => 'Ngữ văn', 'parent_id' => '18'], //20
            ['name' => 'Tiếng anh', 'parent_id' => '18'], //21
            //end sách tham khảo
            //Truyện tranh
            ['name' => 'Sách thiếu nhi, thiếu niên', 'parent_id' => '0'], //22
            ['name' => 'Truyện tranh thiếu nhi', 'parent_id' => '22'], //23
            ['name' => 'Manga - Comic', 'parent_id' => '22'], //24
            ['name' => 'Kiến thức bách khoa', 'parent_id' => '22'], //25
        ]);
    }
}