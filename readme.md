#Get Started:
##Fork this project, then serve it:
    git clone https://github.com/rgrigga/toolbox path/to/toolbox

Then run something like this:


    composer update
    echo "create database toolbox" | mysql -uroot -proot
    php artisan migrate

You can also clone my development vagrantServer if you like:

    https://github.com/rgrigga/vagrantserver

Ubuntu 14.04 with php, apache, mysql, phpmyadmin, bower, less, npm

here is the entire procedure I use:

    cd ~/vagrantServer
    vagrant ssh
    git clone https://github.com/rgrigga/toolbox /Code/toolbox
    cd toolbox
    composer update
    echo "create database toolbox" | mysql -uroot -proot
    php artisan migrate
    php artisan generate:seed company

edit app/database/seeds/DatabaseSeeder.php

	public function run()
	{
		Eloquent::unguard();

		 $this->call('CompanyTableSeeder');
	}

edit app/database/seeds/DatabaseSeeder.php

/home/ryan/Code/toolbox/app/database/seeds/CompanyTableSeeder.php

	public function run()
	{
		$faker = Faker::create();
        DB::table('companies')->delete();
        Company::create([
            'name'=>'FooBar, Inc.',
            'brand'=>'foobarski',
            'phone'=>'6145551212',
            'description'=>'We are not just another company.',
            'slogan'=>'We are THE Company. That is a fact jack.',
            'image'=>'http://www.lorempixel.com/',
            'menus'=>'about,code',
        ]);
		foreach(range(1, 10) as $index)
		{

			Company::create([
                'name'=>'company'.$index,
                'brand'=>'company',
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

finally, back on the command line:

    php artisan db:seed

## Built with Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing

Please do!  Ask me if you need help or don't know where to start.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
