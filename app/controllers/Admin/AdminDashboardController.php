<?php

class AdminDashboardController extends AdminController {
    
    /**
     * Blog Model
     * @var Blog
     */
    protected $post;

        /**
     * Company Model
     * @var Company
     */
    protected $company;

    /**
     * Inject the models.
     * @param post $post
     * @param company $company
     */
    public function __construct(Post $post, Company $company)
    {
        parent::__construct();
        $this->post = $post;
        $this->company=App::make('company');
        View::share('company',$this->company);
    }

	/**
	 * Admin dashboard
	 *
	 */
	public function getIndex($tag='')
	{
        // die("ADMIN DASHBOARD GET INDEX");
            // return App::error(function(RuntimeException $exception){
            //     Log::error($exception);
            //     Session::flash('message','AdminCompaniesController@getIndex');
            //     var_dump($company);
            //     App::abort(404,'Company not present.');
            //     // return die('Sorry! Something is wrong with this account!');
            // });

        if(!isset($company)){
            $company = $this->company->where('brand','LIKE','gristech')->first();
        }
        // die(var_dump($company));
        return View::make('admin.blogs.index')->with(compact('company','posts'));
	}

}


