<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Group;
use App\Models\GroupPermissionThread;
use App\Models\Tag;
use App\Models\User;
use Database\Factories\GroupPermissionThreadFactory;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class GroupPermissionThreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        // // delete all the entries in the grouppermissionthread table

            GroupPermissionThread::truncate();

        try{
            $groupPermissionThread = GroupPermissionThread::factory()->count(1000)->make();

            // get the unique [group_id, permission_id, tag_id] combinations
            $groupPermissionThread = $groupPermissionThread->unique(function ($item) {
                return $item['group_id'].$item['thread_id'];
            });

            // insert the unique combinations into the grouppermissiontag table
            GroupPermissionThread::insert($groupPermissionThread->toArray());

            
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
