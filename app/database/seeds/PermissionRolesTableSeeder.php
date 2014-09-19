<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class PermissionRolesTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        DB::table('permission_role')->delete();
        DB::table('permission_role')->insert([
            'permission_id'=>1,
            'role_id'=>1
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>2,
            'role_id'=>1
        ]);
        DB::table('permission_role')->insert([
            'permission_id'=>2,
            'role_id'=>2
        ]);
    }

}
