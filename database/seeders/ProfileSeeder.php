<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userIds = User::pluck('id');

        // The purpose of this method is to ensure that each user has a profile (optional)
        // Use a range if having a Profile should be randomly determined
        foreach($userIds as $userId) {
            Profile::factory()->create(['user_id' => $userId]);
        }
    }
}
