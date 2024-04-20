<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "category_id"=> "KNS",
            "name"=> "Đắc nhân tâm",
            "description"=> "Mô tả",
            "content"=> "Nội Dung",
            "slug"=> "",
            "photo"=> "",
            "photo2"=> "",
            "regular_price"=> 68000,
            'sale_price'=>0,
            'discount'=>0,
            "publisher"=> "NXB Tổng Hợp",
            "author"=> "Dale Carnegie",
            "code"=> "",
            "status"=> 1,
            "outstanding"=> 0,
        ]);

        Product::create([
            "category_id"=>"GK",
            "name"=> "Âm Nhạc Và Mỹ Thuật Lớp 6",
            "description"=> "Mô tả",
            "content"=> "Nội Dung",
            "slug"=> "",
            "photo"=> "an-v6.jpg",
            "photo2"=> "an-v6.jpg",
            "regular_price"=> 6800,
            'sale_price'=>0,
            'discount'=>0,
            "publisher"=> "NXB Giáo Dục",
            "author"=> "Nhiều tác giả",
            "code"=> "",
            "status"=> 1,
            "outstanding"=> 0,
        ]);

        Product::create([
            "category_id"=>"GK",
            "name"=> "Âm Nhạc Và Mỹ Thuật Lớp 7",
            "description"=> "Mô tả",
            "content"=> "Nội Dung",
            "slug"=> "",
            "photo"=> "an-v7.jpg",
            "photo2"=> "an-v7.jpg",
            "regular_price"=> 6800,
            'sale_price'=>0,
            'discount'=>0,
            "publisher"=> "NXB Giáo Dục",
            "author"=> "Nhiều tác giả",
            "code"=> "",
            "status"=> 1,
            "outstanding"=> 0,
        ]);

        Product::create([
            "category_id"=>"TK",
            "name"=> "50 Đề Minh Hoạ 2023 Toán Học 12",
            "description"=> "Mô tả",
            "content"=> "Nội Dung",
            "slug"=> "",
            "photo"=> "50dmh-t12.jpg",
            "photo2"=> "50dmh-t12.jpg",
            "regular_price"=> 100000,
            'sale_price'=>0,
            'discount'=>0,
            "publisher"=> "NXB Tổng Hợp",
            "author"=> "Nhiều tác giả",
            "code"=> "",
            "status"=> 1,
            "outstanding"=> 0,
        ]);
    }
}
