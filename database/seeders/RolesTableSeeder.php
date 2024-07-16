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
                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'manager',
                'display_name' => 'Quản lý',
                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Nhập liệu bài viết',
                'display_name' => '',
                'created_at' => '2024-07-04 12:22:59',
                'updated_at' => '2024-07-04 12:22:59',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Nhập sản phẩm',
                'display_name' => 'Có các chức năng của sản phẩm',
                'created_at' => '2024-05-25 17:30:56',
                'updated_at' => '2024-06-07 16:16:00',
                'deleted_at' => '2024-06-07 16:16:00',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Nhân viên Viết Bài',
                'display_name' => 'Có tất cả các quyền về bài viết tin tức',
                'created_at' => '2024-06-09 02:08:40',
                'updated_at' => '2024-06-09 02:08:40',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}