<?php

namespace Database\Seeders;

use Database\Factories\MessageFactory;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MessageFactory::times(100)->create();
    }
}
