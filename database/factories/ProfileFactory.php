<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firstName = strtolower($this->faker->firstName());
        $lastName = strtolower($this->faker->lastName());
        $phone = preg_replace('/[^0-9]/', '', $this->faker->phoneNumber());
        return [
            'first_name' => ucfirst($firstName),
            'last_name' => ucfirst($lastName),
            'email' => "{$firstName}.{$lastName}@{$this->faker->freeEmailDomain()}",
            'phone_number' => (strlen($phone) == 10) ? $phone : substr($phone, 1)
        ];
    }
}
