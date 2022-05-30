<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Random nouns taken from meetup.com
        // Unique city to satisfy unique requirement for Group name
        $uniqueCity = $this->faker->unique()->city;
        $firstCompoundNoun = $this->faker->randomElement(["fudge", "cake", "bread", "mountain climbing", "movie", "crypto", "cycling", "book", "history", "nature", ""]);
        $secondCompoundNoun = $this->faker->randomElement(["conversations", "lovers", "critics", "enthusiasts", "brunch", "professionals", "foodies", "baking", "support", ""]);
        $suffix = $this->faker->randomElement(["group", "team", "squad", "meetup", "meeting", "club", "friends", "events", "parties", "community", "family", "united", "scouts", "workshop"]);

        $groupName = array_filter([$uniqueCity, $firstCompoundNoun, $secondCompoundNoun, $suffix]);

        // Returns a large amount of duplicates. Coincidence?
        return [
            'name' => ucwords(join(" ", $groupName))
        ];
    }
}
