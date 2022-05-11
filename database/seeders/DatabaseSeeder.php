<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // truncate() wipes the database clean and starts ids from 1
        // Use query()->delete() to keep id records
        DB::table('users')->truncate();
        DB::table('profiles')->truncate();
        DB::table('handles')->truncate();

        $this->call([
            UserSeeder::class,
            ProfileSeeder::class,
            HandleSeeder::class
        ]);
    }
}
