<?php

namespace Database\Seeders;

use App\Models\User;
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
            ['last_name' => 'Lê Thanh', 'first_name' => 'Tú', 'phone' => '0768848000', 'address' => 'Tp. Hồ Chí Minh', 'email' => '0306201299@caothang.edu.vn', 'password' =>bcrypt('123456'), 'type' => 1],
            ['last_name' => 'Âu Dương Hoàng', 'first_name' => 'Long','phone' => '0768848065', 'address' => 'Tp. Hồ Chí Minh', 'email' => '0306201253@caothang.edu.vn', 'password' =>bcrypt('123456'),  'type' => 2],
            ['last_name' => 'Thương Nhớ Trà', 'first_name' => 'Long', 'phone' => '0987654321', 'address' => '58 bùi thị xuân', 'email' => 'adm3@gmail.com', 'password' =>bcrypt('123456'),  'type' => 0],
            ['last_name' => 'Nguyễn Thị', 'first_name' => 'Lực', 'phone' => '0987654321', 'address' => '58 bùi thị xuân', 'email' => 'thiluc@gmail.com', 'password' =>bcrypt('123456'),  'type' => 1],
        ]);
    }
}
