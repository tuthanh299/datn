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
        /*DB::table('users')->insert([
            ['name' => 'Lê Thanh Tú', 'phone' => '0768848015', 'address' => 'Tp. Hồ Chí Minh', 'email' => '0306201299@caothang.edu.vn', 'password' => Hash::make('123456')],
            ['name' => 'Âu Dương Hoàng Long', 'phone' => '0768848016', 'address' => 'Tp. Hồ Chí Minh', 'email' => '0306201253@caothang.edu.vn', 'password' => Hash::make('123456')],
           
        ]);*/
        User::factory()->create([
            'name' => 'Lê Thanh Tú',
            'phone' => '0768848015',
            'address' => 'Tp. Hồ Chí Minh',
            'email' => '0306201299@caothang.edu.vn',
            'password' => Hash::make('123456'),
            'provider' => '',
            'provider_id' => '',
            'provider_token' => '',
            'remember_token' => '',
            'email_verified_at' => null,
            'created_at' => now(),
            'updated_at' => null,
        ]);

        User::factory()->create([
            'name' => 'Âu Dương Hoàng Long',    
            'phone' => '0768848016',
            'address' => 'Tp. Hồ Chí Minh',
            'email' => '0306201253@caothang.edu.vn',
            'password' => Hash::make('123456'),
            'provider' => '',
            'provider_id' => '',
            'provider_token' => '',
            'remember_token' => '',
            'email_verified_at' => null,
            'created_at' => now(),
            'updated_at' => null,
        ]);
    }
}
