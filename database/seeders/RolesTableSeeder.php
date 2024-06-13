<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        //DB::table('roles')->delete();
        
        DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Quản trị hệ thống',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'guest',
                'display_name' => 'Khách hàng',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'content',
                'display_name' => 'Chỉnh sửa nội dung',
                'created_at' => NULL,
                'updated_at' => NULL,
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Nhap lieu san pham11',
                'display_name' => 'Co cac chuc nang cua san phamn11',
                'created_at' => '2024-05-25 17:30:56',
                'updated_at' => '2024-06-07 16:16:00',
                'deleted_at' => '2024-06-07 16:16:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Admin Tối Thượng',
                'display_name' => 'Có tất cả các quyền xử lý',
                'created_at' => '2024-06-07 16:16:31',
                'updated_at' => '2024-06-07 16:16:31',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Giữ xe',
                'display_name' => 'Trông xe cho cửa hàng',
                'created_at' => '2024-06-07 16:56:44',
                'updated_at' => '2024-06-07 16:56:44',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Nhân viên Viết Bài',
                'display_name' => 'Có tất cả các quyền về bài viết tin tức',
                'created_at' => '2024-06-09 02:08:40',
                'updated_at' => '2024-06-09 02:08:40',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}