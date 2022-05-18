<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Group;
use \App\Models\Profile;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Guarantees that 10-30 profiles will not belong to any Groups
        $profileCount = count(Profile::all());
        $assignProfiles = Profile::all()->random(rand($profileCount - 30, $profileCount - 10));
        
        Group::factory()->count(rand(2, 20))->create()->each(function($group) use(&$assignProfiles) {
            // Some Groups may have 0 Profiles
            $addProfiles = $assignProfiles->random(rand(0, count($assignProfiles)));
            $group->profiles()->attach($addProfiles->pluck('id')->toArray());
        });
    }
}
