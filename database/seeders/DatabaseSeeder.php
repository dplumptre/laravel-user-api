<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\Role::factory()->create();
        //\App\Models\Vendor::factory(4)->create();
        \App\Models\User::factory(2)->create();
    }
}
