<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\DepartmentFactory;
use Database\Factories\EmployeeFactory;
use Database\Factories\GroupFactory;
use Database\Factories\UserFactory;
use Database\Factories\TagFactory;
use App\Models\User;
use App\Models\Group;
use App\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        // DepartmentFactory::new()->count(10)->create();
        // EmployeeFactory::new()->count(100)->create();

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        

         UserFactory::new()->count(10)->create();
         TagFactory::new()->count(35)->create();
        GroupFactory::new()->count(25)->create();


        $this->call([
            GroupSeeder::class,
            GroupUserSeeder::class,
        ]);


        $this->call(GroupPermissionTagSeeder::class);



    }
}
