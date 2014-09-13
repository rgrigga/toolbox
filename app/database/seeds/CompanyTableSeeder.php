<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class CompanyTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        DB::table('companies')->delete();
//        Company::create([
//            'name'=>'FooBar, Inc.',
//            'brand'=>'foobarski',
//            'phone'=>'6145551212',
//            'description'=>'We are not just another company.',
//            'slogan'=>'We are THE Company. That is a fact jack.',
//            'image'=>'http://www.lorempixel.com/',
//            'menus'=>'about,code',
//        ]);
        Company::create([
            'name'=>'Gristech',
            'brand'=>'gristech',
//                'facebook'=>'company'.$index,
//                'twitter'=>'company'.$index,
//                'linkedin'=>'company'.$index,
            'phone'=>rand(6145550000,6145559999),
//                'email'=>'user'.rand(100,999)."@company".$index.".com",
            'description'=>'We are not just another company',
            'slogan'=>'We are THE Company',
            'image'=>'http://www.lorempixel.com/',
            'menus'=>'about,contact,code',
        ]);
		foreach(range(1, 10) as $index)
		{

			Company::create([
                'name'=>'company'.$index. " INC",
                'brand'=>'company'.$index,
                'facebook'=>'company'.$index,
                'twitter'=>'company'.$index,
                'linkedin'=>'company'.$index,
                'phone'=>rand(6145550000,6145559999),
                'email'=>'user'.rand(100,999)."@company".$index.".com",
                'description'=>'Not another company',
                'slogan'=>'We THE Company. no drizzle fo shizzle yo',
                'image'=>'http://www.lorempixel.com/',
                'menus'=>'about,contact,code',
			]);

		}
	}

}
