<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        //DB::table('role_users')->delete();
        
        DB::table('role_users')->insert(array (
            0 => 
            array (
                'id' => 7,
                'user_id' => 4,
                'role_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 8,
                'user_id' => 5,
                'role_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 11,
                'user_id' => 1,
                'role_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 13,
                'user_id' => 8,
                'role_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}