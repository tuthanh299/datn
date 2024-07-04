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
        DB::table('orders_status')->insert([
            ['name' => 'Đã đặt', 'class_order' => 'text-primary'],
            ['name' => 'Đã xác nhận', 'class_order' => 'text-info'],
            ['name' => 'Đang giao hàng', 'class_order' => 'text-warning'],
            ['name' => 'Đã giao', 'class_order' => 'text-success'],
            ['name' => 'Đã huỷ', 'class_order' => 'text-danger'],
        ]);
    }
}
