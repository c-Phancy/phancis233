<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Profile;
use \App\Models\Handle;

class HandleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = Profile::all();

        // Gives each profile a random amount of handles from 0 to 7
        foreach ($profiles as $profile) {
            Handle::factory()->count(rand(0, 7))->create(['profile_id' => $profile->id]);
        };
    }
}
