<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specific_role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Specific_role::create(
            [
                'id' => 1,
                'spec_role_name' => 'Project Manager'
            ]

        );
        Specific_role::create(
            [
                'id' => 2,
                'spec_role_name' => 'Programmer'
            ]

        );
        Specific_role::create(
            [
                'id' => 3,
                'spec_role_name' => 'QC Engineer'
            ]
        );
        Specific_role::create(
            [
                'id' => 4,
                'spec_role_name' => 'System Administrator'
            ]
        );
    }
}
