<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Danh mục sản phẩm',
                'display_name' => 'Danh mục sản phẩm',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 0,
                'key_permissions' => '0',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Danh sách danh mục',
                'display_name' => 'Danh sách danh mục',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 1,
                'key_permissions' => 'list_category',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Thêm danh mục',
                'display_name' => 'Thêm danh mục',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 1,
                'key_permissions' => 'add_category',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Sửa danh mục',
                'display_name' => 'Sửa danh mục',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 1,
                'key_permissions' => 'edit_category',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Xóa danh mục',
                'display_name' => 'Xóa danh mục',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 1,
                'key_permissions' => 'delete_category',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Slider',
                'display_name' => 'Slider',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 0,
                'key_permissions' => '0',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Danh sách slider',
                'display_name' => 'Danh sách slider',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 6,
                'key_permissions' => 'list_slider',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Thêm slider',
                'display_name' => 'Thêm slider',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 6,
                'key_permissions' => 'add_slider',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Sửa slider',
                'display_name' => 'Sửa slider',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 6,
                'key_permissions' => 'edit_slider',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Xóa slider',
                'display_name' => 'Xóa slider',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 6,
                'key_permissions' => 'delete_slider',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Sản phẩm',
                'display_name' => 'Sản phẩm',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 0,
                'key_permissions' => '0',
            ),
            11 => 
            array (
                'id' => 13,
                'name' => 'Danh sách sản phẩm',
                'display_name' => 'Danh sách sản phẩm',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 11,
                'key_permissions' => 'list_product',
            ),
            12 => 
            array (
                'id' => 14,
                'name' => 'Thêm sản phẩm',
                'display_name' => 'Thêm sản phẩm',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 11,
                'key_permissions' => 'add_product',
            ),
            13 => 
            array (
                'id' => 15,
                'name' => 'Sửa sản phẩm',
                'display_name' => 'Sửa sản phẩm',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 11,
                'key_permissions' => 'edit_product',
            ),
            14 => 
            array (
                'id' => 16,
                'name' => 'Xóa sản phẩm',
                'display_name' => 'Xóa sản phẩm',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 11,
                'key_permissions' => 'delete_product',
            ),
            15 => 
            array (
                'id' => 17,
                'name' => 'Cấu hình chung',
                'display_name' => 'Cấu hình chung',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 0,
                'key_permissions' => '0',
            ),
            16 => 
            array (
                'id' => 18,
                'name' => 'Xem cấu hình chung',
                'display_name' => 'Xem cấu hình chung',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 17,
                'key_permissions' => 'list_setting',
            ),
            17 => 
            array (
                'id' => 19,
                'name' => 'Sửa cấu hình chung',
                'display_name' => 'Sửa cấu hình chung',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 17,
                'key_permissions' => 'edit_setting',
            ),
            18 => 
            array (
                'id' => 20,
                'name' => 'Nhân viên',
                'display_name' => 'Nhân viên',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 0,
                'key_permissions' => '0',
            ),
            19 => 
            array (
                'id' => 21,
                'name' => 'Danh sách nhân viên',
                'display_name' => 'Danh sách nhân viên',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 20,
                'key_permissions' => 'list_user',
            ),
            20 => 
            array (
                'id' => 22,
                'name' => 'Thêm nhân viên',
                'display_name' => 'Thêm nhân viên',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 20,
                'key_permissions' => 'add_user',
            ),
            21 => 
            array (
                'id' => 23,
                'name' => 'Sửa nhân viên',
                'display_name' => 'Sửa nhân viên',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 20,
                'key_permissions' => 'edit_user',
            ),
            22 => 
            array (
                'id' => 24,
                'name' => 'Xóa nhân viên',
                'display_name' => 'Xóa nhân viên',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 20,
                'key_permissions' => 'delete_user',
            ),
            23 => 
            array (
                'id' => 25,
                'name' => 'Vai trò',
                'display_name' => 'Vai trò',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 0,
                'key_permissions' => '0',
            ),
            24 => 
            array (
                'id' => 26,
                'name' => 'Danh sách vai trò',
                'display_name' => 'Danh sách vai trò',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 25,
                'key_permissions' => 'list_role',
            ),
            25 => 
            array (
                'id' => 27,
                'name' => 'Thêm vai trò',
                'display_name' => 'Thêm vai trò',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 25,
                'key_permissions' => 'add_role',
            ),
            26 => 
            array (
                'id' => 28,
                'name' => 'Sửa vai trò',
                'display_name' => 'Sửa vai trò',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 25,
                'key_permissions' => 'edit_role',
            ),
            27 => 
            array (
                'id' => 29,
                'name' => 'Xóa vai trò',
                'display_name' => 'Xóa vai trò',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 25,
                'key_permissions' => 'delete_role',
            ),
            28 => 
            array (
                'id' => 30,
                'name' => 'Bài viết',
                'display_name' => 'Bài viết',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 0,
                'key_permissions' => '',
            ),
            29 => 
            array (
                'id' => 31,
                'name' => 'Danh Sách Bài Viết',
                'display_name' => 'Danh Sách Bài Viết',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 30,
                'key_permissions' => 'list_news',
            ),
            30 => 
            array (
                'id' => 32,
                'name' => 'Thêm Bài Viết',
                'display_name' => 'Thêm Bài Viết',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 30,
                'key_permissions' => 'add_news',
            ),
            31 => 
            array (
                'id' => 33,
                'name' => 'Sửa Bài Viết',
                'display_name' => 'Sửa Bài Viết',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 30,
                'key_permissions' => 'edit_news',
            ),
            32 => 
            array (
                'id' => 34,
                'name' => 'Xóa Bài Viết',
                'display_name' => 'Xóa Bài Viết',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 30,
                'key_permissions' => 'delete_news',
            ),
            33 => 
            array (
                'id' => 35,
                'name' => 'Nhà Xuất Bản',
                'display_name' => 'Nhà Xuất Bản',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 0,
                'key_permissions' => '',
            ),
            34 => 
            array (
                'id' => 36,
                'name' => 'Danh Sách Nhà Xuất Bản',
                'display_name' => 'Danh Sách Nhà Xuất Bản',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 35,
                'key_permissions' => 'list_publisher',
            ),
            35 => 
            array (
                'id' => 37,
                'name' => 'Thêm Nhà Xuất Bản',
                'display_name' => 'Thêm Nhà Xuất Bản',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 35,
                'key_permissions' => 'add_publisher',
            ),
            36 => 
            array (
                'id' => 38,
                'name' => 'Sửa Nhà Xuất Bản',
                'display_name' => 'Sửa Nhà Xuất Bản',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 35,
                'key_permissions' => 'edit_publisher',
            ),
            37 => 
            array (
                'id' => 39,
                'name' => 'Xóa Nhà Xuất Bản',
                'display_name' => 'Xóa Nhà Xuất Bản',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 35,
                'key_permissions' => 'delete_publisher',
            ),
            38 => 
            array (
                'id' => 40,
                'name' => 'Bài Viết Giới Thiệu',
                'display_name' => 'Bài Viết Giới Thiệu',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 0,
                'key_permissions' => '',
            ),
            39 => 
            array (
                'id' => 41,
                'name' => 'Xem Bài Viết Giới Thiệu',
                'display_name' => 'Xem Bài Viết Giới Thiệu',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 40,
                'key_permissions' => 'list_staticnews',
            ),
            40 => 
            array (
                'id' => 42,
                'name' => 'Sửa Bài Viết Giới Thiệu',
                'display_name' => 'Sửa Bài Viết Giới Thiệu',
                'created_at' => NULL,
                'updated_at' => NULL,
                'parent_id' => 40,
                'key_permissions' => 'edit_staticnews',
            ),
        ));
        
        
    }
}