<?php
// die(var_dump('companies controller'));
class CompaniesController extends BaseController {

//    public $layout = 'admin::layouts.default';
    public $layout = 'layouts.master';
    // @extends('admin.layouts.default')
    /**
     * Company Repository
     *
     * @var Company
     */
    protected $company;

    public function __construct(Company $company)
    {
//        parent::__construct();
        $this->company = $company;

// $this->company=App::make('company');    
// // die(var_dump($company));    
View::share('company',$this->company);

// http://misko.hevery.com/2008/08/17/singletons-are-pathological-liars/

    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
// die(var_dump($this->company));
        $companies = $this->company->all();

        return View::make('companies.index', compact('companies'));
    }

    public function index(){
// $this->company=App::make('company');
// die(var_dump($this->company));
        // return Redirect::route('companies.index');
        // $c=new Company;
        // die(var_dump($c));

        $companies = $this->company->all();
        
        // View::share('company',$this->company);
        return View::make('companies.index', compact('companies'))
        // ->nest('about','company/about')
        // return Redirect::to('admin/companies');
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        // $this->company=App::make('company');
        
        return View::make('companies.create');
    }

    public function getCreate()
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
        View::share('company',$company);
        return View::make('companies.show', compact('company'))
            ->nest('about','company/about')
        ;
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
        View::share('company',$company);
        
        //?? isnull vs empty vs !== etc
        if (empty($company))
        {
            return Redirect::route('companies.index');
        }
        //else
        return View::make('companies.edit')
            ->nest('about','company.about')
            // ->with(compact('company'))
            ;
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



}