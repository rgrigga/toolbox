<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class AssignedRolesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        DB::table('assigned_roles')->insert([
            'user_id'=>1,
            'role_id'=>1
        ]);
        DB::table('assigned_roles')->insert([
            'user_id'=>2,
            'role_id'=>2
        ]);
    }

}
