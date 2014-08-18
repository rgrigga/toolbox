<?php
class AdminCompaniesController extends AdminController {

    /**
     * Company Repository
     *
     * @var Company
     */
    protected $company;

    public function __construct(Company $company)
    {
        parent::__construct();
        $this->company = $company;

        $this->company=App::make('company');
        View::share('company',$this->company);

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
//                 die(var_dump($this->company));
// App::error(function(RuntimeException $exception){
//     Log::error($exception);
//     Session::flash('message','AdminCompaniesController@getIndex');
//     var_dump($company);
//     App::abort(404,'Company not present.');
//     // return die('Sorry! Something is wrong with this account!');
// });

        $companies = $this->company->all();

        return View::make('companies.index', compact('companies'));
    }

    public function getIndex()
    {
//                 die(var_dump($this->company));
// App::error(function(RuntimeException $exception){
//     Log::error($exception);
//     Session::flash('message','AdminCompaniesController@getIndex');
//     var_dump($company);
//     App::abort(404,'Company not present.');
//     // return die('Sorry! Something is wrong with this account!');
// });


        
// die(var_dump($company));

        $companies = $this->company->all();

        return View::make('companies.index', compact('companies'));
    }



    // public function getCreate()
    // {
    //     // All roles
    //     $roles = $this->role->all();

    //     // Get all the available permissions
    //     $permissions = $this->permission->all();

    //     // Selected groups
    //     $selectedRoles = Input::old('roles', array());

    //     // Selected permissions
    //     $selectedPermissions = Input::old('permissions', array());

    //     // Show the page
    //     return View::make('admin/users/create', compact('roles', 'permissions', 'selectedRoles', 'selectedPermissions'));
    // }

    public function getCreate()
    {
        return View::make('companies.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Company::$rules);

        if ($validation->passes())
        {
            $this->company->create($input);

            return Redirect::route('companies.index');
        }

        return Redirect::route('companies.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $company = $this->company->findOrFail($id);

        return View::make('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $company = $this->company->find($id);

        if (is_null($company))
        {
            return Redirect::route('companies.index');
        }

        return View::make('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Company::$rules);

        if ($validation->passes())
        {
            $company = $this->company->find($id);
            $company->update($input);

            return Redirect::route('companies.show', $id);
        }

        return Redirect::route('companies.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->company->find($id)->delete();

        return Redirect::route('companies.index');
    }
    
    // public function missingMethod($parameters)
    // {
    //     // var_dump($parameters);
    // }

}