<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Permission;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */

class GroupPermissionTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // try catch  if there are no users, groups, tags, or permissions

        
        

        try{
                
                // get those users who have some groups and some tags
                $user = User::whereHas('groups')->whereHas('tags')->get()->random();
            
                // get a random group of the user
                $group = Group::where('owner_id', $user->id)->get()->random();

                // get a random tag of the user
                $tag = Tag::where('owner_id', $user->id)->get()->random();
                // get a random permission
                $permission = Permission::all()->random();

                return [
            
              
                    // get the random group by user id
                    'group_id' => $group->id,
                    
                    // get random permission
                    'permission_id' => $permission->id,
                    // get random tag of a user who owns the group
                    'tag_id' => $tag->id,
                    
                ];

        } catch (\Exception $e) {
            //log error
            echo($e->getMessage());
            
            
            return [];
        }


       
    }
}
