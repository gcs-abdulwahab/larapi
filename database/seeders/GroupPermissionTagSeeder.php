<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Group;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\GroupPermissionTagFactory;

class GroupPermissionTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // create GroupPermissionTag
        $groupPermissionTag = GroupPermissionTagFactory::new()->count(100)->create();
       
        



    }
}
