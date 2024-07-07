<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_statuses')->insert([
            ['name' => 'Đã đặt'],
            ['name' => 'Đã xác nhận'],
            ['name' => 'Đang giao hàng'],
            ['name' => 'Đã giao'],
            ['name' => 'Đã huỷ'],
        ]);
    }
}
