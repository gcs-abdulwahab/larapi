<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'message_id' => \App\Models\Message::factory(),
            'body' => $this->faker->text,
            'is_read' => $this->faker->boolean,
            // expires after one year
            'expires_at' => $this->faker->dateTimeBetween('+1 year', '+2 years'),
        ];
    }
}
