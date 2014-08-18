<?php
class AdminBlogsController extends AdminController {
    // Could also inherit from and extend blogs controller.
    
    // Admin is a much simpler class. Why not just create a 
    // method (interface) for admin and change the inheritance
    // to Blog?  Better yet, why not use polymorphism?
    
    protected $company;

    /**
     * Post Model
     * @var Post
     */
    protected $post;

    /**
     * Inject the models.
     * @param Post $post
     */
    public function __construct(Post $post, Company $company)
    {
        parent::__construct();
        $this->company=$company;
        $this->post = $post;

        $company=App::make('company');
        // die(var_dump($company));

        View::share('company',$company);
        // $this->beforeFilter('admin-auth');
        
    }

    /**
     * Show a list of all the blog posts.
     *
     * @return View
     */
    public function getIndex($tag="",$paginate=12)
    {

        $brand=Config::get('company.brand');

        // if(!$tag){
            // $tag=$env;
            // die(var_dump($tag));
        // }

        if($tag){

            $tag='%'.$tag.'%';
            $posts = $this->post->where('meta_keywords', 'LIKE', "$tag")
            ->orderBy('id','DESC')
            ->paginate($paginate);      
            
            $tags=array();

            foreach ($posts as $post) {

                foreach ($post->tags() as $mytag) {
                    if(!in_array($mytag, $tags)){
                        array_push($tags, trim($mytag));
                    }
                }

            }           
            
//             die(var_dump(count($posts)));
            // out of place
            // http://stackoverflow.com/questions/16695300/check-for-file-existence-if-laravels-blade-template

            if(count($posts)>0){
//            $brand=strtolower($company->brand);
            return View::make('admin/index', compact('posts','tags','company'))
                ->with(compact('company'))
                ->nest('piwik','site.'.$brand.'.piwik');
            // ->nest('dashboard','admin.dashboard')
            ;

            }

            die('admin blogs controller problem');
            return View::make('admin/index', compact('posts','tags','company'))
            ->with('error', 'There was a problem!');
        }

        //else tag was empty

        // Grab all the blog posts
        
        $posts = $this->post->orderBy('created_at', 'DESC')->paginate($paginate);

        // Show the page
        $users=User::all();
        $sites=['one','two'];
        $projects=Project::all();
        $companies=Company::all();
        return View::make('admin/index',
            compact('posts','company','users','projects','sites','companies'));
//        ->nest('piwik','site.'.$brand.'.piwik');

        ;
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getCreate()
	{
        // die('bam');
        // Show the page
        return View::make('admin/blogs/create')
        ->with(compact('company'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postCreate()
	{
        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required|min:3',
            'content' => 'required|min:3',
            // 'image' => 'required|min:3'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Create a new blog post
            $user = Auth::user();

            // Update the blog post data
            $this->post->title            = Input::get('title');
            $this->post->slug             = Str::slug(Input::get('title'));
            $this->post->content          = Input::get('content');
            // var_dump(Input::get('image'));

            // die(var_dump($user));

            if(!Input::get('image')){
                $un=$user->username;
                if(glob($un.".svg")){
                    $this->post->image=$user->username.".svg";
                }
                else{
                    $this->post->image='desktop.svg';
                }
            }
            else{
                $this->post->image = Input::get('image');    
            }
            
// Changed this from meta-title to make the title seo stuff work! --->
            $this->post->meta_title       = Input::get('title');
            $this->post->meta_description = Input::get('meta-description');
            $this->post->meta_keywords    = Input::get('meta-keywords');
            $this->post->user_id          = $user->id;

            // Was the blog post created?
            if($this->post->save())
            {
                // Redirect to the new blog post page
                return Redirect::to('admin/blogs/' . $this->post->id . '/edit')->with('success', Lang::get('admin/blogs/messages.create.success'));
            }

            // Redirect to the blog post create page
            return Redirect::to('admin/blogs/create')->with('error', Lang::get('admin/blogs/messages.create.error'));
        }

        // Form validation failed
        return Redirect::to('admin/blogs/create')->withInput()->withErrors($validator);
	}

    /**
     * Display the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getShow($post)
	{
        // redirect to the frontend
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param $post
     * @return Response
     */
	public function getEdit($post)
	{
        // Show the page
        // die('bam');
        return View::make('admin/blogs/edit', compact('post','company'));
	}

    public function savePhoto($photo){
        if($photo){
        $destinationPath="/assets/img/";
        $filename = $file->getClientOriginalName();
        
        // $file->move($path,$filename);
        
        $photo->move($destinationPath,$filename);
        $path = $photo->getRealPath();
        // http://laravel.com/docs/requests#files
        var_dump($path);
        die();

        }
        else
            var_dump($photo);
        die();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $post
     * @return Response
     */
	public function postEdit($post)
	{
// die(var_dump(Input::file('photo')));
        // Declare the rules for the form validation
        $rules = array(
            'title'   => 'required|min:3',
            'content' => 'required|min:3',
            // 'photo'=>''
            // 'image' => 'required|min:3'
        );
            // $files=Input::file('photo');
            // var_dump($files);
            // var_dump($storage_path());
            // die();
        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            // Update the blog post data
            $post->title            = Input::get('title');
            $post->slug             = Str::slug(Input::get('title'));
            $post->content          = Input::get('content');
            $post->image            = Input::get('image');
            $post->meta_title       = Input::get('meta-title');
            $post->meta_description = Input::get('meta-description');
            $post->meta_keywords    = Input::get('meta-keywords');

            
            // if(Input::hasFile('photo')){
            //     $photo=Input::file('photo');
            //     $this->savePhoto($photo);
            // }

            // Was the blog post updated?
            if($post->save())
            {
                Session::flash('success','post saved');
                // Redirect to the new blog post page
                return Redirect::to('admin/blogs/' . $post->id . '/edit')->with('success', Lang::get('admin/blogs/messages.update.success'));
            }
            Session::flash('error','Save Problem');
            // Redirect to the blogs post management page
            return Redirect::to('admin/blogs/' . $post->id . '/edit')->with('error', Lang::get('admin/blogs/messages.update.error'));
        }

        // Form validation failed
        return Redirect::to('admin/blogs/' . $post->id . '/edit')->withInput()->withErrors($validator);
	}


    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function getDelete($post)
    {
        // Show the page
        return View::make('admin::blogs/delete', compact('post','company'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $post
     * @return Response
     */
    public function postDelete($post)
    {
        // Declare the rules for the form validation
        $rules = array(
            'id' => 'required|integer'
        );

        // Validate the inputs
        $validator = Validator::make(Input::all(), $rules);

        // Check if the form validates with success
        if ($validator->passes())
        {
            $id = $post->id;
            $post->delete();

            // Was the blog post deleted?
            $post = Post::find($id);
            if(empty($post))
            {
                // Redirect to the blog posts management page
                return Redirect::to('admin/blogs')->with('success', Lang::get('admin/blogs/messages.delete.success'));
            }


        }
        // There was a problem deleting the blog post
        return Redirect::to('admin/blogs')->with('error', Lang::get('admin/blogs/messages.delete.error'));
    }

}