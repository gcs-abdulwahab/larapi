<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\User;

class GroupUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           // for each group , add some users to it except the owner
           foreach (Group::all() as $group) {
            $group->users()->attach(User::all()->except($group->owner_id)->random(5)->pluck('id'));
        }
    }
}
