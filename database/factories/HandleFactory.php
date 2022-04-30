<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profile;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Handle>
 */
class HandleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'social_name' => $this->faker->randomElement(['Facebook', 'YouTube', 'WhatsApp', 'Instagram', 'Twitter', 'WeChat', 'TikTok', 'Snapchat', 'Reddit', 'LinkedIn']), // array taken from https://buffer.com/library/social-media-sites/
            'name' => $this->faker->unique()->userName,
            ];
    }
}
