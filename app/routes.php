<?php
Route::pattern('id', '[0-9]+');
//Route::matched(function($route, $request)
//{
//    //
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//COMMENT/UNCOMMENT/MODIFY THESE AT WILL:
if(!App::runningInConsole()){
    try{
        $company=Company::where('brand','like','gristech')->first();

    }catch(\Exception $e){
        //do nothing
        echo $e->getMessage();
        exit;
    }
    if(empty($company)){
        Company::create([
            'id'=>1,
            'name'=>'Gristech',
            'brand'=>'gristech',
            'phone'=>'6142039405',
            'description'=>'Web Development.',
            'slogan'=>'Think about it.',
            'image'=>'buckeye-icon.svg',
            'menus'=>'about,contact,code',
        ]);
    }
    $company=Company::where('brand','like','gristech')->first();
    if(!empty($company)){
        App::bind('company',function($app){
            return Company::where('brand','like','gristech')->first();
        });
        View::share('company',Company::where('brand','like','gristech')->first());
    }
}

View::composer('site.nav', function($view)
{
    $view->nest('navcontact', 'site.partials.navbar-contact-dropdown');
});


Route::get('welcome', 'HomeController@showWelcome');
Route::get('home',['as'=>'home','uses'=>'HomeController@showHome']);
Route::get('code',['as'=>'code','uses'=>'HomeController@showCode']);
Route::get('contact',['as'=>'contact','uses'=>'HomeController@showContact']);
Route::get('about',['as'=>'about','uses'=>'HomeController@showAbout']);

Route::get('demo',function(){
    return View::make('demo');
});

Route::get('test',function(){
 	return View::make('site.test');
});

//
Route::model('user','User');
Route::model('role','Role');
Route::model('permission','Permission');
Route::model('project','Project');

Route::resource('permissions', 'AdminPermissionsController');
Route::resource('projects', 'ProjectsController');
Route::resource('screenshots', 'ScreenshotsController');

Route::get('projects',['as'=>'projects','uses'=>'ProjectsController@index']);
Route::get('projects/{project}/edit', 'ProjectsController@edit')
    ->where('project', '[0-9]+');
# User Role Management
//Route::get('roles/{role}/show', 'AdminRolesController@getShow')
//    ->where('role', '[0-9]+');
Route::get('roles/{role}/edit', 'AdminRolesController@getEdit')
    ->where('role', '[0-9]+');
//Route::post('roles/{role}/edit', 'AdminRolesController@postEdit')
//    ->where('role', '[0-9]+');
Route::post('roles/{role}/edit',['as'=>'roles.update','uses'=> 'AdminRolesController@postEdit'])
    ->where('role', '[0-9]+');
//Route::get('roles/{role}/delete', 'AdminRolesController@getDelete')
//    ->where('role', '[0-9]+');
//Route::post('roles/{role}/delete', 'AdminRolesController@postDelete')
//    ->where('role', '[0-9]+');

//Route::get('roles/{role}', 'AdminRolesController@show')
//    ->where('role', '[0-9]+');

//Route::controller('roles', 'AdminRolesController');
Route::resource('roles', 'AdminRolesController');
// Confide routes
//Route::get('users/{user}', 'UsersController@show')
//    ->where('user', '[0-9]+');



Route::get('users/create', ['as'=>'signup','uses'=>'UsersController@create']);
Route::post('users', 'UsersController@store');
Route::get('users/login',['as'=>'login','uses' => 'UsersController@login']);
//Route::get('users/login',['as'=>'login','uses' => 'UsersController@login']);
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', ['as'=>'logout','uses'=>'UsersController@logout']);
Route::resource('users', 'UsersController');

Route::get('logout','UsersController@logout');
//Route::get('users/{user}/edit', ['as'=>'users.edit','uses'=>'UsersController@getEdit'])
//    ->where('user', '[0-9]+');

//Route::post('users/{user}/edit', ['as'=>'users.update','uses'=>'UsersController@postEdit'])
//    ->where('user', '[0-9]+');


//Route::resource('user', 'AdminUsersController');

Route::get('admin/user/index' ,['as'=>'user.index','uses'=>'UsersController@index']);
Route::get('user/profile',['as'=>'profile','uses' => 'UsersController@profile']);



Route::resource('companies', 'CompaniesController');


