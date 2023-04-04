<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create permissions
        $permissions = [
            'read',
            'write',
            'read-write',
            'none'            
        ];

        foreach ($permissions as $permission) {
         Permission::factory()->create([
                'name' => $permission,
                'description' => $permission,
            ]);
        }

    }
}
