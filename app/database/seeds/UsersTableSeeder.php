<?php

// Composer: "fzaninotto/faker": "v1.4.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        Eloquent::unguard();

        $faker = Faker::create();
        DB::table('users')->delete();
        DB::table('users')->insert([
            'id'=>1,
            'username'=>'admin',
            'email'=>'admin@example.com',
            'password'=>Hash::make('admin'),
            'confirmed'=>1,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
        ]);
        DB::table('users')->insert([
            'id'=>2,
            'username'=>'demo',
            'email'=>'demo@example.com',
            'password'=>Hash::make('password'),
            'confirmed'=>1,
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
        ]);
        echo "created admin/admin and user/password".PHP_EOL;
//        User::create([
//            'id'=>1,
//            'username'=>'admin',
//            'email'=>'admin@example.com',
//            'password'=>Hash::make('password'),
//            'confirmed'=>1
//        ]);
//		foreach(range(1, 10) as $index)
//		{
//			$result=User::create([
//                'username'=>'user'.$index,
//                'email'=>'user'.$index.'@example.com',
//                'password'=>'password',
//                'confirmed'=>1
//			]);
//
//            echo "created user".$index.PHP_EOL;
//		    echo $result.PHP_EOL;
//        }
	}

}
