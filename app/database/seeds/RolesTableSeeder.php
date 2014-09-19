<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class RolesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        DB::table('roles')->delete();
        Role::create([
            'id'=>1,
            'name'=>'Administrator'
        ]);
        Role::create([
            'id'=>2,
            'name'=>'Contributor'
        ]);

	}

}
