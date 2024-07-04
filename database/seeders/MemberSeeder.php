<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('members')->insert([
            ['last_name' => 'Âu Dương Hoàng', 'first_name' => 'Long','phone' => '0891234567', 'address' => 'Tp. Hồ Chí Minh', 'email' => '0306201253@caothang.edu.vn', 'password' =>bcrypt('123456')],
            ['last_name' => 'Hệ Thống', 'first_name' => 'Nhân Viên','phone' => '0891234567', 'address' => 'Tp. Hồ Chí Minh', 'email' => 'hotro@gmail.com', 'password' =>bcrypt('123456')],
        ]);
    }
}
