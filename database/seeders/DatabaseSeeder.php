<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\PermissionType;
use App\Models\GroupPermissionTag;
use Database\Factories\GroupFactory;
use Database\Factories\TagFactory;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;







class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //create a user with id 1
        UserFactory::new()->create([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ]);

        // Create the Only Tag  with id 1  of User 1

        TagFactory::new()->create([
            'id' => 1,
            'name' => 'tag1',
            'owner_id' => 1,
        ]);

        /**  Two Groups of the User 1 */
        GroupFactory::new()->create([
            'id' => 1,
            'name' => 'Friends and Family',
            'owner_id' => 1,
        ]);

        GroupFactory::new()->create([
            'id' => 2,
            'name' => 'Students',
            'owner_id' => 1,
        ]);
        

        /**  Setting  the Permissions of both Groups */
        GroupPermissionTag::create([
            'group_id' => 1,
            'tag_id' => 1,
            'permission' => PermissionType::BOTH  ,
        ]);
        GroupPermissionTag::create([
            'group_id' => 2,
            'tag_id' => 1,
            'permission' => PermissionType::READ  ,
        ]);



         UserFactory::new()->count(10)->create();
         TagFactory::new()->count(35)->create();
         GroupFactory::new()->count(25)->create();


        $this->call([
            GroupSeeder::class,
            GroupUserSeeder::class,
        ]);


        $this->call(GroupPermissionTagSeeder::class);

        $this->call(MessageSeeder::class);



    }
}
