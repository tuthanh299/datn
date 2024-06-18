<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        //DB::table('sliders')->delete();
        
        DB::table('sliders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'slider 1',
                'description' => 'TLBookstore',
                'photo_path' => '/storage/slider/1/JVxzxi7jwjzt3L8tiHQW.png',
                'photo_name' => 'slide2.png',
                'created_at' => '2024-04-21 03:48:34',
                'updated_at' => '2024-05-15 17:05:58',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Slider 2',
                'description' => 'TLBookstore',
                'photo_path' => '/storage/slider/1/t1ejrpGy4dAXYpSEqE3E.png',
                'photo_name' => 'slide1.png',
                'created_at' => '2024-04-21 03:51:04',
                'updated_at' => '2024-05-15 17:05:54',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Slider 3',
                'description' => 'TLBookstore',
                'photo_path' => '/storage/slider/1/UvGdKW465tG61dTXAyUu.png',
                'photo_name' => 'slide3.png',
                'created_at' => '2024-05-15 17:05:49',
                'updated_at' => '2024-05-15 17:05:49',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Slide 4',
                'description' => 'TLBookstore',
                'photo_path' => '/storage/slider/1/rp46WE4iUV2RfrmhEucH.png',
                'photo_name' => 'slide1.png',
                'created_at' => '2024-05-15 17:19:37',
                'updated_at' => '2024-05-15 17:19:37',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Slide 5',
                'description' => 'TLBookstore',
                'photo_path' => '/storage/slider/1/6ELVVaCPZFJaM9TVYnQU.png',
                'photo_name' => 'slide2.png',
                'created_at' => '2024-05-15 17:19:52',
                'updated_at' => '2024-05-15 17:19:52',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Slide 6',
                'description' => 'TLBookstore',
                'photo_path' => '/storage/slider/1/0AmbwdD9kSH5hCTcraqU.png',
                'photo_name' => 'slide3.png',
                'created_at' => '2024-05-15 17:20:09',
                'updated_at' => '2024-05-15 17:20:09',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Slide 7',
                'description' => 'TLBookstore',
                'photo_path' => '/storage/slider/1/V4u6617SZJHwob76mHiM.png',
                'photo_name' => 'slide4.png',
                'created_at' => '2024-05-15 17:20:49',
                'updated_at' => '2024-05-15 17:20:49',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}