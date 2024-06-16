<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        //DB::table('categories')->delete();
        
        DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Văn học',
                'parent_id' => 0,
                'slug' => 'van-hoc',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Tiểu thuyết',
                'parent_id' => 1,
                'slug' => 'tieu-thuyet',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Tiểu thuyết trong nước',
                'parent_id' => 2,
                'slug' => 'tieu-thuyet-trong-nuoc',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Tiểu thuyết nước ngoài',
                'parent_id' => 2,
                'slug' => 'tieu-thuyet-nuoc-ngoai',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Sách giáo khoa',
                'parent_id' => 0,
                'slug' => 'sach-giao-khoa',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 7,
                'name' => 'Toán',
                'parent_id' => 5,
                'slug' => 'toan',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 8,
                'name' => 'Toán phổ thông',
                'parent_id' => 7,
                'slug' => 'toan-pho-thong',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 9,
                'name' => 'Toán giải tích',
                'parent_id' => 8,
                'slug' => 'toan-hinh-hoc',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 10,
                'name' => 'Toán hình học',
                'parent_id' => 8,
                'slug' => 'toan-giai-tich',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 11,
                'name' => 'Danh mục Test',
                'parent_id' => 0,
                'slug' => 'danh-muc-test',
                'created_at' => '2024-05-04 16:05:30',
                'updated_at' => '2024-05-17 16:19:19',
                'deleted_at' => '2024-05-17 16:19:19',
            ),
            10 => 
            array (
                'id' => 12,
                'name' => 'Ngôn tình',
                'parent_id' => 1,
                'slug' => 'ngon-tinh',
                'created_at' => '2024-05-08 15:18:41',
                'updated_at' => '2024-05-08 15:18:41',
                'deleted_at' => NULL,
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'Truyện ngắn',
                'parent_id' => 1,
                'slug' => 'truyen-ngan',
                'created_at' => '2024-05-08 15:18:54',
                'updated_at' => '2024-05-08 15:18:54',
                'deleted_at' => NULL,
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'Truyện Ngụ Ngôn',
                'parent_id' => 1,
                'slug' => 'truyen-ngu-ngon',
                'created_at' => '2024-05-08 15:19:21',
                'updated_at' => '2024-05-08 15:19:21',
                'deleted_at' => NULL,
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'Truyện cổ tích',
                'parent_id' => 1,
                'slug' => 'truyen-co-tich',
                'created_at' => '2024-05-08 16:12:44',
                'updated_at' => '2024-05-08 16:12:44',
                'deleted_at' => NULL,
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'Ngữ văn',
                'parent_id' => 5,
                'slug' => 'ngu-van',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            15 => 
            array (
                'id' => 18,
                'name' => 'Tiểu Thuyết Nước Ngoài 2',
                'parent_id' => 2,
                'slug' => 'tieu-thuyet-nuoc-ngoai-2',
                'created_at' => '2024-05-17 16:13:08',
                'updated_at' => '2024-05-17 16:13:08',
                'deleted_at' => NULL,
            ),
            16 => 
            array (
                'id' => 19,
                'name' => 'Tiểu Thuyết Trong Nước 2',
                'parent_id' => 2,
                'slug' => 'tieu-thuyet-trong-nuoc-2',
                'created_at' => '2024-05-17 16:13:18',
                'updated_at' => '2024-05-17 16:13:18',
                'deleted_at' => NULL,
            ),
            17 => 
            array (
                'id' => 20,
                'name' => 'Ngôn tình Trong nước',
                'parent_id' => 12,
                'slug' => 'ngon-tinh-trong-nuoc',
                'created_at' => '2024-05-17 16:14:10',
                'updated_at' => '2024-05-17 16:14:10',
                'deleted_at' => NULL,
            ),
            18 => 
            array (
                'id' => 21,
                'name' => 'Ngôn tình Trong nước 2',
                'parent_id' => 12,
                'slug' => 'ngon-tinh-trong-nuoc-2',
                'created_at' => '2024-05-17 16:14:26',
                'updated_at' => '2024-05-17 16:14:26',
                'deleted_at' => NULL,
            ),
            19 => 
            array (
                'id' => 22,
                'name' => 'Ngôn tình nước ngoài 2',
                'parent_id' => 12,
                'slug' => 'ngon-tinh-nuoc-ngoai-2',
                'created_at' => '2024-05-17 16:14:39',
                'updated_at' => '2024-05-17 16:14:39',
                'deleted_at' => NULL,
            ),
            20 => 
            array (
                'id' => 23,
                'name' => 'Ngôn tình Trong nước 1',
                'parent_id' => 12,
                'slug' => 'ngon-tinh-trong-nuoc-1',
                'created_at' => '2024-05-17 16:14:50',
                'updated_at' => '2024-05-17 16:14:50',
                'deleted_at' => NULL,
            ),
            21 => 
            array (
                'id' => 24,
                'name' => 'Ngữ văn cấp 1',
                'parent_id' => 16,
                'slug' => 'ngu-van-cap-1',
                'created_at' => '2024-05-17 16:15:21',
                'updated_at' => '2024-05-17 16:15:21',
                'deleted_at' => NULL,
            ),
            22 => 
            array (
                'id' => 25,
                'name' => 'Ngữ văn cấp 2',
                'parent_id' => 16,
                'slug' => 'ngu-van-cap-2',
                'created_at' => '2024-05-17 16:15:29',
                'updated_at' => '2024-05-17 16:15:29',
                'deleted_at' => NULL,
            ),
            23 => 
            array (
                'id' => 26,
                'name' => 'Ngữ văn cấp 3',
                'parent_id' => 16,
                'slug' => 'ngu-van-cap-3',
                'created_at' => '2024-05-17 16:15:39',
                'updated_at' => '2024-05-17 16:15:39',
                'deleted_at' => NULL,
            ),
            24 => 
            array (
                'id' => 27,
                'name' => 'Truyện ngắn 1',
                'parent_id' => 13,
                'slug' => 'truyen-ngan-1',
                'created_at' => '2024-05-17 16:16:06',
                'updated_at' => '2024-05-17 16:16:06',
                'deleted_at' => NULL,
            ),
            25 => 
            array (
                'id' => 28,
                'name' => 'Truyện ngắn 2',
                'parent_id' => 13,
                'slug' => 'truyen-ngan-2',
                'created_at' => '2024-05-17 16:16:16',
                'updated_at' => '2024-05-17 16:16:16',
                'deleted_at' => NULL,
            ),
            26 => 
            array (
                'id' => 29,
                'name' => 'Truyện ngắn 3',
                'parent_id' => 13,
                'slug' => 'truyen-ngan-3',
                'created_at' => '2024-05-17 16:16:26',
                'updated_at' => '2024-05-17 16:16:26',
                'deleted_at' => NULL,
            ),
            27 => 
            array (
                'id' => 30,
                'name' => 'Truyện Ngụ Ngôn 1',
                'parent_id' => 14,
                'slug' => 'truyen-ngu-ngon-1',
                'created_at' => '2024-05-17 16:17:09',
                'updated_at' => '2024-05-17 16:17:09',
                'deleted_at' => NULL,
            ),
            28 => 
            array (
                'id' => 31,
                'name' => 'Truyện Ngụ Ngôn 2',
                'parent_id' => 14,
                'slug' => 'truyen-ngu-ngon-2',
                'created_at' => '2024-05-17 16:17:24',
                'updated_at' => '2024-05-17 16:17:24',
                'deleted_at' => NULL,
            ),
            29 => 
            array (
                'id' => 32,
                'name' => 'Truyện Cổ Tích 1',
                'parent_id' => 15,
                'slug' => 'truyen-co-tich-1',
                'created_at' => '2024-05-17 16:17:40',
                'updated_at' => '2024-05-17 16:17:40',
                'deleted_at' => NULL,
            ),
            30 => 
            array (
                'id' => 33,
                'name' => 'Truyện Cổ Tích 2',
                'parent_id' => 15,
                'slug' => 'truyen-co-tich-2',
                'created_at' => '2024-05-17 16:17:51',
                'updated_at' => '2024-05-17 16:17:51',
                'deleted_at' => NULL,
            ),
            31 => 
            array (
                'id' => 34,
                'name' => 'Sách pháp luật',
                'parent_id' => 1,
                'slug' => 'sach-phap-luat',
                'created_at' => '2024-05-17 16:18:26',
                'updated_at' => '2024-05-17 16:18:26',
                'deleted_at' => NULL,
            ),
            32 => 
            array (
                'id' => 35,
                'name' => 'Truyện ngắn 4',
                'parent_id' => 13,
                'slug' => 'truyen-ngan-4',
                'created_at' => '2024-05-17 16:18:44',
                'updated_at' => '2024-05-17 16:18:44',
                'deleted_at' => NULL,
            ),
            33 => 
            array (
                'id' => 36,
                'name' => 'Ngôn ngữ lập trình',
                'parent_id' => 0,
                'slug' => 'ngon-ngu-lap-trinh',
                'created_at' => '2024-05-17 16:19:54',
                'updated_at' => '2024-05-17 16:19:54',
                'deleted_at' => NULL,
            ),
            34 => 
            array (
                'id' => 37,
                'name' => 'C#',
                'parent_id' => 36,
                'slug' => 'c',
                'created_at' => '2024-05-17 16:20:07',
                'updated_at' => '2024-05-17 16:20:07',
                'deleted_at' => NULL,
            ),
            35 => 
            array (
                'id' => 38,
                'name' => 'c# cơ bản',
                'parent_id' => 37,
                'slug' => 'c-co-ban',
                'created_at' => '2024-05-17 16:20:15',
                'updated_at' => '2024-05-17 16:20:15',
                'deleted_at' => NULL,
            ),
            36 => 
            array (
                'id' => 39,
                'name' => 'c# nâng cao',
                'parent_id' => 37,
                'slug' => 'c-nang-cao',
                'created_at' => '2024-05-17 16:20:23',
                'updated_at' => '2024-05-17 16:20:23',
                'deleted_at' => NULL,
            ),
            37 => 
            array (
                'id' => 40,
                'name' => 'c# Đi làm',
                'parent_id' => 37,
                'slug' => 'c-di-lam',
                'created_at' => '2024-05-17 16:20:44',
                'updated_at' => '2024-05-17 16:20:44',
                'deleted_at' => NULL,
            ),
            38 => 
            array (
                'id' => 41,
                'name' => 'php',
                'parent_id' => 36,
                'slug' => 'php',
                'created_at' => '2024-05-17 16:20:50',
                'updated_at' => '2024-05-17 16:20:50',
                'deleted_at' => NULL,
            ),
            39 => 
            array (
                'id' => 42,
                'name' => 'php cơ bản',
                'parent_id' => 41,
                'slug' => 'php-co-ban',
                'created_at' => '2024-05-17 16:20:59',
                'updated_at' => '2024-05-17 16:20:59',
                'deleted_at' => NULL,
            ),
            40 => 
            array (
                'id' => 43,
                'name' => 'php nâng cao',
                'parent_id' => 41,
                'slug' => 'php-nang-cao',
                'created_at' => '2024-05-17 16:21:06',
                'updated_at' => '2024-06-07 16:33:43',
                'deleted_at' => '2024-06-07 16:33:43',
            ),
            41 => 
            array (
                'id' => 44,
                'name' => 'php cho người đi làm',
                'parent_id' => 41,
                'slug' => 'php-cho-nguoi-di-lam',
                'created_at' => '2024-05-17 16:21:14',
                'updated_at' => '2024-06-07 16:33:01',
                'deleted_at' => '2024-06-07 16:33:01',
            ),
        ));
        
        
    }
}