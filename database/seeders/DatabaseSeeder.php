<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// GroupUser;

use App\Enums\MessageType;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Message;
// use Thread
use App\Models\Thread;
// use Tag
// use MessageFactory;
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


        //create a user with id 2
        UserFactory::new()->create([
            'id' => 2,
            'name' => 'Friend User',
            'email' => 'Friend@Friend.com',
            'password' => Hash::make('friend'),
        ]);

        //create a user with id 3
        UserFactory::new()->create([
            'id' => 3,
            'name' => 'Student User',
            'email' => 'user3@gmail.com',
            'password' => Hash::make('student'),
        ]);

        // Create the Only Tag  with id 1  of User 1

        TagFactory::new()->create([
            'id' => 1,
            'name' => 'tag1',
            'owner_id' => 1,
        ]);

        /**  Two Groups of the User 1 */
        Group ::create([
            'id' => 1,
            'name' => 'Friends and Family',
            'owner_id' => 1,
        ]);

        Group::create([
            'id' => 2,
            'name' => 'Students',
            'owner_id' => 1,
        ]);
        // Group by User 2
        Group::create([
            'id' => 3,
            'name' => 'Students',
            'owner_id' => 2,
        ]);

        /**  Add the Users to the Groups */
        GroupUser::create([
            'group_id' => 1,
            'user_id' => 2,
        ]);        
        GroupUser::create([
            'group_id' => 2,
            'user_id' => 3,
        ]);

        GroupUser::create([
            'group_id' => 3,
            'user_id' => 1,
        ]);


        // create Thread on Tag 1
        Thread ::create([
            'id' => 1,
            'is_active' => true,
            'tag_id' => 1,
        ]);
        
        

        // /**  Setting  the Permissions of both Groups */
        // GroupPermissionThread::create([
        //     'group_id' => 1,
        //     'thread_id' => 1,
        //     'permission' => PermissionType::BOTH  ,
        // ]);
        // GroupPermissionThread::create([
        //     'group_id' => 2,
        //     'thread_id' => 1,
        //     'permission' => PermissionType::READ  ,
        // ]);

      

        /**  First Message on the  Message   Create a message on a tag */
        Message::create([
            'id' => 1,
            'thread_id' => 1,
            'user_id' => 1,
            'type' => MessageType::TEXT,
            'body' => 'This is a message on a tag from its owner',
        ]);

        Message::create([
            'id' => 2,
            'thread_id' => 1,
            'user_id' => 2,
            'type' => MessageType::TEXT,
            'body' => 'This is a message reply from a user 2',
        ]);

        //  UserFactory::new()->count(10)->create();
        //  TagFactory::new()->count(35)->create();
         
        //  GroupFactory::new()->count(25)->create();


        // $this->call([
        //     GroupSeeder::class,
        //     GroupUserSeeder::class,
        // ]);


        // $this->call(GroupPermissionThreadSeeder::class);

        // $this->call(MessageSeeder::class);

    }
}
