<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\DepartmentFactory;
use Database\Factories\EmployeeFactory;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
        DepartmentFactory::new()->count(10)->create();
        EmployeeFactory::new()->count(100)->create();


    }
}
