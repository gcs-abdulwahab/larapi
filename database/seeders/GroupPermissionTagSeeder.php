<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Permission;
use App\Models\Group;
use App\Models\GroupPermissionTag;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\GroupPermissionTagFactory;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class GroupPermissionTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        
        // // delete all the entries in the grouppermissiontag table

            GroupPermissionTag::truncate();

        try{
            $groupPermissionTag = GroupPermissionTag::factory()->count(1000)->make();

            // get the unique [group_id, permission_id, tag_id] combinations
            $groupPermissionTag = $groupPermissionTag->unique(function ($item) {
                return $item['group_id'].$item['tag_id'];
            });

            // insert the unique combinations into the grouppermissiontag table
            GroupPermissionTag::insert($groupPermissionTag->toArray());

            
        }
        catch(QueryException  $e){

            if ($e->errorInfo[1] === 1062) {
                // Handle unique constraint violation error here
                echo $e->getMessage();
            } else {
                // Handle other database errors here
            }
            
        }
       
        



    }
}