///////////////////////////////////////
///////ADMIN ROUTES
///////////////////////////////////////
//these apply to ALL companies

Route::group(array('prefix' => 'admin', 'before' => 'auth'), function()
{

    # Comment Management
    Route::get('comments/{comment}/edit', 'AdminCommentsController@getEdit')
        ->where('comment', '[0-9]+');
    Route::post('comments/{comment}/edit', 'AdminCommentsController@postEdit')
        ->where('comment', '[0-9]+');
    Route::get('comments/{comment}/delete', 'AdminCommentsController@getDelete')
        ->where('comment', '[0-9]+');
    Route::post('comments/{comment}/delete', 'AdminCommentsController@postDelete')
        ->where('comment', '[0-9]+');
    Route::controller('comments', 'AdminCommentsController');

    # Blog Management
    Route::get('blogs/{post}/show', 'AdminBlogsController@getShow')
        ->where('post', '[0-9]+');
    Route::get('blogs/{post}/edit', 'AdminBlogsController@getEdit')
        ->where('post', '[0-9]+');
    Route::post('blogs/{post}/edit', 'AdminBlogsController@postEdit')
        ->where('post', '[0-9]+');
    Route::get('blogs/{post}/delete', 'AdminBlogsController@getDelete')
        ->where('post', '[0-9]+');
    Route::post('blogs/{post}/delete', 'AdminBlogsController@postDelete')
        ->where('post', '[0-9]+');

    Route::get('blogs/tag/{tag}', 'AdminBlogsController@getIndex');
    // ???
    // ->where('post', '[0-9]+');

    Route::controller('blogs', 'AdminBlogsController');


    # User Management
    Route::get('users/create',['as'=>'users.create','uses'=>'AdminUsersController@getCreate']);
    Route::post('users/create',['as'=>'users.store','uses'=>'AdminUsersController@postCreate']);

    Route::get('users/{user}/show', 'AdminUsersController@getShow')
        ->where('user', '[0-9]+');

    Route::get('users/{user}/edit', ['as'=>'admin.users.edit','uses'=>'AdminUsersController@getEdit'])
        ->where('user', '[0-9]+');

    Route::post('users/{user}/edit', ['as'=>'admin.users.update','uses'=>'Admin2UsersController@postEdit'])
        ->where('user', '[0-9]+');

    Route::get('users/{user}/delete', ['as'=>'users.destroy','uses'=>'AdminUsersController@getDelete'])
        ->where('user', '[0-9]+');
    Route::post('users/{user}/delete', 'AdminUsersController@postDelete')
        ->where('user', '[0-9]+');
    Route::controller('users', 'AdminUsersController');


    # Company Management
    Route::get('companies/create',['as'=>'companies.create','uses'=>'AdminCompaniesController@getCreate']);
    Route::post('companies/create',['as'=>'companies.store','uses'=>'AdminCompaniesController@store']);

    Route::get('companies/{company}/show', 'AdminCompaniesController@show')
        ->where('company', '[0-9]+');
    Route::get('companies/{company}/edit', 'AdminCompaniesController@edit')
        ->where('company', '[0-9]+');
    Route::post('companies/{company}/edit', 'AdminCompaniesController@postEdit')
        ->where('company', '[0-9]+');
    Route::get('companies/{company}/delete', 'AdminCompaniesController@getDelete')
        ->where('company', '[0-9]+');
    Route::post('companies/{company}/delete', 'AdminCompaniesController@destroy')
        ->where('company', '[0-9]+');


    Route::get('companies/index',['as'=>'companies.index','uses'=>'AdminCompaniesController@getIndex']);
    Route::controller('companies', 'AdminCompaniesController');

    # Admin Dashboard
    // Route::controller('{page?}', 'AdminDashboardController');

    route::get('index', ['as'=>'admin.index','uses'=>'AdminBlogsController@getIndex']);
    Route::controller('/', 'AdminBlogsController');

});

Route::get('admin',function(){
    $users=User::all();
    $sites=['one','two'];
    $projects=Project::all();
//    View::share($projects);
    return View::make('admin.index')->with(compact('users','sites','projects'));
});

//Route::any('{tag}',function($tag){
//    App::abort(404);
////    echo Redirect::intended('/');
//});

Route::get('/', function()
{
    $user=Auth::user();
    return View::make('site.index')
        ->nest('profile','user.partials.profile',compact('user'))
        ;
});