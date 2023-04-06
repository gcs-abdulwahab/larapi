<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Tag;
use App\Enums\MessageType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $sender_id = User::all()->random()->id;
        $tag = Tag::where('owner_id', $sender_id)->get()->random();
        $expirydatetime = $this->faker->dateTimeBetween('now', '+1 year');

        return [
            'type' => $this->faker->randomElement( MessageType::cases()  ),
            'description' => $this->faker->sentence,
            'expires_at' => $expirydatetime,
            'sender_id' => $sender_id,
            'tag_id' => $tag->id,
        ];
    }
}
