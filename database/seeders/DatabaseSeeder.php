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
            StaticNewsSeeder::class,
        ]);
        $this->call(PublishersTableSeeder::class);
        $this->call(ProductGalleriesTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(SlidersTableSeeder::class);
        $this->call(StaticNewsTableSeeder::class);*/

        $this->call([
            NewsTableSeeder::class,//
            SettingSeeder::class,//
            SlidersTableSeeder::class,//
            StaticNewsTableSeeder::class,//
            UserSeeder::class,//
            CategoriesSeeder::class,//
            PublishersTableSeeder::class,//
            MemberSeeder::class,//
            ProductsTableSeeder::class,//
            //ProeSeeder::class,//
            ProductGalleriesTableSeeder::class,//
            WarehousesTableSeeder::class,//
            RolesTableSeeder::class,//
            PermissionsTableSeeder::class,//
            PermissionRoleTableSeeder::class,//
        ]);
    }
}
