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
            ['name' => 'Lê Thanh Tú', 'phone' => '0768848000', 'address' => 'Tp. Hồ Chí Minh', 'email' => '0306201299@caothang.edu.vn', 'password' => Hash::make('123456')],
            ['name' => 'Âu Dương Hoàng Long', 'phone' => '0768848065', 'address' => 'Tp. Hồ Chí Minh', 'email' => '0306201253@caothang.edu.vn', 'password' => Hash::make('123456')],
           
        ]);
    }
}
