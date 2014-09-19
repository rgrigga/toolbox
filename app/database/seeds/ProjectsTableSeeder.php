<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        DB::table('projects')->delete();
		foreach(range(1, 5) as $index)
		{
			Project::create([
                'name'=>'AdminProject '.$index,
                'link'=>'proj'.$index.'.myapp.dev',
                'description'=>'Pure Awesome',
                'owner'=>1,
                'votes'=>5,
			]);
            Project::create([
                'name'=>'UserProject '.$index,
                'link'=>'userproj'.$index.'.myapp.dev',
                'description'=>'Pure Awesome',
                'owner'=>2,
                'votes'=>5,
            ]);
		}
	}

}
