<?php

namespace Database\Factories;

use App\enums\PermissionType;
use App\Models\Group;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */

class GroupPermissionThreadFactory extends Factory
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


                // get those tags of the user who owns the group and has some threads
                $thread = Tag::where('owner_id', $user->id)->whereHas('threads')->get()->random();
                

                return [
                          
                    // get the random group by user id
                    'group_id' => $group->id,
                    
                    // get random permission
                    'permission' => $this->faker->randomElement(PermissionType::cases()),
                    
                    // get random tag of a user who owns the group
                    'thread_id' => $thread->id,
                    
                ];

        } catch (\Exception $e) {
            //log error
            echo($e->getMessage());
            
        }


       
    }
}
