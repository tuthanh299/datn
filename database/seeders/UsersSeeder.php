<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'name' => 'Long',
            'email' => 'long@example.com',
            'password' => '123456@',
            'phone' => '0909123456'
        ]);

        User::factory()->create([
            'name' => 'Tú',
            'email' => 'tu@example.com',
            'password' => '123456@',
            'phone' => '0909123456',           
        ]);
    }
}
