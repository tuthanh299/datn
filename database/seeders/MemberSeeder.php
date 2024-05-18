<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Member::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'phone' => '0768848015',
            'address' => 'Tp. Hồ Chí Minh',
            'password' => Hash::make('123456'),
            'provider' => '',
            'provider_id' => '',
            'provider_token' => '',
            'remember_token' => '',
            'created_at' => now(),
        ]);
    }
}
