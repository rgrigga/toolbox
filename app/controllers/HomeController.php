<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    protected $layout = 'layouts.master';

    public function __construct()
    {
        View::composer('profile', function($view)
        {
            $view->with('count', User::count());
        });
        View::composer('site.nav', function($view)
        {
            $view->with('contact', View::make('site.partials.navbar-contact'));
        });

    }

	public function showWelcome()
	{
//        $this->layout->navbar = View::make('site.nav');
        $this->layout->content =  View::make('hello');
	}
    public function showAbout()
    {
        $this->layout->navbar = View::make('site.nav');
        $this->layout->footer = View::make('site.footer');

        $user=User::where('username','ryan')->first();
        $this->layout->navbar = View::make('site.nav');
        $this->layout->content =  View::make('site.about')->nest('profile','user.profile',compact('user'));
    }
    public function showContact()
    {
        $company=Company::where('name','like','gristech')->first();
        $this->layout->navbar = View::make('site.nav');
        $this->layout->content =  View::make('site.contact')
            ->nest('navcontact', 'site.partials.navbar-contact');
;
    }
    public function showHome()
    {
        return Redirect::to('/');

        $this->layout->navbar = View::make('site.nav');
        if(!Auth::check()){
            $this->layout->content = View::make('site.home');
        }else{
            $this->layout->content = View::make('site.home');
//                ->nest('profile','user.profile');
        }
    }
    public function showCode()
    {
        $this->layout->navbar = View::make('site.nav');
        if(!Auth::check()){
            $this->layout->content = View::make('site.code');
        }else{
            $this->layout->content = View::make('site.code');
//                ->nest('profile','user.profile');
        }
    }
}
