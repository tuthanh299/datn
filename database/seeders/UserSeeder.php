<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['last_name' => 'Lê Thanh', 'first_name' => 'Tú', 'phone' => '0768848015', 'address' => 'Tp. Hồ Chí Minh', 'email' => 'thanhtu@gmail.com', 'password' =>bcrypt('123456'), 'type' => 1],
            ['last_name' => 'Âu Dương Hoàng', 'first_name' => 'Long','phone' => '0768848065', 'address' => 'Tp. Hồ Chí Minh', 'email' => 'hoanglong@gmail.com', 'password' =>bcrypt('123456'),  'type' => 1],
             
        ]);
    }
}
