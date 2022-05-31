<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Group;
use \App\Models\Profile;

use Illuminate\Support\Facades\DB;

class AssociateProfilesAndGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For each id
        $groupsIds = Group::pluck('id');
        $profileIds = Profile::pluck('id');

        // For each Profile id
        foreach($profileIds as $profileId) {
            // Determines how many Groups will be assigned to the Profile
            $random = rand(0, 5);

            if ($random) {
                // Get random Group Ids to assign
                $assignedGroupIds = $groupsIds->slice(0, $random);

                // Insert Group-Profile association
                foreach($assignedGroupIds as $groupId) {
                    DB::table('group_profile')->insert(['profile_id'=>$profileId, 'group_id'=>$groupId]);
                }
            }
        }
    }
}
