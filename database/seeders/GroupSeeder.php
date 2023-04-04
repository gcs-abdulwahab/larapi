<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // create groups for each user
        foreach (User::all() as $user) {

            $group_names = ['family', 'friends', 'office', 'students'];
            $groups = [];

            foreach ($group_names as $name) {
                
                $group = Group::factory()->create([
                    'name' => $name,
                    'owner_id' => $user->id,
                ]);

                $groups[$name] = $group;
                // add the owner to the group
                $group->users()->sync($user->id);
            }
        }
    }
}
