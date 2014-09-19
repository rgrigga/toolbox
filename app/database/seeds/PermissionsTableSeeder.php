<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class PermissionsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        DB::table('permissions')->delete();
        DB::table('permissions')->insert([
            'id'=>1,
            'name'=>'admin',
            'display_name'=>'Administrator',
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
        ]);
        DB::table('permissions')->insert([
            'id'=>2,
            'name'=>'manage_projects',
            'display_name'=>'Manage Projects',
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
        ]);
//        Permission::create([
//            'name'=>'manage_projects',
//            'display_name'=>'Manage Projects',
//        ]);


	}

}
