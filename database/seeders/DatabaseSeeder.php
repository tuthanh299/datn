<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Print_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/
        /*ProductSeeder::class;*/

        /*$this->call([
            UserSeeder::class,
            ProductsTableSeeder::class,
            CategorySeeder::class,
            PublisherSeeder::class,
            RoleSeeder::class,
            SettingSeeder::class,
            
        ]);
        $this->call(PublishersTableSeeder::class);
        $this->call(ProductGalleriesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(StaticNewsTableSeeder::class);*/

        $this->call([
            NewsTableSeeder::class,// 1
            SettingSeeder::class,// 2
            SlidersTableSeeder::class,// 3
            UserSeeder::class,// 4
            CategoriesSeeder::class,// 5
            PublishersTableSeeder::class,// 6
            MemberSeeder::class,// 7
            ProductsTableSeeder::class,// 8
            WarehousesTableSeeder::class,// 9
            RolesTableSeeder::class,// 10
            RoleUsersTableSeeder::class,// 11
            PermissionsTableSeeder::class,// 12
            PermissionRoleTableSeeder::class,// 13
            ImportOrderTableSeeder::class,// 14
            ImportOrderDetailsTableSeeder::class,// 15
            OrderStatusSeeder::class,
        ]);
    }
}
