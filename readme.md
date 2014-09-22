#Clone this:

    git clone https://github.com/rgrigga/toolbox path/to/toolbox

Serve it however you like, pointing your documentroot to `toolbox/public`

Then, run these commands:

    composer update
    php artisan migrate
    php artisan db:seed

If all goes well, you should have a working copy in your local environment, complete with example users:

###Admin:
username: admin
password: admin

###User:
username: demo
password: password

##Demo
Want a demo?  Here you go:
[http://toolbox.gristech.com/](toolbox.gristech.com)

##Vagrant Server:

You can also clone my development vagrantServer if you like:

    https://github.com/rgrigga/vagrantserver

Ubuntu 14.04 with php, apache, mysql, phpmyadmin, bower, less, npm

This package makes use of other fantasic packages: thank you to all:
* [https://github.com/Zizaco/entrust](Entrust) Roles & Permissions
* [https://github.com/Zizaco/confide](Confide) User Administration (Login)

And of course:
## Laravel PHP Framework

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

Please do!  Don't be afraid to press the little fork button.  Just ask me if you need help or don't know where to start.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
