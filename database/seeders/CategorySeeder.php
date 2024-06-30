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
            ['name' => 'Ngữ văn lớp 6', 'parent_id' => '6'], //10
            ['name' => 'Ngữ văn lớp 7', 'parent_id' => '6'], //11
            ['name' => 'Ngữ văn lớp 8', 'parent_id' => '6'], //12
            ['name' => 'Ngữ văn lớp 9', 'parent_id' => '6'], //13
            ['name' => 'Ngữ văn lớp 10', 'parent_id' => '6'], //14
            ['name' => 'Ngữ văn lớp 11', 'parent_id' => '6'], //15
            ['name' => 'Ngữ văn lớp 12', 'parent_id' => '6'], //16
            ['name' => 'Toán lớp 6', 'parent_id' => '7'], //17
            ['name' => 'Toán lớp 7', 'parent_id' => '7'], //18
            ['name' => 'Toán lớp 8', 'parent_id' => '7'], //19
            ['name' => 'Toán lớp 9', 'parent_id' => '7'], //20
            ['name' => 'Toán lớp 10', 'parent_id' => '7'], //21
            ['name' => 'Toán lớp 11', 'parent_id' => '7'], //22
            ['name' => 'Toán lớp 12', 'parent_id' => '7'], //23
            ['name' => 'Tiếng anh lớp 6', 'parent_id' => '8'], //24
            ['name' => 'Tiếng anh lớp 7', 'parent_id' => '8'], //25
            ['name' => 'Tiếng anh lớp 8', 'parent_id' => '8'], //26
            ['name' => 'Tiếng anh lớp 9', 'parent_id' => '8'], //27
            ['name' => 'Tiếng anh lớp 10', 'parent_id' => '8'], //28
            ['name' => 'Tiếng anh lớp 11', 'parent_id' => '8'], //29
            ['name' => 'Tiếng anh lớp 12', 'parent_id' => '8'], //30
            //end sách giáo khoa
            //Sách tham khảo
            ['name' => 'Sách tham khảo', 'parent_id' => '0'], //31
            ['name' => 'Toán', 'parent_id' => '31'], //32
            ['name' => 'Ngữ văn', 'parent_id' => '31'], //33
            ['name' => 'Tiếng anh', 'parent_id' => '31'], //34
            //end sách tham khảo
            //Truyện tranh
            ['name' => 'Sách thiếu nhi, thiếu niên', 'parent_id' => '0'], //35
            ['name' => 'Truyện tranh thiếu nhi', 'parent_id' => '35'], //36
            ['name' => 'Manga - Comic', 'parent_id' => '35'], //37
            ['name' => 'Kiến thức bách khoa', 'parent_id' => '35'], //38
        ]);
    }
}
